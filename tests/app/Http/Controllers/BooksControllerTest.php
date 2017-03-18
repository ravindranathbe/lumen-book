<?php

namespace Tests\App\Http\Controllers;

// use Laravel\Lumen\Testing\DatabaseMigrations;
// use Laravel\Lumen\Testing\DatabaseTransactions;
use TestCase;

class BooksControllerTest extends TestCase
{
    public function testIndexStatusCodeShouldBe200()
    {
        $this->get('/books')->seeStatusCode(200);
    }

    public function testIndexShouldReturnACollection()
    {
        $this->get('books')
            ->seeJson([
                'title' => 'War of the worlds'
                ])
            ->seeJson([
                'title' => 'Lolita love'
                ])
            ;
    }
}
