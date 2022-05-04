<?php
/*
    ETML
    Auteur :        Aurélien Devaud
    Date :          08.04.2022
    Description :   Class representing a session of an user
*/

require_once("Database.php");

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
        //select the session
        $assocSessions = Database::getDatabase()->queryPrepareExecute(
            "SELECT * FROM t_session WHERE t_session.idSession = :id", 
            [["param"=>"id", "value"=>$sessionId, "type" => PDO::PARAM_INT]]
        );

        //declare the array of sessions
        $sessions = [];

        //add the sessions to a list
        foreach ($assocSessions as $session){
            $sessions[] = new Session(
                $session["idSession"], $session["idUser"]
            );
        }

        return $sessions[0];
    }

    /**
     * Delete the session with the corresponding ID
     * @param $sessionId => id of the session
     */
    public static function delete(int $sessionId) : void{
        Database::getDatabase()->queryPrepareExecute(
            "DELETE FROM `t_session` WHERE `t_session`.`idSession` = :id", 
            [["param"=>"id", "value"=>$sessionId, "type" => PDO::PARAM_INT]]
        );
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
        $toReturn = (bool)Database::getDatabase()->queryPrepareExecute(
            "INSERT INTO `t_session` (`idSession`, `idUser`) VALUES (NULL, :userId)",
            [
                ["param"=>"userId", "value"=>$this->userId, "type" => PDO::PARAM_INT]
            ]
        );

        $this->id = (int)(Database::getDatabase()->querySimpleExecute("SELECT idSession FROM t_session ORDER BY idSession DESC LIMIT 1")[0]["idSession"]);

        return $toReturn;
    }
}
?>