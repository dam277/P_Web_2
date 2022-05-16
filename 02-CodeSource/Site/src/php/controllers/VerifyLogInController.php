<?php
/*
    ETML
    Auteur :        Aurélien Devaud
    Date :          06.05.2022
    Description :   Controls the verification process of the user log in
*/

require_once(__DIR__ . "/../models/User.php");

/**
 * Controls the verification process of the user log in
 */
class VerifyLogInController{

    //declare variables
    public ?array $user;
    public bool $valid;

    /**
     * Contruct the instance of the connection verification controller
     * @param $nickname => nickname of the user
     * @param $password => password of the user
     */
    public function __construct(string $nickname, string $password)
    {
        //set the default value of the variables
        $this->user = null;
        $this->valid = false;

        $this->user = User::GetUserByName($nickname, $password);
        if($this->user != null)
        {
            $this->valid = true;
        }
        var_dump($this->user);
    }

    /**
     * Show the home page
     */
    public function show() : void{
        //redirection to the home page
        header("Location: ./02-CodeSource/Site/src/php/views/home.php");
    }
}
?>