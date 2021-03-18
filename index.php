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
    <link rel="stylesheet" href="style/style1.css">
</head>
<body>


    <div>

    </div>

    <div class="form-1">
        <form method="post" action="index.php" class="form">

            <h1 class="form_title">Sign up form</h1>

            <div class="form_div">
                    <input type="email" id="email" name="email" class="form_input" placeholder=" " required>
                    <label for="email"  class="form_label">Email</label>
            </div>

            <div class="form_div">
                    <input type="text" id="firstname" name="firstname" class="form_input" placeholder=" " required>
                    <label for="" class="form_label">First name</label>
            </div>

            <div class="form_div">
                    <input type="text" id="lastname" name="lastname" class="form_input" placeholder=" " required>
                    <label for="" class="form_label">Last name</label>
            </div>
                    <input class="form_button" name="submit" id="register" value="Sign Up" type="submit">
            </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script type="text/javascript">
        $(function (){
            $('#register').click(function (e){
                var valid = this.form.checkValidity();

                if(valid){
                    var email     = $('#email').val();
                    var firstname = $('#firstname').val();
                    var lastname  = $('#lastname').val();

                    e.preventDefault();
                    $.ajax({
                       type: 'POST',
                       url: 'process.php',
                       data: {email: email, firstname: firstname, lastname: lastname},
                       success: function (data){
                           Swal.fire({
                               'title': 'Successful',
                               'text':  data,
                               'type': 'success'
                           })
                       },
                       error: function (data){
                           Swal.fire({
                               'title': 'Errors',
                               'text':  'There were errors while saving the data',
                               'type': 'error'
                           })
                       }
                    });
                } else {

                }
            });

        });
    </script>
</body>
</html>