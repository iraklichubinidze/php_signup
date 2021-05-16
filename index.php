<?php include "header.php"; ?>
        <div id="box">
            <?php if ($_GET['email']=='sent'): ?>
                <div class="alert alert-success" role="alert">
                    <center>The Email was sent successfully</center>
                </div>
            <?php endif; ?>
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
    $(document).ready(function (event){
        event.preventDefault();
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
<?php
    if ($_GET['success'] === "true") {
        $subject = "Verification";
        $mailFrom = $_POST['email'];
        $message = "Hello, You have successfully registered";
        $mailTo = "ikchubinidze18@gmail.com";
        $headers = "From: " . $mailFrom;
        $txt = "You have recieved an e-mail from " . $username . ".\n\n" . $message;
        mail($mailTo, $subject, $txt, $headers);
        header('Location: ./index.php?email=sent');
    }

