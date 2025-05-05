<?php

namespace App\Http\Controllers;

use App\Models\Experiense;
use Illuminate\Http\Request;

class ExperienseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experienses = Experiense::latest()->paginate(10);
        return response()->json([
            'success' => true,
            'data' => $experienses,
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
            'slug' => 'nullable|string|max:255|unique:experienses,slug',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        // Create a new experiense instance and save it to the database
        $experiense = Experiense::create([
            'title' => $request->title,
            'slug' => generateSlug($request->title),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
        ]);

        return response()->json([
            'success' => true,
            'data' => $experiense,
        ]);
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
            'slug' => 'nullable|string|max:255|unique:experienses,slug,' . $id,
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        // Find the experiense by ID and update it
        $experiense = Experiense::findOrFail($id);
        $experiense->update([
            'title' => $request->title,
            'slug' => generateSlug($request->title),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
        ]);

        return response()->json([
            'success' => true,
            'data' => $experiense,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the experiense by ID and delete it
        $experiense = Experiense::findOrFail($id);
        $experiense->delete();

        return response()->json([
            'success' => true,
            'message' => 'Experiense deleted successfully',
        ]);
    }
}
