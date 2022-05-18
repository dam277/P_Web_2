<?php
/*
    ETML
    Auteur :        Damien Loup
    Date :          15.05.2022
    Description :   Gives the possibility to the user to sign up by creating an account
*/

/**
 * Gives the possibility to the user to sign up by creating an account
 */
class SignUpController{

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
        header("Location: ./02-CodeSource/Site/src/php/views/inscription.php");
    }
}
?>