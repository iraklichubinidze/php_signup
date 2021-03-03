<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="style.css">
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
<form action="mail.php" method="POST">
<div id="login-box">
    <div class="left">

        <h1>Sign up form</h1> 
        <input  id="mail-name" type="text" name="firstname" placeholder="First Name" />
        <input  id="mail-lastname" type="text" name="lastname" placeholder="Last Name" />
        <input  id="mail-email" type="email" name="email" placeholder="E-mail" />

        <input id="mail-submit" type="submit" name="submit" value="Sign me up" />
        <p class="form-message"></p>

    </div>
</div>
</form>
</body>
</html>