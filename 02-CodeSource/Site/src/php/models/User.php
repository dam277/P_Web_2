<?php
/*
    ETML
    Auteur :        Aurélien Devaud
    Date :          08.04.2022
    Description :   Defines an user and allow to manage the user in the database
*/

require_once("Database.php");
require_once("Book.php");
require_once("Appreciation.php");
require_once("Session.php");

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
        //select the users
        $assocUsers = Database::getDatabase()->queryPrepareExecute(
            "SELECT * FROM t_user WHERE t_user.idUser = :id", 
            [["param"=>"id", "value"=>$userId, "type" => PDO::PARAM_INT]]
        );

        //declare the array of users
        $users = [];

        //add the users to a list
        foreach ($assocUsers as $user){
            $users[] = new User(
                $user["idUser"], $user["useNickname"], $user["useEntryDate"], 
                $user["usePermLevel"]
            );
        }

        return $users[0];
    }

    /**
     *  Get the user with the corresponding name from the database
     *  @param $useNickname => nickname entered by the user
     *  @param $password => password entered by the user
     *  Check if the password is valid
     * @return array returns the array of the user if the nickname and the password match
     */
    public static function GetUserByName($useNickname, $password) : ?array
    {
        //select the users
        $assocUsers = Database::getDatabase()->queryPrepareExecute(
            "SELECT * FROM t_user WHERE t_user.useNickname = :useNickname", 
            [["param"=>"useNickname", "value"=>$useNickname, "type" => PDO::PARAM_STR]]
        );

        //Return the user if the password is valid
        foreach($assocUsers as $key => $value)
        {
            if(password_verify($password, $value["usePasswordHash"]))
            {
                return $assocUsers[$key];
            }
            else
            {
                return null;
            }
        }
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
        public string $entryDate, 
        public int $permLevel){
        
    }

    /**
     * Get the books added by the user
     * @return array returns all the books added by the user
     */
    public function getBooks() : array{
        //select the books
        $assocBooks = Database::getDatabase()->queryPrepareExecute(
            "SELECT * FROM t_book WHERE t_book.idUser = :id", 
            [["param"=>"id", "value"=>$this->id, "type" => PDO::PARAM_INT]]
        );

        //declare the array of books
        $books = [];

        //add the books to a list
        foreach ($assocBooks as $book){
            $books[] = new Book(
                $book["idBook"], $book["booTitle"], $book["booPageNumber"], 
                $book["booSummary"], $book["booAuthorName"], $book["booEditorName"], 
                $book["booEditorYear"], $book["booExtract"], $book["idUser"]
            );
        }

        return $books;
    }

    /**
     * Get all the appreciations given by the user
     * @return array returns all the appreciations given by the user
     */
    public function getAppreciations() : array{
        //select the appreciations
        $assocAppreciations = Database::getDatabase()->queryPrepareExecute(
            "SELECT * FROM t_appreciation WHERE t_appreciation.idUser = :id", 
            [["param"=>"id", "value"=>$this->id, "type" => PDO::PARAM_INT]]
        );

        //declare the array of appreciations
        $appreciations = [];

        //add the appreciations to a list
        foreach ($assocAppreciations as $appreciation){
            $appreciations[] = new Appreciation(
                $appreciation["idAppreciation"], $appreciation["appEvaluation"], 
                $appreciation["idUser"], $appreciation["idBook"]
            );
        }

        return $appreciations;
    }

    /**
     * Find all the sessions refering to this user
     * @return array returns an array of ids refering to the sessions refering to the user
     */
    public function findSessions() : array{
        //select the sessions
        $assocSessions = Database::getDatabase()->queryPrepareExecute(
            "SELECT * FROM t_session WHERE t_session.idUser = :id", 
            [["param"=>"id", "value"=>$this->id, "type" => PDO::PARAM_INT]]
        );

        //declare the array of sessions
        $sessions = [];

        //add the sessions to a list
        foreach ($assocSessions as $session){
            $sessions[] = new Session(
                $session["idSession"], $session["idUser"]
            );
        }

        return $sessions;
    }
}
?>