<?php
    require_once 'authController.php';
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
        <form method="post" action="index.php" class="form">
            <h1 class="form_title">Sign up form</h1>

            <div class="form_div">
                    <input type="email" name="mail" class="form_input" placeholder=" " required>
                    <label for="" class="form_label">Email</label>
            </div>
            <div class="form_div">
                <input type="text" name="firstname" class="form_input" placeholder=" ">
                <label for="" class="form_label">First name</label>
            </div>
            <div class="form_div">
                <input type="text" name="lastname" class="form_input" placeholder=" ">
                <label for="" class="form_label">Last name</label>
            </div>
            <input class="form_button" name="submit" value="Sign Up" type="submit">
            </form>
    </div>

</body>
</html>