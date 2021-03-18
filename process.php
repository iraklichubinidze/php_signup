<?php
    require_once('config.php');
?>
<?php
if(isset($_POST)){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users (email,firstname,lastname) VALUES(?,?,?)";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$email,$firstname,$lastname]);
    if($result){
        echo "success";
    }else {
        echo "there were errors while saving the data";
    }
} else {
    echo 'No data';
}