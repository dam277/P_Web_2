<?php
/*
    ETML
    Auteur :        Damien Loup
    Date :          15.05.2022
    Description :   Makes the possibility for the user to contact the team
*/

/**
 * Makes the possibility for the user to contact the team
 */
class ContactUsController{

    /**
     * Construct the instance of the class
     */
    public function __construct()
    {
        
    }

    /**
     * Show the log in page
     */
    public function show() : void{
        header("Location: ./02-CodeSource/Site/src/php/views/contactUs.php");
    }
}
?>