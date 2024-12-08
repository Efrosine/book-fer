<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
// use Illuminate\Http\Request;
use App\Models\Writer;
use App\Http\Requests\WriterRequest;

class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $writers = Writer::all();
        return response()->json($writers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WriterRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $validated['image_url'] = $image->store('writerImg', 'public');
            unset($validated['image']);
        }

        $writer = Writer::create($validated);

        return response()->json($writer, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Writer $writer)
    {
        $data = Writer::with('books')->find($writer->id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WriterRequest $request, Writer $writer)
    {
        $writer->update($request->validated());

        return response()->json($writer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Writer $writer)
    {
        $success = $writer->delete();
        return response()->json([
            'success' => $success,
        ]);
    }
}
