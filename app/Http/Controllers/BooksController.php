<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
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

    public function store(Request $request)
    {
        /* POST /books HTTP/1.1
        Host: lumen-book.local
        Content-Type: application/json
        Cache-Control: no-cache
        Postman-Token: 93d53344-69b7-df5f-1708-3a527bfd0e69

        {"title":"My water world","description":"A book on my inner feelings of the water world.","author":"R B Rahey"} */

        $book = Book::create($request->all());

        return response()->json([
                'created' => true
            ], 201, [
                'Location' => route('books.show', ['id' => $book->id])
            ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $book = Book::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => 'Book not found'
                ]
            ], 404);
        }

        $book->fill($request->all());
        $book->save();

        return $book;
    }

    public function destroy($id)
    {
        try {
            $book = Book::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => 'Book not found'
                ]
            ], 404);
        }

        $book->delete();

        return response( null , 204);
    }

}
