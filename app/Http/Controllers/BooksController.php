<?php

namespace App\Http\Controllers;

class BooksController
{
    public function index()
    {
        return [
            ['title' => 'War of the worlds'],
            ['title' => 'Lolita love']
        ];
    }
}
