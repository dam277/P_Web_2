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
        //select the book
        $assocBooks = Database::getDatabase()->queryPrepareExecute(
            "SELECT * FROM t_book WHERE t_book.idBook = :id", 
            [["param"=>"id", "value"=>$bookId, "type" => PDO::PARAM_INT]]
        );

        //declare the array of books
        $books = [];

        //add the books to a list
        foreach ($assocBooks as $book){
            $books[] = new Book(
                $book["idBook"], $book["booTitle"], $book["booPageNumber"], 
                $book["booSummary"], $book["booAuthorName"], $book["booEditorName"], 
                $book["booEditionYear"], $book["booExtract"], $book["idUser"]
            );
        }

        return $books[0];
    }

    /**
     * Delete the book with the corresponding id from the database
     * @param $bookId => id of the book to delete
     */
    static public function delete(int $bookId) : void{
        Database::getDatabase()->queryPrepareExecute(
            "DELETE FROM `t_book` WHERE `t_book`.`idBook` = :id", 
            [["param"=>"id", "value"=>$bookId, "type" => PDO::PARAM_INT]]
        );
    }

    /**
     * Get all the books in the database
     * @return array returns an array of books
     */
    static public function getAllBooks() : array{
        //select the books
        $assocBooks = Database::getDatabase()->querySimpleExecute(
            "SELECT * FROM t_book"
        );

        //declare the array of books
        $books = [];

        //add the books to a list
        foreach ($assocBooks as $book){
            $books[] = new Book(
                $book["idBook"], $book["booTitle"], $book["booPageNumber"], 
                $book["booSummary"], $book["booAuthorName"], $book["booEditorName"], 
                $book["booEditionYear"], $book["booExtract"], $book["idUser"]
            );
        }

        return $books;
    }

    /**
     * Get the five last the books added in the database
     * @return array returns an array of books
     */
    static public function getFiveLastBooks() : array{
        //select the books
        $assocBooks = Database::getDatabase()->querySimpleExecute(
            "SELECT * FROM t_book ORDER BY idBook DESC LIMIT 5"
        );

        //declare the array of books
        $books = [];

        //add the books to a list
        foreach ($assocBooks as $book){
            $books[] = new Book(
                $book["idBook"], $book["booTitle"], $book["booPageNumber"], 
                $book["booSummary"], $book["booAuthorName"], $book["booEditorName"], 
                $book["booEditionYear"], $book["booExtract"], $book["idUser"]
            );
        }

        return $books;
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
     * @param $extract => extract of the book
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
        public string $extract,
        public int $userId){

    }

    /**
     * Check for invalid fields
     * @return array returns the errors in an associative array
     */
    public function checkForErrors() : array{
        //array of errors
        $errors = [];

        //test the title
        if (!$this->title){
            $errors[] = ["title" => "Le titre du livre est obligatoire !"];
        }

        //test the page number
        if (!$this->pageNumber){
            $errors[] = ["pageNumber" => "Le nombre de pages du livre est obligatoire !"];
        } else if ($this->pageNumber < 1){
            $errors[] = ["pageNumber" => "Le nombre de pages doit être en dessus de 0 !"];
        }

        //test the summary
        if (!$this->summary){
            $errors[] = ["summary" => "Le résumé du livre est obligatoire !"];
        }

        //test the author's name
        if (!$this->authorName){
            $errors[] = ["authorName" => "Le nom de l'auteur du livre est obligatoire !"];
        } else if (!preg_match("/^[A-ZÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ][a-zàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšž∂ð]*([\s'-]([a-zàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšž∂ð]')?([A-ZÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ])[a-zàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšž∂ð]*)+$/", $this->authorName)){
            $errors[] = ["authorName" => "Le nom de l'auteur du livre est invalide !"];
        }

        //test the editor's name
        if (!$this->editorName){
            $errors[] = ["editorName" => "Le nom de l'éditeur du livre est obligatoire !"];
        }

        //test the year of edition
        if (!$this->editorYear){
            $errors[] = ["editorYear" => "L'année d'édition du livre est obligatoire !"];
        }

        //test the extract
        if (!$this->extract){
            $errors[] = ["extract" => "L'extrait du livre est obligatoire !"];
        }

        //test for the user id's validity
        if ($this->userId != $_SESSION["userId"]){
            $errors[] = ["userId" => "L'id de l'utilisateur ajoutant le livre ne correspond pas à celui de l'utilisateur !"];
        }

        return $errors;
    }

    /**
     * Insert the book in the database
     * @return bool returns true if the operation was successful
     */
    public function insert() : bool{
        $toReturn = (bool)Database::getDatabase()->queryPrepareExecute(
            "INSERT INTO `t_book` (`idBook`, `booTitle`, `booPageNumber`, `booSummary`, `booAuthorName`, `booEditorName`, `booEditionYear`, `booExtract`, `idUser`) 
            VALUES (NULL, :title, :pageNumber, :summary, :authorName, :editorName, :editorYear, :extract, :userId)",
            [
                ["param"=>"title", "value"=>$this->title, "type" => PDO::PARAM_STR],
                ["param"=>"pageNumber", "value"=>$this->pageNumber, "type" => PDO::PARAM_INT],
                ["param"=>"summary", "value"=>$this->summary, "type" => PDO::PARAM_STR],
                ["param"=>"authorName", "value"=>$this->authorName, "type" => PDO::PARAM_STR],
                ["param"=>"editorName", "value"=>$this->editorName, "type" => PDO::PARAM_STR],
                ["param"=>"editorYear", "value"=>$this->editorYear, "type" => PDO::PARAM_INT],
                ["param"=>"extract", "value"=>$this->extract, "type" => PDO::PARAM_STR],
                ["param"=>"userId", "value"=>$this->userId, "type" => PDO::PARAM_INT]
            ]
        );

        $this->id = (int)(Database::getDatabase()->querySimpleExecute("SELECT idBook FROM t_book ORDER BY idBook DESC LIMIT 1")[0]["idBook"]);

        return $toReturn;
    }

    /**
     * Update the book in the database
     * @return bool returns true if the operation was successful
     */
    public function update() : bool{
        return (bool)Database::getDatabase()->queryPrepareExecute(
            "UPDATE `t_book` SET 
            `booTitle` = :title, `booPageNumber` = :pageNumber, 
            `booSummary` = :summary, `booAuthorName` = :authorName, 
            `booEditorName` = :editorName, `booEditionYear` = :editorYear, 
            `booExtract` = :extract, `idUser` = :userId
            WHERE `t_book`.`idBook` = :id",
            [
                ["param"=>"id", "value"=>$this->id, "type" => PDO::PARAM_INT],
                ["param"=>"title", "value"=>$this->title, "type" => PDO::PARAM_STR],
                ["param"=>"pageNumber", "value"=>$this->pageNumber, "type" => PDO::PARAM_INT],
                ["param"=>"summary", "value"=>$this->summary, "type" => PDO::PARAM_STR],
                ["param"=>"authorName", "value"=>$this->authorName, "type" => PDO::PARAM_STR],
                ["param"=>"editorName", "value"=>$this->editorName, "type" => PDO::PARAM_STR],
                ["param"=>"editorYear", "value"=>$this->editorYear, "type" => PDO::PARAM_INT],
                ["param"=>"extract", "value"=>$this->extract, "type" => PDO::PARAM_STR],
                ["param"=>"userId", "value"=>$this->userId, "type" => PDO::PARAM_INT]
            ]
        );
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
    public function getAverageEvaluation() : float{
        return (float)(Database::getDatabase()->queryPrepareExecute(
            "SELECT AVG(appEvaluation) AS 'Average' FROM `t_appreciation` WHERE idBook = :id",
            [["param"=>"id", "value"=>$this->id, "type" => PDO::PARAM_INT]])[0]["Average"]);
    }
}
?>
