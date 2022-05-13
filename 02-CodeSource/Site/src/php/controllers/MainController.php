<?php
/*
    ETML
    Auteur :        Aurélien Devaud
    Date :          06.05.2022
    Description :   Controls the application
*/

require_once("../models/User.php");
require_once("./VerifyLogInController.php");
require_once("./LogInController.php");
require_once("./HomeController.php");
require_once("./BookDetailController.php");
require_once("./AddBookController.php");
require_once("./UserDetailController.php");
require_once("./VerifyAppreciationAdditionController.php");
require_once("./VerifyBookAdditionController.php");

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
            $action = $_GET["action"];
        }
        else{
            $action = "goHome";
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

        //test if the user is connected in the cookies
        if (isset($_COOKIE["sessionId"]) && !isset($_SESSION["user"])){
            $this->connectWithSessionId($_COOKIE["sessionId"]);
        }

        //find what action to do
        switch($this->action){
            case "verifyLogIn":
                if (isset($_POST["nickname"]) && isset($_POST["password"])){

                    $controller = new VerifyLogInController($_POST["nickname"], $_POST["password"]);
                    if ($controller->valid){
                        $this->createNewSession($controller->user->id);
                    }
                    $controller->show();
                }
                else{
                    /////////////////////send to error page///////////////////////////
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

            case "bookDetail":
                if (isset($_GET["bookId"])){
                    $controller = new BookDetailController($_GET["bookId"]);
                    $controller->show();
                }
                else{
                    /////////////////////send to error page///////////////////////////
                }
                break;

            case "userDetail":
                if (isset($_GET["bookId"])){
                    $controller = new UserDetailController($_GET["userId"]);
                    $controller->show();
                }
                else{
                    /////////////////////send to error page///////////////////////////
                }
                break;

            case "addBook":
                $controller = new AddBookController();
                $controller->show();
                break;

            case "verifyBook":
                if (isset($_GET["title"]) && isset($_GET["pageNumber"]) && isset($_GET["summary"])
                && isset($_GET["authorName"]) && isset($_GET["editorName"]) && isset($_GET["editorYear"])
                && isset($_GET["extract"]) && isset($_GET["userId"])){
                    $controller = new VerifyBookAdditionController(
                        new Book(null, $_GET["title"], $_GET["pageNumber"],
                        $_GET["summary"],$_GET["authorName"],$_GET["editorName"],
                        $_GET["editorYear"],$_GET["extract"],$_GET["userId"]));
                    $controller->show();
                }
                else{
                    /////////////////////send to error page///////////////////////////
                }
                break;

            case "verifyAppreciation":
                if (isset($_GET["evaluation"]) && isset($_GET["bookId"])){
                    $controller = new VerifyAppreciationAdditionController($_GET["bookId"], $_GET["evaluation"]);
                    $controller->show();
                }
                else{
                    /////////////////////send to error page///////////////////////////
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
    private function connectWithSessionId(int $sessionId) : void{
        $_SESSION["user"] = User::getUserById(Session::getSessionById($sessionId)->id);
        $_SESSION["isConnected"] = true;
        $_SESSION["userId"] = $_SESSION["user"]->id;
    }

    /**
     * Create a new session
     * @param $userId => id of the user
     */
    private function createNewSession(int $userId){
        $session = new Session(null, $userId);
        $session->insert();
        setcookie("sessionId", $session->id, time()+60*60*24*30);
        $this->connectWithSessionId($session->id);
    }

    /**
     * Log out the user
     */
    private function logOut(){
        //delete user
        unset($_SESSION["user"]);
        unset($_SESSION["userId"]);
        $_SESSION["isConnected"] = false;

        //delete cookie
        setcookie("sessionId", 0, 0);
    }
}

?>