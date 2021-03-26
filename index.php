<?php
    require_once('config.php');
    $email     = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    session_start();
    $_SESSION['message']='';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="icon" href="img/fingerprint-24px.svg">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="form-1">
        <form class="form" method="post" action="includes/signup.inc.php">
            <h1 class="form_title">Sign up form</h1>
            <div class="errormsg">
                <?php
                    if(isset($_GET['error'])) {
                        if($_GET['error'] == "emptyinput"){
                            echo "<p>Fill in all fields !</p>";
                        }
                        else if($_GET['error'] == 'invaliduid'){
                            echo "<p>Choose a correct username !</p>";
                        }
                        else if($_GET['error'] == 'invalidemail'){
                            echo "<p>Choose a correct email !</p>";
                        }
                        else if($_GET['error'] == 'passwordsdontmatch'){
                            echo "<p>Passwords doesn't match !</p>";
                        }
                        else if($_GET['error'] == 'stmtfailed'){
                            echo "<p> Something went wrong, try again !</p>";
                        }
                        else if($_GET['error'] == 'usernametaken'){
                            echo "<p>Username already taken !</p>";
                        }
                        else if($_GET['error'] == 'none') {
                            echo "<p class='success'> You have signed up ! ! !</p>";
                        }
                    }
                ?>
            </div>
            <br>
<!-- EMAIL -->
            <div class="form_div">
                <label for="email"><b>Email:</b></label>
                <input type="email" id="form_email" name="email" class="form_input" placeholder="Required">
            </div>
<!-- Name -->
            <div class="form_div">
                <label for="" class="form_label"><b>Full Name</b></label>
                <input type="text" id="form_firstname" name="name" class="form_input" placeholder="Required">
            </div>
<!-- uid -->
            <div class="form_div">
                <label for="" class="form_label"><b>Username</b></label>
                <input type="text" id="form_lastname" name="uid" class="form_input" placeholder="Required">
            </div>
<!-- pwd -->
            <div class="form_div">
                <label for="" class="form_label"><b>Password</b></label>
                <input type="password" id="form_lastname" name="pwd" class="form_input" placeholder="Required">
            </div>
<!-- pwdrepeat -->
            <div class="form_div">
                <label for="" class="form_label"><b>Repeat Password</b></label>
                <input type="password" id="form_lastname" name="pwdrepeat" class="form_input" placeholder="Required">
            </div>
                    <input class="form_button" name="submit" id="register" value="Sign Up" type="submit">
            </form>
    </div>

</body>
</html>