<?php
/*
    ETML
    Auteur :        Aurélien Devaud
    Date :          06.04.2022
    Description :   Class alowing to manage and define books
*/

require_once("Database.php");
require_once("Category.php");
require_once("Appreciation.php");

/**
 * Class alowing to manage and define books
 */
class Book{

    /**
     * Get the book in the database that posesses the corresponding ID
     * @param $bookId => id of the book to search 
     * @return Book returns the book found
     */
    static public function getBookById(int $bookId) : Book{

    }

    /**
     * Delete the book with the corresponding id from the database
     * @param $bookId => id of the book to delete
     */
    static public function delete(int $bookId) : void{

    }

    /**
     * Get all the books in the database
     * @return array returns an array of books
     */
    static public function getAllBooks() : array{

    }

    /**
     * Construct the book object
     * @param $id => id of the book
     * @param $title => title of the book
     * @param $pageNumber => number of pages of the book
     * @param $summary => summary of the book
     * @param $authorName => name of the author of the book
     * @param $editorName => name of the editor of the book
     * @param $editorYear => year of edition of the book
     * @param $userId => id of the user who added the book
     */
    public function __construct(
        public ?int $id, 
        public string $title, 
        public int $pageNumber, 
        public string $summary, 
        public string $authorName, 
        public string $editorName, 
        public int $editorYear, 
        public int $userId){

    }

    /**
     * Check for invalid fields
     * @return array returns the errors in an associative array
     */
    public function checkForErrors() : array{

    }

    /**
     * Insert the book in the database
     * @return bool returns true if the operation was successful
     */
    public function insert() : bool{

    }

    /**
     * Update the book in the database
     * @return bool returns true if the operation was successful
     */
    public function update() : bool{

    }

    /**
     * Get the categories of the book
     * @return array returns an array of categories
     */
    public function getCategories() : array{
        //select the categories
        $assocCategories = Database::getDatabase()->queryPrepareExecute(
            "SELECT * FROM `t_categorize` INNER JOIN t_category ON t_category.idCategory = t_categorize.idCategory WHERE t_categorize.idBook = :id", 
            [["param"=>"id", "value"=>$this->id, "type" => PDO::PARAM_INT]]
        );

        //declare the array of categories
        $categories = [];

        //add the books to a list
        foreach ($assocCategories as $category){
            $categories[] = new Category(
                $category["idCategory"], $category["catName"]
            );
        }

        return $categories;
    }

    /**
     * Get the appreciations of the book
     * @return array returns the appreciations of the book
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
     * Get the average evaluation of the book
     * @param double returns the average evaluation of the book
     */
    public function getAverageEvaluation() : double{

    }
}
?>