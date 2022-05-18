<?php
/*
    ETML
    Auteur :        Aurélien Devaud
    Date :          11.05.2022
    Description :   Verify the addition of an appreciation
*/

require_once(__DIR__ . "/../models/Book.php");
require_once(__DIR__ . "/../models/Appreciation.php");

/**
 * Verify the addition of a new appreciation
 */
class VerifyAppreciationAdditionController{

    //declare variables
    public Book $bookToEvaluate;
    public bool $valid;
    
    /**
     * Construct the instance of the class
     * @param $bookId => id of the book to evaluate
     * @param $evaluation => evaluation given by the user
     */
    public function __construct(int $bookId, public float $evaluation)
    {
        $this->bookToEvaluate = Book::getBookById($bookId);

        if (($evaluation == 1 || $evaluation == 1.5 || $evaluation == 2 
            || $evaluation == 2.5 || $evaluation == 3 || $evaluation == 3.5 
            || $evaluation == 4 || $evaluation == 4.5 || $evaluation == 5) && $this->bookToEvaluate && $_SESSION["user"]["permLevel"] > 0){
            $this->valid = true;
            $newAppreciation = new Appreciation(null, $evaluation, $_SESSION["user"]["id"], $bookId);
            $newAppreciation->insert();
        } else{
            $this->valid = false;
        }

        
    }

    /**
     * Show the page following the result of wether or not the evaluation was valid
     */
    public function show(){
        //verify if valid
        if ($this->valid){
            header("location: ./02-CodeSource/Site/src/php/views/bookInfos.php?bookId=".$this->bookToEvaluate->id);
        }
        else{
            /////////////////////send to error page///////////////////////////
            header("location: ./02-CodeSource/Site/src/php/views/errors/error403.php");
        }
    }
}
?>