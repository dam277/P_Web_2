<?php
/*
    ETML
    Auteur :        Aurélien Devaud
    Date :          11.05.2022
    Description :   Controls the addition of a book
*/

require_once(__DIR__ . "/../models/Book.php");
require_once(__DIR__ . "/../models/Category.php");

/**
 * Controls the addition of a book
 */
class AddBookController{

    /**
     * Construct the instance of the class
     */
    public function __construct()
    {
        
    }

    /**
     * Show the page used to add a book
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
            
            header("location: /02-CodeSource/Site/src/php/views/addBook.php");
        }
        else
        {
            /////////////////////send to error page///////////////////////////
            header("location: /02-CodeSource/Site/src/php/views/errors/error403.php");
        }
    }
}
?>