<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Business social network">
    <meta name="author" content="AcaSax, RešivoJe">
    <title>Nordic Bar</title>
    <link rel="stylesheet" type="text/css" href="admin/css/main.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/swall/sweetalert.css" />
    <!--Bootstrap-->
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
<form  method="POST" class="form-signin" id="login_form">
    <h1 class="h3 mb-3 font-weight-normal text-center">Sing in</h1>
    <div class="form-group">
        <label for="reg_email" class="control-label" >E-mail</label>
        <input type="text" name="reg_email" id="reg_email" onblur="$(this).valid()" placeholder="xxxxxx@xxxx.xxx" class="form-control" value="<?php
        if (isset($_SESSION['reg_email'])){
            echo $_SESSION['reg_email'];
        }
        ?>" >
    </div>
    <div class="form-group">
        <label for="reg_password" class="control-label" >Password</label>
        <input type="password" name="reg_password" id="reg_password" onblur="$(this).valid()" class="form-control" >
    </div>
    <div class="form-group text-center w-100">
        <input type="submit" name="login_button" id="login_button" value="Sing in" class="btn btn-lg btn-primary btn-block" style="margin-top: 35px;">
    </div>
</form>


<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script type="text/javascript" language="javascript" src="js/login.js" ></script>
<script type="text/javascript" language="javascript" src="vendor/swall/sweetalert.js" ></script>

<script src="vendor/form-validation/jquery.form.js"></script>
<script src="vendor/form-validation/jquery.validate.min.js"></script>
<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/77c0d793ed.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
