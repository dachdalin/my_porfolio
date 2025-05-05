<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::latest()->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $technologies,
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:technologies,slug',
            'description' => 'nullable|string',
            'tech' => 'nullable|array',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }
        try {
            $technology = Technology::create([
                'title' => $request->title,
                'slug' => generateSlug($request->title),
                'description' => $request->description,
                'tech' => $request->tech,
            ]);
            return response()->json([
                'success' => true,
                'data' => $technology,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create technology',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $technology = Technology::where('slug', $id)->first();

        if (!$technology) {
            return response()->json([
                'success' => false,
                'message' => 'Technology not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $technology,
        ]);
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:technologies,slug,' . $id,
            'description' => 'nullable|string',
            'tech' => 'nullable|array',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }
        try {
            $technology = Technology::where('id', $id)->first();
            if (!$technology) {
                return response()->json([
                    'success' => false,
                    'message' => 'Technology not found',
                ], 404);
            }
            $technology->update($request->all());
            return response()->json([
                'success' => true,
                'data' => $technology,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update technology',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $technology = Technology::where('id', $id)->first();
            if (!$technology) {
                return response()->json([
                    'success' => false,
                    'message' => 'Technology not found',
                ], 404);
            }
            $technology->delete();
            return response()->json([
                'success' => true,
                'message' => 'Technology deleted successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete technology',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
