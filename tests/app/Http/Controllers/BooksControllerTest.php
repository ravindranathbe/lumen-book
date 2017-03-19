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
        /* $this->get('books')
            ->seeJson([
                'title' => 'War of the worlds'
                ])
            ->seeJson([
                'title' => 'Lolita love'
                ])
            ; */
        // $this->markTestIncomplete('Pending test');
        $this->get('books')
            ->isJson();
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

        $data = json_decode($this->response->getContent(), true);
        $this->assertArrayHasKey('created_at', $data);
        $this->assertArrayHasKey('updated_at', $data);
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

    public function testShowRouteShouldNotMatchAnInvalidRoute()
    {
        $this->get('/books/this-is-invalid');

        $this->assertNotRegExp(
            '/Book not found/',
            $this->response->getContent(),
            'BooksController@show route matching when it should not.'
        );
    }
}
