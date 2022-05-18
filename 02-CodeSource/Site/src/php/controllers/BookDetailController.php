<?php
/*
    ETML
    Auteur :        Aurélien Devaud
    Date :          11.05.2022
    Description :   Show the details of a book
*/

require_once(__DIR__ . "/../models/Book.php");
require_once(__DIR__ . "/../models/User.php");
require_once(__DIR__ . "/../models/Appreciation.php");

/**
 * Show the details of a book
 */
class BookDetailController{
    
    //declare variables
    public Book $bookToShow;
    public ?float $yourEval;
    public int $nbEval;

    /**
     * Contruct the instance of the class
     * @param $bookToShowId => id of the book to show the detail of
     */
    public function __construct(int $bookToShowId)
    {
        //verify if authorized
        if ($_SESSION["user"]["permLevel"] > 0){
            // Get the book
            $this->bookToShow = Book::getBookById($bookToShowId);            

            // Set the book into an array
            $book = array();
            foreach ($this->bookToShow as $key => $value) 
            {
                $book[$key] = $value;
            }

            // Set the categories into an array
            $categories = array();
            foreach ($this->bookToShow->getCategories() as $category) 
            {
                foreach ($category as $key => $value) 
                {
                    $categories[$key][] = $value;
                }
            }

            // Set the user who posted that book
            $userName = User::getUserById($this->bookToShow->userId)->nickname;

            // Set the average of the book
            $average = $this->bookToShow->getAverageEvaluation();

            // Get the number of appreciation did to this book
            $nbAppreciation = count($this->bookToShow->getAppreciations());
    
            $this->nbEval = count($this->bookToShow->getAppreciations());
            $_SESSION["bookToShow"] = $book;
            $_SESSION["bookToShow"] += $categories;
            $_SESSION["bookToShow"]["postedName"] = $userName;
            $_SESSION["bookToShow"]["average"] = $average;
            $_SESSION["bookToShow"]["nbAppreciation"] = $nbAppreciation;
        }
    }

    /**
     * Show the book's details
     */
    public function show() : void{
        //verify if authorized
        if ($_SESSION["user"]["permLevel"] > 0){
            header("location: /02-CodeSource/Site/src/php/views/bookInfos.php");
        }
        else
        {
            /////////////////////send to error page///////////////////////////
            header("location: /02-CodeSource/Site/src/php/views/errors/error403.php");
        }
    }
}

?>