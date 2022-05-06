<?php
/*
    ETML
    Auteur :        Aurélien Devaud
    Date :          06.05.2022
    Description :   Controls the home page
*/

/**
 * Controls the home page
 */
class HomeController{

    //declare variables
    public array $books;

    /**
     * Construct the instance of the class
     */
    public function __construct()
    {
        //get the books to display
        $this->books = Book::getFiveLastBooks();
    }

    /**
     * Show the home page
     */
    public function show(){

    }
}
?>