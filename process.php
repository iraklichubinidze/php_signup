<?php
require_once('config.php');

if(isset($_POST)){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users (firstname,lastname,email) VALUES(?,?,?)";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$firstname,$lastname,$email]);
    if($result){
        echo 'Successfully saved !';
    }
    else {
        echo 'There were errors while saving the data !';
    }
}
else {
    echo 'No data';
}