<?php

use PHPUnit\Framework\TestCase;

$path = dirname(__FILE__)."/../Site/src/php/models/Book.php";
var_dump($path);
include($path);



final class getBookTest extends TestCase
{

    public function test_getBook_ok()
    {   
        $books = Book::getAllBooks();
        Session::
        $this->assertTrue($books>1);
    }

   
}