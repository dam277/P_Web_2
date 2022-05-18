<?php
/*
    ETML
    Auteur :        Aurélien Devaud
    Date :          11.05.2022
    Description :   Controls the Verification of the addition of a book
*/

require_once(__DIR__ . "/../models/Book.php");
require_once(__DIR__ . "/../models/User.php");

/**
 * Controls the Verification of the addition of a book
 */
class VerifyBookAdditionController{

    //declare variables
    public array $errors;

    /**
     * Construct the instance of the class
     * @param $bookToAdd => book to verify to add
     */
    public function __construct(Book $bookToAdd)
    {
        //verify the authority of the user
        if ($_SESSION["user"]["permLevel"] > 0){
            //check for errors
            $this->errors = $bookToAdd->checkForErrors();

            //test if the book can be added
            if (count($this->errors) == 0){
                $bookToAdd->insert();
                $this->uploadFile($bookToAdd);
            }
        }
    }

    private function uploadFile(Book $bookToAdd) : void
    {
        // The target directory of uploading is uploads
        $target_dir =__DIR__ . "/../../../resources/tempImages/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $uOk = true;

        // Check if file already exists
        if (file_exists($target_file)) 
        {
            echo "file already exists.<br>";
            $uOk = false;
        }
        
        // Check if $uOk is set to false 
        if ($uOk == false) 
        {
            echo "Your file was not uploaded.<br>";
        } 
        
        // if uOk=true then try to upload file
        else 
        {
            // $_FILES["file"]["tmp_name"] implies storage path
            // in tmp directory which is moved to uploads
            // directory using move_uploaded_file() method
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) 
            {
                echo "The file ". basename($_FILES["file"]["name"]) . " has been uploaded.<br>";
                
                // Moving file to New directory 
                if(rename($target_file, __DIR__ . "/../../../resources/bookImages/". basename("bookId_" . $bookToAdd->id . ".jpg"))) {
                    echo "File moving operation success<br>";
                }
                else 
                {
                    echo "File moving operation failed..<br>";
                }
            }
            else 
            {
                echo "Sorry, there was an error uploading your file.<br>";
            }
        }        
    }

    /**
     * Show the page of the book's details if the book was added or reshow the adding page
     */
    public function show(){
        //verify if authorized
        if ($_SESSION["user"]["permLevel"] > 0)
        {
            $_SESSION["allCategories"] = [];

            $allCategories = Category::GetAllCategories();

            foreach ($allCategories as $category){
                $_SESSION["allCategories"][] = [$category->id, $category->name];
            }
            
            $_SESSION["errors"] = $this->errors;
            header("location: ./02-CodeSource/Site/src/php/views/addBook.php");
        }
        else
        {
            /////////////////////send to error page///////////////////////////
            header("location: ./02-CodeSource/Site/src/php/views/errors/error403.php");
        }
    }
}

?>