<?php

$error = ""; $successMessage="";
if($_POST){
    
    // email required
    if(!$_POST["email"]){
        $error .= "An email address is required.<br>";
    }
    // subject required
    if(!$_POST["subject"]){
        $error .= "A subject is required.<br>";
    }
    // content required
    if(!$_POST["content"]){
        $error .= "The content field is required.<br>";
    }
    // email validation

    if(filter_var($POST["email"] && FILTER_VALIDATE_EMAIL) === false){
        $error .="The email address is invalid<br>";
    }

    if($error != ""){
        $error = '<div class="alert alert-danger" role="alert"> <p><strong>There were error(s) in your form: </strong></p>' . $error . '</div>';
    }else {
        $emailTo = "me@mydomain.com";
        $subject = $_POST['subject'];
        $content = $_POST['content'];
        $headers = "From: ".$_POST['email'];

        if(mail($emailTo, $subject, $content, $headers)){
            $successMessage = '<div class="alert alert-success" role="alert">Your message was sent, we will get back to you soon!</div>';
        }
    }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Form</title>
  </head>
  <body>
    <div class="container">
        <div id="error"><? echo $error.$successMessage; ?></div>
        <h1>Get in Touch!</h1>
        <!-- form -->
        <form method="post">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
  </div>

  <div class="form-group">
    <label for="subject">Subject</label>
    <input type="text" name="subject" class="form-control" id="subject">
  </div>

  <div class="form-group">
    <label for="content">What would you like to ask as us?</label>
    <textarea class="form-control" name="content" id="content" rows="3"></textarea>
  </div>
  <button type="submit" id="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
    <!-- JS Script -->

    <script type="text/javascript">

    $("form").submit(function (e){
      

        let error ="";

        if($("#email").val() == ""){
            error+= "The email field is required!<br>";
        }

        if($("#subject").val() == ""){
            error+= "The subject field is required!<br>";
        }

        if($("#content").val() == ""){
            error+= "The content field is required!";
        }

        if(error != ""){
            $("#error").html('<div class="alert alert-danger" role="alert"> <p><strong>There were error(s) in your form: </strong></p>' + error + '</div>');
        } return false;
        else{
           return true;
        }

    });
    </script>
  </body>
</html>