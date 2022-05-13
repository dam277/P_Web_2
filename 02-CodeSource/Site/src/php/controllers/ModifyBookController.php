<?php
/*
    ETML
    Auteur :        Aurélien Devaud
    Date :          11.05.2022
    Description :   Controls the modification of a book
*/

/**
 * Controls the modification of a book
 */
class ModifyBookController{

    //declare variables
    public Book $bookToModify;

    /**
     * Construct the instance of the class
     * @param $bookIdToModify
     */
    public function __construct(public int $bookIdToModify)
    {
        //test if the user has the permission to modify a book
        if (true){
            
        }
    }
}

?>