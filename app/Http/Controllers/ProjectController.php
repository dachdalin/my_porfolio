<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all projects from the database
        $projects = Project::latest()->paginate(10);

        // Return a JSON response with the projects
        return response()->json([
            'success' => true,
            'data' => $projects,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug',
            'description' => 'nullable|string',
            'tech' => 'nullable|array',
            'url' => 'nullable',
            'image' => 'nullable',
            'github' => 'nullable',
        ]);

        // Create a new project instance and save it to the database
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
        } else {
            $imagePath = null;
        }
        $project = Project::create([
            'title' => $request->title,
            'slug' => generateSlug($request->title),
            'description' => $request->description,
            'tech' => $request->tech,
            'url' => $request->url,
            'image' => $imagePath,
            'github' => $request->github,
        ]);

        // Return a JSON response with the created project
        return response()->json([
            'success' => true,
            'data' => $project,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug,' . $id,
            'description' => 'nullable|string',
            'tech' => 'nullable|array',
            'url' => 'nullable',
            'image' => 'nullable',
            'github' => 'nullable',
        ]);

        // Find the project by ID and update it
        $project = Project::findOrFail($id);
        $project->title = $request->title;
        $project->slug = $request->slug ?? generateSlug($request->title);
        $project->description = $request->description;
        $project->tech = $request->tech;
        $project->url = $request->url;
        $project->github = $request->github;
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($project->image) {
                Storage::delete('public/images/'.$project->image);
            }
            $project->image = $request->file('image')->store('public/images');
        }
        $project->save();

        // Return a JSON response with the updated project
        return response()->json([
            'success' => true,
            'data' => $project,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the project by ID and delete it
        $project = Project::findOrFail($id);
        $project->delete();

        // Return a JSON response indicating success
        return response()->json([
            'success' => true,
            'message' => 'Project deleted successfully',
        ]);
    }
}
