<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BooksController
{
    public function index()
    {
        /*return [
            ['title' => 'War of the worlds'],
            ['title' => 'Lolita love']
        ];*/

        return Book::all();
    }

    public function show($id)
    {
        try {
            return Book::FindOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => 'Book not found'
                ]
            ], 404);
        }
        
    }
}
