<?php
/*
    ETML
    Auteur :        Aurélien Devaud
    Date :          08.04.2022
    Description :   Defines an evaluation of a book by a user and alow it's management in the database
*/

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

    }

    /**
     * Delete the appreciation with the corresponding ID
     * @param $appreciationId => id of the appreciation
     */
    public static function delete(int $appreciationId){

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

    }

    /**
     * Update the appreciation in the database
     * @return bool returns true if the operation was successful
     */
    public function update() : bool{

    }
}
?>