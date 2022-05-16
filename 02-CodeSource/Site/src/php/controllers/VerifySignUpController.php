<?php
/*
    ETML
    Auteur :        Damien Loup
    Date :          16.05.2022
    Description :   Controls the verification process of the user sign up + connect if the account has been created
*/

require_once(__DIR__ . "/../models/User.php");

/**
 * Controls the verification process of the user sign up + connect if the account has been created
 */
class VerifySignUpController{

    //declare variables
    public ?array $user;
    public bool $valid;

    /**
     * Contruct the instance of the connection verification controller
     * @param $nickname => nickname of the user
     * @param $password => password of the user
     * @param $checkPassword => password confirm of the user
     */
    public function __construct(string $nickname, string $password, string $checkPassword)
    {
        //set the default value of the variables
        $this->user = null;
        $this->valid = false;

        //Create the user if the passwords are true
        if ($password == $checkPassword) 
        {
            //Create the new user
            User::CreateUser($nickname, password_hash($password, PASSWORD_BCRYPT));

            //Get the user created to connect him instantly
            $this->user = User::GetUserByName($nickname, $password);
            if(count($this->user) > 0)
            {
                $this->valid = true;
            }
        }
        else
        {
            /////////////////////send to error page///////////////////////////
            header("location: /02-CodeSource/Site/src/php/views/errors/error404.php");
        }
    }

    /**
     * Show the home page
     */
    public function show() : void{
        if ($this->valid == true) {
            //redirection to the home page
            header("Location: ./02-CodeSource/Site/src/php/views/home.php");
        }
        else
        {
            /////////////////////send to error page///////////////////////////
            header("location: /02-CodeSource/Site/src/php/views/errors/error404.php");
        }
        
    }
}
?>