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
    <script src="jquery-3.6.0.js"></script>
    

</head>
<body>

            <a href="index.php" style="text-decoration: none;"><h1 class="form_title">Sign up form</h1></a>
            <?php include_once 'includes/msg.php'?>
            <br>
        <div id="box">
        <form class="form" method="post" action="<?php
        if(empty($errors) && isset($submit)){echo "php_sendmail/sendmail.php";}
        ?>">
<!-- EMAIL -->
            <div class="form_div">
                <label for="email"><b>Email:</b></label>
                <input type="text" id="email" name="email" class="form_input" placeholder="Required" value="<?php echo $email;  ?>">
            </div>
<!-- uid -->
            <div class="form_div">
                <label for="" class="form_label"><b>Username</b></label>
                <input type="text" id="username" name="username" class="form_input" placeholder="Required" value="<?php echo $username; ?>">
            </div>
<!-- pwd -->
            <div class="form_div">
                <label for="" class="form_label"><b>Password</b></label>
                <input type="password" id="pwd" name="pwd" class="form_input" placeholder="Required">
            </div>
<!-- pwdrepeat -->
            <div class="form_div">
                <label for="" class="form_label"><b>Repeat Password</b></label>
                <input type="password" id="pwdrepeat" name="pwdrepeat" class="form_input" placeholder="Required">
            </div>
                <input class="form_button" name="submit" id="submit" value="Sign Up" type="submit" onclick="">
            </form>
        </div>
<script>
    $(document).ready(function (){
       $('#submit').click(function (){
           var email     = $('#email').val();
           var username  = $('#username').val();
           var pwd       = $('#pwd').val();
           var pwdrepeat = $('#pwdrepeat').val();

           if ($.trim(email).length > 0 && $.trim(username).length > 0 &&
               $.trim(pwd).length > 0 && $.trim(pwdrepeat).length > 0 )
           {
               $.ajax({
                   url: "index.php",
                   method: "POST",
                   data: {email: email, username: username, pwd: pwd, pwdrepeat: pwdrepeat},
                   cache: false,
                   beforesend: function ()
                   {
                     $('#submit').val("connecting...");
                   },
                   success: function (data)
                   {
                       if(data)
                       {
                           $("body").load("index.php").hide().fadeIn(1500);
                       }
                       else
                       {
                           var options = {
                               distance: '40',
                               direction: 'left',
                               times: '3'
                           }
                       }
                       $("#box").effect("shake", options, 800);
                       $("#submit").val("Submit");
                   }
               });
           }
       });
    });
</script>



</body>
</html>