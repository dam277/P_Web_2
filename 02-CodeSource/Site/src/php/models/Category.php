<?php
/*
    ETML
    Auteur :        Aurélien Devaud
    Date :          08.04.2022
    Description :   Defines a category of books and allow to find all books related
*/

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

    }

    /**
     * Get all the categories from the database
     * @return array returns all the categories
     */
    public static function getAllCategories() : array{

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

    }
}
?>