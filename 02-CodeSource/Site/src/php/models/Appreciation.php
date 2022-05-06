<?php
/*
    ETML
    Auteur :        Aurélien Devaud
    Date :          08.04.2022
    Description :   Defines an evaluation of a book by a user and alow it's management in the database
*/

require_once("Database.php");

/**
 * Defines an evaluation of a book by a user and alow it's management in the database
 */
class Appreciation{
    /**
     * Get the appreciation with the corresponding Id
     * @param $appreciationId => Id of the appreciation
     * @return Appreciation returns the appreciation with the corresponding ID
     */
    public static function getAppreciationById(int $appreciationId) : Appreciation{
        //select the appreciations
        $assocAppreciations = Database::getDatabase()->queryPrepareExecute(
            "SELECT * FROM t_appreciation WHERE t_appreciation.idAppreciation = :id", 
            [["param"=>"id", "value"=>$appreciationId, "type" => PDO::PARAM_INT]]
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

        return $appreciations[0];
    }

    /**
     * Delete the appreciation with the corresponding ID
     * @param $appreciationId => id of the appreciation
     */
    public static function delete(int $appreciationId) : void{
        Database::getDatabase()->queryPrepareExecute(
            "DELETE FROM `t_appreciation` WHERE `t_appreciation`.`idAppreciation` = :id", 
            [["param"=>"id", "value"=>$appreciationId, "type" => PDO::PARAM_INT]]
        );
    }

    /**
     * Construct an appreciation object
     * @param $id => id of the appreciation
     * @param $evaluation => evaluation of the book
     * @param $userId => id of the user
     * @param $bookId => id of the book
     */
    public function __construct(
        public ?int $id,
        public float $evaluation,
        public int $userId,
        public int $bookId){
        
    }

    /**
     * Insert the appreciation in the database
     * @return bool returns true if the operation was successful
     */
    public function insert() : bool{
        $toReturn = (bool)Database::getDatabase()->queryPrepareExecute(
            "INSERT INTO `t_appreciation` (`idAppreciation`, `appEvaluation`, `idUser`, `idBook`) VALUES (NULL, :eval, :userId, :bookId)",
            [
                ["param"=>"eval", "value"=>$this->evaluation, "type" => PDO::PARAM_INT],
                ["param"=>"userId", "value"=>$this->userId, "type" => PDO::PARAM_INT],
                ["param"=>"bookId", "value"=>$this->bookId, "type" => PDO::PARAM_INT]
            ]
        );

        $this->id = (int)(Database::getDatabase()->querySimpleExecute("SELECT idAppreciation FROM t_appreciation ORDER BY idAppreciation DESC LIMIT 1")[0]["idAppreciation"]);

        return $toReturn;
    }

    /**
     * Update the appreciation in the database
     * @return bool returns true if the operation was successful
     */
    public function update() : bool{
        
        return (bool)Database::getDatabase()->queryPrepareExecute(
            "UPDATE `t_appreciation` SET `appEvaluation` = :eval, `idUser` = :userId, `idBook` = :bookId WHERE `t_appreciation`.`idAppreciation` = :id",
            [
                ["param"=>"id", "value"=>$this->id, "type" => PDO::PARAM_INT],
                ["param"=>"eval", "value"=>$this->evaluation, "type" => PDO::PARAM_INT],
                ["param"=>"userId", "value"=>$this->userId, "type" => PDO::PARAM_INT],
                ["param"=>"bookId", "value"=>$this->bookId, "type" => PDO::PARAM_INT]
            ]
        );
    }
}
?>