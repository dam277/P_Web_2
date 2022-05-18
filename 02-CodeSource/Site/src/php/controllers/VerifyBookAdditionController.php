<?php
/*
    ETML
    Auteur :        Aurélien Devaud
    Date :          11.05.2022
    Description :   Controls the Verification of the addition of a book
*/

require_once(__DIR__ . "/../models/Book.php");
require_once(__DIR__ . "/../models/User.php");

/**
 * Controls the Verification of the addition of a book
 */
class VerifyBookAdditionController{

    //declare variables
    public array $errors;

    /**
     * Construct the instance of the class
     * @param $bookToAdd => book to verify to add
     */
    public function __construct(Book $bookToAdd)
    {
        //verify the authority of the user
        if ($_SESSION["permLevel"] >= 1){
            //check for errors
            $this->errors = $bookToAdd->checkForErrors();

            //test if the book can be added
            if (count($this->errors) == 0){
                $bookToAdd->insert();
                move_uploaded_file($_POST["image"], __DIR__ . "/../../../resources/bookImages/" . $bookToAdd->id . ".jpg");
            }
        }
    }

    /**
     * Show the page of the book's details if the book was added or reshow the adding page
     */
    public function show(){
        //verify if authorized
        if ($_SESSION["user"]["permLevel"] > 0)
        {
            $_SESSION["allCategories"] = [];

            $allCategories = Category::GetAllCategories();

            foreach ($allCategories as $category){
                $_SESSION["allCategories"][] = [$category->id, $category->name];
            }
            
            $_SESSION["errors"] = $this->errors;

            header("location: ./02-CodeSource/Site/src/php/views/addBook.php");
        }
        else
        {
            /////////////////////send to error page///////////////////////////
            header("location: ./02-CodeSource/Site/src/php/views/errors/error403.php");
        }
    }
}

?>