<?php
/*
    ETML
    Auteur :        Aurélien Devaud
    Date :          08.04.2022
    Description :   Defines an user and allow to manage the user in the database
*/

/**
 * Defines an user and allow to manage the user in the database
 */
class User{
    /**
     * Get the user with the corresponding id from the database
     * @param $userId => id of the user
     * @return User returns the user with the corresponding id
     */
    public static function getUserById(int $userId) : User{

    }

    /**
     * Get the id of the user whose name corresponds with the one given
     * @param $nickname => name to search
     * @return ?int returns the id if found or null if not 
     */
    public static function getUserIdByName(string $nickname) : ?int{

    }

    /**
     * Verify if the password is valid
     * @param $userId => id of the user to verify
     * @param $password => supposed password of the user
     * @return bool returns true if this password is the right one
     */
    public static function verifyPassword(int $userId, string $password) : bool{

    }

    /**
     * Construct the user object
     * @param $id => id of the user
     * @param $nickname => nickname of the user
     * @param $entryDate => date of entry of the user
     * @param $permLevel => permission level of the user
     */
    public function __construct(
        public int $id, 
        public string $nickname, 
        public DateTime $entryDate, 
        public int $permLevel){
        
    }

    /**
     * Get the books added by the user
     * @return array returns all the books added by the user
     */
    public function getBooks() : array{

    }

    /**
     * Get all the appreciations given by the user
     * @return array returns all the appreciations given by the user
     */
    public function getAppreciations() : array{

    }

    /**
     * Find all the sessions refering to this user
     * @return array returns an array of ids refering to the sessions refering to the user
     */
    public function findSessions() : array{

    }
}
?>