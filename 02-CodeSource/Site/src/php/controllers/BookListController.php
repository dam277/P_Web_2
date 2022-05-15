<?php
/*
    ETML
    Auteur :        Aurélien Devaud
    Date :          13.05.2022
    Description :   Controls the list of books
*/

require_once(__DIR__ . "/../models/Book.php");
require_once(__DIR__ . "/../models/User.php");
require_once(__DIR__ . "/../models/Category.php");

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
    public function __construct(?array $categoryIds)
    {
        //get all books
        $books = Book::getAllBooks();

        if($categoryIds != null){
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

                $this->bookList[] = $book;
            }
        }
        else
        {
            $this->bookList = $books;
        }
    }

    /**
     * Show the book list page
     */
    public function show(){
        //Creating bookList
        $books = [];

        //Set an array for one book
        foreach ($this->bookList as $book) {

            //Get the category of the book
            $bookCategory = array();
            foreach ($book->getCategories() as $categoryList) 
            {
                $bookCategory[] = $categoryList->name;
            }

            //Get the person who posted the book
            $user = array();
            foreach (User::getUserById($book->userId) as $actualUser) 
            {
                $user[] = $actualUser;
            }

            $books[] = array("id" => $book->id, "title" => $book->title, "pageNumber" => $book->pageNumber, "summary" => $book->summary, "authorName" => $book->authorName, "editorName" => $book->editorName, "editorYear" => $book->editorYear, "extract" => $book->extract, "averageEvalutation" => $book->getAverageEvaluation(), "bookCategory" => $bookCategory, "user" => $user);
        }

        //Set the session
        $_SESSION["books"] = $books;

        //redirection to the books list page
        header("Location: ./02-CodeSource/Site/src/php/views/books.php");
    }
}

?>