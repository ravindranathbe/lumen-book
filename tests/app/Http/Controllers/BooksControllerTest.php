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
}
