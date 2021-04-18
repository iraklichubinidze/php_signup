<?php
    require_once('config.php');
    require_once 'includes/signup.inc.php';


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="icon" href="img/fingerprint-24px.svg">
    <link rel="stylesheet" href="style/style1.css">
</head>
<body>
    <div class="form-1">
        <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <h1 class="form_title">Sign up form</h1>
            <?php if ($_SERVER['REQUEST_METHOD']==="POST" && !empty($errors)): ?>
            <div class="display-error">
                <?php
                    foreach ($errors as $error) {
                        echo $error . "<br>";
                    }
                ?>
            </div>
            <?php endif;?>
            <br>
<!-- EMAIL -->
            <div class="form_div">
                <label for="email"><b>Email:</b></label>
                <input type="text" id="form_email" name="email" class="form_input" placeholder="Required" value="<?php echo $email;  ?>">
            </div>
<!-- uid -->
            <div class="form_div">
                <label for="" class="form_label"><b>Username</b></label>
                <input type="text" id="form_lastname" name="username" class="form_input" placeholder="Required" value="<?php echo $username; ?>">
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