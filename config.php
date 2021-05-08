<?php

class pdoConnection{
    private $servername;
    private $db_name;
    private $db_user;
    private $db_pass;

    public function __construct($servername, $db_name, $db_user, $db_pass)
    {
        $this->servername = $servername;
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
    }

    public function setServername($servername): void
    {
        $this->servername = $servername;
    }
    public function getServername()
    {
        return $this->servername;
    }

    public function setDbName($db_name): void
    {
        $this->db_name = $db_name;
    }
    public function getDbName()
    {
        return $this->db_name;
    }


    public function setDbUser($db_user): void
    {
        $this->db_user = $db_user;
    }
    public function getDbUser()
    {
        return $this->db_user;
    }


    public function setDbPass($db_pass): void
    {
        $this->db_pass = $db_pass;
    }
    public function getDbPass()
    {
        return $this->db_pass;
    }

}
    $conn = new pdoConnection('localhost','php_signup','root','');
try {

    $pdo = new PDO('mysql:host='.$conn->getServername().';dbname='.$conn->getDbName().';', $conn->getDbUser(), $conn->getDbPass());
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo 'Connection failed' . $e->getMessage();
}