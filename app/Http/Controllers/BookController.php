<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
// use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('writer')->get();
        return response()->json($books);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $validated['image_url'] = $image->store('bookImg', 'public');
            // $image->store('bookImg', 'public');
            // $validated['image_url'] = $image->hashName();
            unset($validated['image']);

        }

        $book = Book::create($validated);

        return response()->json($book, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $data = Book::with('writer')->find($book->id);
        unset($data->writer_id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book)
    {
        $book->update($request->validated());
        return response()->json($book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $success = $book->delete();
        return response()->json([
            'success' => $success,
        ]);
    }
}
