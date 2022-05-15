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
        if ($_SESSION["permLevel"] > 0){
            $this->bookToShow = Book::getBookById($bookToShowId);
            $appreciations = $_SESSION["user"]->getAppreciations();
    
            $yourEval = null;
            foreach ($appreciations as $appreciation){
                if ($appreciation->bookId == $bookToShowId){
                    $this->yourEval = $appreciation;
                    break;
                }
            }
    
            $this->nbEval = count($this->bookToShow->getAppreciations());
        }
    }

    /**
     * Show the book's details
     */
    public function show() : void{
        //verify if authorized
        if ($_SESSION["permLevel"] > 0){
            header("location: /02-CodeSource/Site/src/php/views/bookInfos.php?bookId=".$_GET["bookId"]);
        }
        else
        {
            /////////////////////send to error page///////////////////////////
            header("location: /02-CodeSource/Site/src/php/views/errors/error403.php");
        }
    }
}

?>