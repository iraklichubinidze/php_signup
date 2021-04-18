<?php
require 'FuncsAndConstants.php';
$errors=[];

if(isset($_POST['submit'])){
    require_once '../config.php';
    require_once 'functions.inc.php';
    try {
        $dsn = new PDO('mysql:host='.$serverName.';dbname='.$db_name,$db_user,$db_pass);
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['uid'];
        $pwd = $_POST['pwd'];
        $pwdRepeat = $_POST['pwdrepeat'];
        $stmt = $dsn->prepare("INSERT INTO users (usersName,usersEmail,usersUid,usersPwd) 
        VALUES(
               :usersName,:usersEmail,:usersUid,:usersPwd
        )");
        $stmt->bindParam(':usersName',$name);
        $stmt->bindParam(':usersEmail',$email);
        $stmt->bindParam(':usersUid',$username);
        $stmt->bindParam(':usersPwd',$pwd);
        if($stmt->execute()){
            echo "Successfully registered";
        }
    } catch (PDOException $e) {
        echo 'Connection failed' . $e->getMessage();
    }
}
if(!$email){
    $errors[$email] =
}
