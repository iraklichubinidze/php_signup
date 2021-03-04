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
</head>

<body>
<div>
    <?php
        if(isset($_POST['create'])){
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];

            $sql = "INSERT INTO users (firstname,lastname,email) VALUES(?,?,?)";
            $stmtinsert = $db->prepare($sql);
            $result = $stmtinsert->execute([$firstname,$lastname,$email]);
           
        }
    ?>
</div>


<form action="index.php" method="post">
<div id="login-box">
    <div class="left">
            <h1>Sign up form</h1>
<!--            <input  required for="firstname" id="mail-name" type="text" name="firstname" placeholder="First Name" />-->
<!--            <input  required for="lastname" id="mail-lastname" type="text" name="lastname" placeholder="Last Name" />-->
<!--            <input  required for="email" id="mail-email" type="text" name="email" placeholder="E-mail" />-->
<!--            <input  required id="mail-submit" type="submit" name="submit" value="Sign me up" />-->
            <label for="firstname"><b>FIrst name</b></label>
            <input class="firstname-j" id="mail-name" type="text" name="firstname" required>

            <label for="lastname"><b>Last name</b></label>
            <input class="lastname-j" id="mail-lastname" type="text" name="lastname" required>

            <label for="email"><b>Email Address</b></label>
            <input class="email-j" id="mail-email" type="email" name="email" required>

            <input class="submit-j" type="submit" id="mail-submit" name="create" value="Sign Up">
            

            <p class="form-message"></p>
    </div>
</div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    $(function() {
        $('#mail-submit').click(function(e){
            var valid = this.form.checkValidity();

            if(valid){
                var firstname = $('.firstname-j').val();
                var lastname = $('.lastname-j').val();
                var email = $('.email-j').val();

                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: 'process.php',
                    data: {firstname: firstname,lastname: lastname,email: email},
                    success: function(data){
                        Swal.fire({
                            'title': 'Successful',
                            'text': data,
                            'type': 'success'
                            })
                    },
                    error: function(data){
                        Swal.fire({
                            'title': 'Errors',
                            'text':  data,
                            'type': 'error'
                            })
                }
            });
        }
        else {

        }
    });
});
</script>

</body>
</html>