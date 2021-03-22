<?php
    require_once('config.php');
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
        <form class="form" method="post" action="index.php">

            <h1 class="form_title">Sign up form</h1>
            <div class="error">
                <?php
                    $_SESSION['message'];
                ?>
            </div>
            <div class="form_div">
                <label for="email"><b>Email:</b></label>
                <input type="email" id="form_email" name="email" class="form_input" placeholder=" " required>
            </div>

            <div class="form_div">
                <label for="" class="form_label"><b>First name</b></label>
                <input type="text" id="form_firstname" name="firstname" class="form_input" placeholder=" " required>
            </div>

            <div class="form_div">
                <label for="" class="form_label"><b>Last name</b></label>
                <input type="text" id="form_lastname" name="lastname" class="form_input" placeholder=" " required>
            </div>
                    <input class="form_button" name="submit" id="register" value="Sign Up" type="submit">
            </form>
    </div>
    <?php
    $sql = "INSERT INTO users (email,firstname,lastname) VALUES (?,?,?)";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$_POST['email'], $_POST['firstname'], $_POST['lastname']]);
?>

</body>
</html>