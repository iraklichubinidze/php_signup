<?php
    require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="icon" href="img/fingerprint-24px.svg">
    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("form").submit(function(event) {
                event.preventDefault();
                var name = $("#mail-name").val();
                var lastname = $("#mail-lastname").val();
                var email = $("#mail-email").val();
                var submit = $("#mail-submit").val();
                $(".form-message").load("mail.php", {
                    name: name,
                    lastname: lastname,
                    email: email,
                    submit: submit
                });
            });
        });
    </script>
</head>

<body>
<div>
    <?php
        if(isset($_POST['submit'])){
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
                echo 'There were errors while saving the data';
            }
        }

    ?>
</div>


<form action="mail.php" method="POST">
<div id="login-box">
    <div class="left">
            <h1>Sign up form</h1>
            <input  required for="firstname" id="mail-name" type="text" name="firstname" placeholder="First Name" />
            <input  required for="lastname" id="mail-lastname" type="text" name="lastname" placeholder="Last Name" />
            <input  required for="email" id="mail-email" type="text" name="email" placeholder="E-mail" />
            <input  required id="mail-submit" type="submit" name="submit" value="Sign me up" />
            <p class="form-message"></p>
    </div>
</div>
</form>

</body>
</html>