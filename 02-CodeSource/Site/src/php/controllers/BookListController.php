<?php
/*
    ETML
    Auteur :        Aurélien Devaud
    Date :          13.05.2022
    Description :   Controls the list of books
*/

require_once("../models/Book.php");
require_once("../models/Category.php");

/**
 * Controls the list of books
 */
class BookListController{

    //declare variables
    public array $bookList;

    /**
     * Construct the instance of the class and filter the books
     * @param $categories => categories to be found in the books (OR)
     */
    public function __construct(array $categoryIds)
    {
        //get all books
        $books = Book::getAllBooks();

        foreach ($books as $book){
            $categories = $book->getCategories();

            $valid = false;

            foreach ($categoryIds as $id){
                foreach ($categories as $category){
                    if ($id == $category->id){
                        $valid = true;
                        break;
                    }
                }
                if ($valid){
                    break;
                }
            }

            $bookList[] = $book;
        }
    }

    /**
     * Show the book list page
     */
    public function show(){

    }
}

?>