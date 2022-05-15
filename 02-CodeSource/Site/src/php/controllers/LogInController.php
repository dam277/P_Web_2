<?php
/*
    ETML
    Auteur :        Aurélien Devaud
    Date :          11.05.2022
    Description :   Gives the possibility to the user to log in using their account
*/

/**
 * Gives the possibility to the user to log in using their account
 */
class LogInController{

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
        header("Location: ./02-CodeSource/Site/src/php/views/connexion.php");
    }
}
?>