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
    <?php 
        $firstnameErr = $lastnameErr = $emailErr = "";
        $firstname2 = $lastname2 = $email2 = "";
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if(empty($_POST['firstname2'])) {
                $firstnameErr = "Firstname is required ! ";
            }else {
                $firstname2 = test_input($_POST['firstname2']);
                if(!preg_match("/^[a-zA-Z ]*$/",$firstname2)){
                    $firstnameErr = "Only letters and spaces are allowed ! ";
                }
            }
            if(empty($_POST['lastname2'])) {
                $lastname2 = "Lastname is required ! ";
            }else {
                $lastname2 = test_input($_POST['lastname2']);
                if(!preg_match("/^[a-zA-Z ]*$/",$lastname2)){
                    $lastnameErr = "Only letters and spaces are allowed ! ";
                }
            }
            
            if(empty($_POST['email2'])) {
                $emailErr = 'Email adress is required ! ';
            } else {
                $email2 = test_input($_POST['email2']);
                if(!filter_var($email2,FILTER_VALIDATE_EMAIL)){
                    $emailErr = "Email format is incorrect ! ";
                }
            }
        }    
    
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
    ?>



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


<div id="login-box">
    <div class="left">
            <h1>Sign up form</h1>
            <p><span class="error">* Required field</span></p>
            <br> 
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

                <label for="firstname"><b>FIrst name</b></label>
                <span class="error">* <?php echo $firstnameErr; ?> </span>
                <input value="<?php echo $firstname2; ?>" class="firstname-j" id="mail-name" type="text" name="firstname" required>


                <label for="lastname"><b>Last name</b></label>
                <span class="error">*<?php echo $lastnameErr; ?> </span>
                <input value="<?php echo $lastname2; ?>" class="lastname-j" id="mail-lastname" type="text" name="lastname" required>

                <label for="email"><b>Email Address</b></label>
                <span class="error">*<?php echo $emailErr; ?> </span>
                <input value="<?php echo $email2; ?>" class="email-j" id="mail-email" type="text" name="email" required>
            

            <input class="submit-j" type="submit" id="mail-submit" name="create" value="Sign Up">
            </form>            
    </div>
</div>

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