<?php
/*
    ETML
    Auteur :        Aurélien Devaud
    Date :          06.05.2022
    Description :   Controls the application
*/

require_once(__DIR__ . "/../models/User.php");
require_once(__DIR__ . "/LogInController.php");
require_once(__DIR__ . "/SignUpController.php");
require_once(__DIR__ . "/ContactUsController.php");
require_once(__DIR__ . "/HomeController.php");
require_once(__DIR__ . "/AddBookController.php");
require_once(__DIR__ . "/BookDetailController.php");
require_once(__DIR__ . "/UserDetailController.php");
require_once(__DIR__ . "/VerifyAppreciationAdditionController.php");
require_once(__DIR__ . "/VerifyBookAdditionController.php");
require_once(__DIR__ . "/VerifyLogInController.php");
require_once(__DIR__ . "/VerifySignUpController.php");
require_once(__DIR__ . "/BookListController.php");


/**
 * Controls the application
 */
class MainController{

    //declare variables
    public string $action = "";

    /**
     * Construct the instance in order to prepare for the start
     */
    public function __construct(){
        //test if an action is found
        if (isset($_GET["action"])){    
           $this->action = $_GET["action"];
        }
        else{
           $this->action = "goHome";
        }
    }

    /**
     * Start the application
     */
    public function start(){
        //preset the variables if not exist
        if (!isset($_SESSION["isConnected"])){
            $_SESSION["isConnected"] = false;
        }

        //preset the variable of permLevel if not exists
        if (!isset($_SESSION["permLevel"])) {
            $_SESSION["permLevel"] = 0;
        }

        //test if the user is connected in the cookies
        if (isset($_COOKIE["sessionId"]) && !isset($_SESSION["user"])){
            $this->connectWithSessionId($_COOKIE["sessionId"]);
        }

        //test if the session contains the list of books and if the redirection will not need them
        if (isset($_SESSION["books"]) && ($this->action == "verifyLogIn" || $this->action == "goHome" || $this->action == "logOut" 
        || $this->action == "logIn" || $this->action == "signUp" || $this->action == "contactUs" || $this->action == "userDetail" 
        || $this->action == "addBook" || $this->action == "verifyBook" || $this->action == "bookDetail" || $this->action == "verifyAppreciation")) {
            $_SESSION["books"] = null;
        }

        //test if the session contains the list of userInfos and if the redirection will not need them
        if (isset($_SESSION["userInfos"]) && $this->action != "userDetail") {
            $_SESSION["userInfos"] = null;
        }

        //test if the session contains the list of books and if the redirection will not need them
        if (isset($_SESSION["allCategories"]) && ($this->action != "bookList" || $this->action != "addBook")) {
            $_SESSION["allCategories"] = null;
        }

        //find what action to do
        switch($this->action){
            case "verifyLogIn":
                if (!empty($_POST["useNickname"]) && !empty($_POST["usePassword"])){

                    //Send the informations to the controller
                    $controller = new VerifyLogInController($_POST["useNickname"], $_POST["usePassword"]);
                    if ($controller->valid){
                        $this->createNewSession($controller->user["idUser"]);
                    }
                    $controller->show();
                }
                else{
                    /////////////////////send to error page///////////////////////////
                    header("location: ./02-CodeSource/Site/src/php/views/errors/error404.php");
                }
                break;

            case "verifySignUp":
                var_dump($_POST);
                if (!empty($_POST["useNickname"]) && !empty($_POST["usePassword"]) && !empty($_POST["usePasswordCheck"])){

                    //Send the informations to the controller
                    $controller = new VerifySignUpController($_POST["useNickname"], $_POST["usePassword"], $_POST["usePasswordCheck"]);
                    if ($controller->valid){
                        $this->createNewSession($controller->user["idUser"]);
                    }
                    $controller->show();
                }
                else{
                    /////////////////////send to error page///////////////////////////
                    header("location: ./02-CodeSource/Site/src/php/views/errors/error404.php");
                }
                break;

            case "goHome":
                $controller = new HomeController();
                $controller->show();
                break;

            case "logOut":
                $this->logOut();
                $controller = new HomeController();
                $controller->show();
                break;

            case "logIn":
                $controller = new LogInController();
                $controller->show();
                break;

            case "signUp":
                $controller = new SignUpController();
                $controller->show();
                break;

            case "contactUs":
                $controller = new ContactUsController();
                $controller->show();
                break;

            case "bookDetail":
                if (isset($_GET["bookId"])){
                    $controller = new BookDetailController($_GET["bookId"]);
                    $controller->show($_GET["bookId"]);
                }
                else{
                    /////////////////////send to error page///////////////////////////
                    header("location: ./02-CodeSource/Site/src/php/views/errors/error404.php");
                }
                break;
            
            case "bookList":
                if (isset($_POST)) {
                    $controller = new BookListController($_POST["category"]);
                }
                else
                {
                    $controller = new BookListController(null);
                }
                $controller->show();
                break;

            case "userDetail":
                if (isset($_GET["userId"])){
                    $controller = new UserDetailController($_GET["userId"]);
                    $controller->show();
                }
                else{
                    /////////////////////send to error page///////////////////////////
                    header("location: ./02-CodeSource/Site/src/php/views/errors/error404.php");
                }
                break;

            case "addBook":
                $controller = new AddBookController();
                $controller->show();
                break;

            case "verifyBook":
                if (isset($_POST["image"]) && isset($_POST["title"]) && isset($_POST["pageNumber"]) && isset($_POST["summary"])
                && isset($_POST["authorName"]) && isset($_POST["editorName"]) && isset($_POST["editorYear"])
                && isset($_POST["extract"]) && isset($_POST["userId"])){
                    $controller = new VerifyBookAdditionController(
                        new Book(null, $_POST["title"], $_POST["pageNumber"],
                        $_POST["summary"],$_POST["authorName"],$_POST["editorName"],
                        $_POST["editorYear"],$_POST["extract"],$_POST["userId"]));
                    $controller->show();
                }
                else{
                    /////////////////////send to error page///////////////////////////
                    header("location: ./02-CodeSource/Site/src/php/views/errors/error404.php");
                }
                break;

            case "verifyAppreciation":
                if (isset($_GET["evaluation"]) && isset($_GET["bookId"])){
                    $controller = new VerifyAppreciationAdditionController($_GET["bookId"], $_GET["evaluation"]);
                    $controller->show();
                }
                else{
                    /////////////////////send to error page///////////////////////////
                    header("location: ./02-CodeSource/Site/src/php/views/errors/error404.php");
                }
                break;

            default:
                $controller = new HomeController();
                $controller->show();
                break;
        }
    }

    /**
     * Connect with the session id
     * @param $sessionId => id of the session leading to the user
     */
    private function connectWithSessionId(int $userId) : void{

        //Get the user by ID
        $user = User::getUserById($userId);
        
        //Set the connected user
        $connectedUser = array("id" => $user->id, "nickname" => $user->nickname, "entryDate" => $user->entryDate, "permLevel" => $user->permLevel);

        $_SESSION["user"] = $connectedUser;
        $_SESSION["isConnected"] = true;
        $_SESSION["permLevel"] = $_SESSION["user"]["permLevel"];
    }

    /**
     * Create a new session
     * @param $userId => id of the user
     */
    private function createNewSession(int $userId){
        $session = new Session(null, $userId);
        $session->insert();
        setcookie("sessionId", $session->id, time()+60*60*24*30);
        $this->connectWithSessionId($userId);
    }

    /**
     * Log out the user
     */
    private function logOut(){
        //delete user
        unset($_SESSION["user"]);
        unset($_SESSION["userId"]);
        $_SESSION["isConnected"] = false;
        $_SESSION["permLevel"] = 0;

        //Delete the session from the database
        Session::delete($_COOKIE["sessionId"]);

        //delete cookie
        setcookie("sessionId", null, 0);
    }
}

?>