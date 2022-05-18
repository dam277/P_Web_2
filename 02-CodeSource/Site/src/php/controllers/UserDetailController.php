<?php
/*
    ETML
    Auteur :        Aurélien Devaud
    Date :          11.05.2022
    Description :   Controls the display of the user's detail
*/

require_once(__DIR__ . "/../models/User.php");

/**
 * Controls the display of the user's detail
 */
class UserDetailController{

    //declare variables
    public User $user;
    public int $nbBooks;

    /**
     * Constructs the instance of the class
     * @param $userToShowId => user to show the details of
     */
    public function __construct(int $userToShowId)
    {
        //verify if authorized
        if ($_SESSION["user"]["permLevel"] > 0){
            //get the user
            $this->user = User::getUserById($userToShowId);

            $this->nbBooks = count($this->user->getBooks());
        }
    }

    /**
     * Show the user's details
     */
    public function show(){
        //verify if authorized
        if ($_SESSION["user"]["permLevel"] > 0){
            $_SESSION["userInfos"] = array("nickname" => $this->user->nickname, "entryDate" => $this->user->entryDate, "permLevel" => $this->user->permLevel, "books" => $this->nbBooks);
            header("Location: ./02-CodeSource/Site/src/php/views/AccountInfos.php");
        }
    }
}

?>