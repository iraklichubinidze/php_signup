<?php
require 'funcs.php';
require_once 'config.php';

$errors=[];
$email     = '';
$username  = '';
$pwd       = '';
$pwdRepeat = '';

if($_SERVER['REQUEST_METHOD']==="POST")
{
    $email = safe_data('email');
    $username = safe_data('username');
    $pwd = safe_data('pwd');
    $pwdRepeat = safe_data('pwdrepeat');

    if (!$email) {
        $errors['email'] = requiredRule('Email');
    } else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Email field must be valid address';
    }

    if (!$username){
        $errors['username'] = requiredRule('Username');
    } else if(strlen($username) < 6 || strlen($username) > 16){
        $errors['username'] = 'Username must be in between 6 and 16 characters';
    }

    if (!$pwd || !$pwdRepeat){
        $errors['pwd'] = requiredRule('Password');
    }
    if($pwd && $pwdRepeat && strcmp($pwd,$pwdRepeat)!==0){
        $errors['pwdRepeat'] = 'Passwords must match';
    }

if (empty($errors)){
    $sql = "INSERT INTO users (email,username,password) VALUES (:email,:username,:password)";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute(['email' => $email, 'username' => $username, 'password' => $pwd]);
    header('Location: ./index.php?success=true');
}
}