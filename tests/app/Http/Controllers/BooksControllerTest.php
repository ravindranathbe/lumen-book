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
        /*
        $this->get('books')
            ->seeJson([
                'title' => 'War of the worlds'
                ])
            ->seeJson([
                'title' => 'Lolita love'
                ])
            ;
        */
        $this->markTestIncomplete('Pending test');
    }

    public function testShowShouldReturnAValidBook()
     {
        // $this->markTestIncomplete('Pending test');
        $this->get('/books/1')
            ->seeStatusCode(200)
            ->seeJson([
                'id' => 1,
                // 'title' => 'War of the Worlds',
                // 'description' => 'A science fiction masterpiece about Martians invading London',
                // 'author' => 'H. G. Wells'
            ]);
    }

    public function testShowShouldFailWhenTheBookIdDoesNotExist()
    {
        // $this->markTestIncomplete('Pending test');
        $this->get('/books/99999')
            ->seeStatusCode(404)
            ->seeJson([
                'error' => [
                    'message' => 'Book not found'
                ]
            ]);
    }
}
