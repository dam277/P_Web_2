<?php
/*
    ETML
    Auteur :        Aurélien Devaud
    Date :          08.04.2022
    Description :   Class representing a session of an user
*/

/**
 * Class representing a session of an user
 */
class Session{
    /**
     * Get the session with the corresponding Id
     * @param $sessionId => Id of the session
     * @return Session returns the session with the corresponding ID
     */
    public static function getSessionById(int $sessionId) : Session{

    }

    /**
     * Delete the session with the corresponding ID
     * @param $sessionId => id of the session
     */
    public static function delete(int $sessionId){

    }

    /**
     * Construct a session object
     * @param $id => id of the session
     * @param $userId => id of the user of the session
     */
    public function __construct(
        public ?int $id, 
        public int $userId){
        
    }

    /**
     * Insert the session in the database
     * @return bool returns true if the operation was successful
     */
    public function insert() : bool{

    }
}
?>