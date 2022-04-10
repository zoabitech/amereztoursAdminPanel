<?php
require_once("Admin.php");
require_once("Order.php");
require_once("Attraction.php");
class dbClass
{
    private $host;
    private $db;
    private $charset;
    private $user;
    private $pass;
    private $opt = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );
    private $connection;

    public function __construct(
        string $host = "localhost",
        string $db = "ame_rez_tours",
        string $charset = "utf8",
        string $user = "root",
        string $pass = ""
    ) {
        $this->host = $host;
        $this->db = $db;
        $this->charset = $charset;
        $this->user = $user;
        $this->pass = $pass;
    }

    //connection to the db
    private function connect()
    {
        $dns = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $this->connection = new PDO($dns, $this->user, $this->pass, $this->opt);
    }

    //disconnection from the db
    public function disconnect()
    {
        $this->connection = null;
    }

    //get orders from the data base
    public function getOrders()
    {
        $this->connect();
        $orders = array();
        $result = $this->connection->query("SELECT * FROM orders");
        while ($row = $result->fetchObject('Order')) {
            $orders[] = "Order no. " . $row->getOrderNum() . "\nPrice: " . $row->getPrice() . "\nDate: " . $row->getDateTime() . "\nStatus: " . $row->getStatus() . "\nCustomer no. " . $row->getCustNum() . "\n";
        }
        $this->disconnect();
        return $orders;
    }
    //get all new order from the db
    public function getNewOrders()
    {
        $this->connect();
        $orders = array();
        $result = $this->connection->query("SELECT * FROM orders WHERE status = 'New'");
        while ($row = $result->fetchObject('Order')) {
            $orders[] = "Order no. " . $row->getOrderNum() . "\nPrice: " . $row->getPrice() . "\nDate: " . $row->getDateTime() . "\nStatus: " . $row->getStatus() . "\nCustomer no. " . $row->getCustNum() . "\n";
        }
        $this->disconnect();
        return $orders;
    }

    //insert new admin to the db
    public function insertAdmin(Admin $a): bool
    {
        $this->connect();
        $newPassw = md5($a->getUserPassword());
        $statement = $this->connection->prepare("INSERT INTO admins VALUES(:username, :email, :password)");
        $param = [":username" => $a->getUserName(), ":email" => $a->getEmail(), ":password" => $newPassw];
        $result = $statement->execute($param);
        $this->disconnect();
        return $result;
    }

    //select admin from the db and return the username
    public function selectAdmin(string $username, string $password): string
    {
        $this->connect();
        $password = md5($password);
        $statement = $this->connection->prepare("SELECT * FROM admins WHERE username = :username and password = :password");
        $statement->execute([":username" => $username, ":password" => $password]);
        $result = $statement->fetchObject('Admin');
        $this->disconnect();
        if ($result === false)
            return "";
        return $result->getUserName();
    }

    //check if the user exist in the db 
    public function checkUserExist($username): string
    {
        $this->connect();
        $statement = $this->connection->prepare("SELECT * FROM admins WHERE username = '$username'");
        $statement->execute();
        $result = $statement->fetchObject('Admin');
        $this->disconnect();
        if ($result === false)
            return "";
        return $result->getUserName();
    }

    //update the password of the user on the db
    public function updatePassword($username, $password): bool
    {
        try {
            $this->connect();
            $newPassword = md5($password);
            // set the PDO error mode to exception
            $sql = "UPDATE admins SET password='$newPassword' WHERE username='$username'";
            // Prepare statement
            $stmt = $this->connection->prepare($sql);
            // execute the query
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
            return false;
        }
        $this->disconnect();
    }
    //insert an attraction into the the db
    public function insertAttraction(Attraction $a)
    {

        $this->connect();
        $statement = $this->connection->prepare("INSERT INTO admins VALUES(:location, :availablity, :cost,:journey_duration
                                                :tourit_guide,:descrotion,:attraction_image)");
        $param = [
            ":location" => $a->getLocation(), ":availablity" => $a->getAvailablity(), ":cost" => $a->getCost(),
            ":journey_duration" => $a->getJourneyDuration(), ":tourit_guide" => $a->getTouritGuide(), ":description" => $a->getDescription(), ":attraction_image" =>  $a->getAttractionImage()
        ];
        $result = $statement->execute($param);
        $this->disconnect();
        return $result;
    }
}
