<?php
/*
    ETML
    Auteur :        Aurélien Devaud
    Date :          11.05.2022
    Description :   Controls the addition of a book
*/

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