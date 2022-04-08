<?php
/*
    ETML
    Auteur :        Aurélien Devaud
    Date :          06.04.2022
    Description :   Class alowing to manage and define books
*/

/**
 * Class alowing to manage and define books
 */
class Book{

    /**
     * Get the book in the database that posesses the corresponding ID
     * @param $bookId => id of the book to search 
     * @return Book returns the book found
     */
    static public function getBookByIs(int $bookId) : Book{

    }

    /**
     * Delete the book with the corresponding id from the database
     * @param $bookId => id of the book to delete
     */
    static public function delete(int $bookId){

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

    }

    /**
     * Get the appreciations of the book
     * @return array returns the appreciations of the book
     */
    public function getAppreciations() : array{

    }

    /**
     * Get the average evaluation of the book
     * @param double returns the average evaluation of the book
     */
    public function getAverageEvaluation() : double{

    }
}
?>