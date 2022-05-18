<?php
/*
    ETML
    Auteur :        Aurélien Devaud
    Date :          08.04.2022
    Description :   Class alowing to access the database
*/

/**
 * Class alowing to access the database
 */
class Database {
    //instance
    static private $instance;
 
    /**
     * Get the database
     * @return Database unique database
     */
    public static function getDatabase() : Database{
        if (Database::$instance == false){
            $serverInfo = json_decode(file_get_contents(__DIR__ . "/secure/config.json"),true, 2, JSON_OBJECT_AS_ARRAY);
            $login = json_decode(file_get_contents(__DIR__ . "/secure/secret.json"),true, 2, JSON_OBJECT_AS_ARRAY);
            Database::$instance = new Database(
                "mysql:host=".$serverInfo["host"].";dbname=".$serverInfo["databaseName"].";charset=".$serverInfo["charset"],
                $login["username"],
                $login["password"]
            );
        }

        return Database::$instance;
    }

    // connection
    private $connector;

    /**
     * Construct the object
     * @param $dsn => the string of connection, with the host, name of the database and charset
     * @param $username => name of the user
     * @param $password => password of the user
     */
    private function __construct(string $dsn, string $username, string $password){
        try{
            // TODO : Mettre en place un fichier config.php pour stocker l'ensemble des infos de config
            // et un secrets.json pour la gestion des secrets ex: mot de passe de du user de DB
            $this->connector = new PDO($dsn, $username, $password);
        }catch(PDOException $e){
            die("Error : " . $e->getMessage());
        }
    }

    /**
     * Does a simple execution
     * @param $query => query to execute
     * @return array result of the query, an associative array
     */
    public function querySimpleExecute($query) : array{

        $req = $this->connector->query($query);
        return $this->formatData($req);
    }

    /**
     * Prepare and execute a query
     * @param $query => query to execute
     * @param $binds => binds of the query
     * @return array the result of the query as an assiosiative array
     */
    public function queryPrepareExecute($query, $binds) : array{
        $req = $this->connector->prepare($query);
        //bind
        foreach ($binds as $bind){
            $req->bindValue($bind["param"], $bind["value"], $bind["type"]);
        }
        $req->execute();

        return $this->formatData($req);
    }

    /**
     * Format the req to an assoc array
     * @param $req => req to format
     * @return array the fetched array
     */
    private function formatData($req) : array{

        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Unset data
     * @param $req => request to close
     */
    public function unsetData($req) : void{

        $req->closeCursor();
    }

    /**
     * Link a book and a category
     * @param $bookId => Id of the book to link
     * @param $categoryId => Id of the category to link
     */
    public function linkBookToCategory(int $bookId, int $categoryId){
        queryPrepareExecute(
            "INSERT INTO `t_categorize` (`idBook`, `idCategory`) VALUES (:bookId, :categoryId);", 
            [
                ["param" => "bookId", "value" => $bookId, "type" => PDO::PARAM_INT],
                ["param" => "categoryId", "value" => $categoryId, "type" => PDO::PARAM_INT]
            ]
        );
    }
}
?>