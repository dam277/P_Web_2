<?php
/*
    ETML
    Auteur :        Aurélien Devaud
    Date :          08.04.2022
    Description :   Defines a category of books and allow to find all books related
*/

require_once("Database.php");
require_once("Book.php");

/**
 * Defines a category of books and allow to find all books related
 */
class Category{

    /**
     * Get the category with the corresponding id from the database
     * @param $categoryId => id of the category
     * @return Category returns the category with the corresponding id
     */
    public static function getCategoryById(int $categoryId) : Category{
        //select the categories
        $assocCategories = Database::getDatabase()->queryPrepareExecute(
            "SELECT * FROM t_category WHERE t_category.idCategory = :id", 
            [["param"=>"id", "value"=>$categoryId, "type" => PDO::PARAM_INT]]
        );

        //declare the array of categories
        $categories = [];

        //add the categories to a list
        foreach ($assocCategories as $category){
            $categories[] = new Category(
                $category["idCategory"], $category["catName"]
            );
        }

        return $categories[0];
    }

    /**
     * Get all the categories from the database
     * @return array returns all the categories
     */
    public static function getAllCategories() : array{
        //select the categories
        $assocCategories = Database::getDatabase()->querySimpleExecute(
            "SELECT * FROM t_category"
        );

        //declare the array of categories
        $categories = [];

        //add the categories to a list
        foreach ($assocCategories as $category){
            $categories[] = new Category(
                $category["idCategory"], $category["catName"]
            );
        }

        return $categories;
    }

    /**
     * Constructs a category object
     * @param $id => id of the category
     * @param $name => name of the category
     */
    public function __construct(
        public ?int $id, 
        public string $name){
        
    }

    /**
     * Get the books of the category
     * @return array returns all the books of the category
     */
    public function getBooks() : array{
        //select the books
        $assocBooks = Database::getDatabase()->queryPrepareExecute(
            "SELECT * FROM `t_categorize` INNER JOIN t_book ON t_book.idBook = t_categorize.idBook WHERE t_categorize.idCategory = :id", 
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
}
?>