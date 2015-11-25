<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="header">
    <div class="row">
        <div class="col-md-3">
            <a href="Index.php"><img src="images/LogoWebsitenotxt.png" width="200px" height="150px"></a>
        </div>
        <div class="col-md-6">
            <h1>Eenmaal, Andermaal</h1>
            <h2>Zo, verkocht</h2>
        </div>
        <div class="col-md-2">
            <form class="login">
                <h3>Inloggen</h3>
                <label for="inputEmail" class="sr-only">E-mail</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="E-mail Adres" required autofocus>
                <label for="inputPassword" class="sr-only">Wachtwoord</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Wachtwoord" required>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Onthoud mij
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="navbar col-md-8">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="Index.php">Home</a></li>
                <li><a href="Index.php">Over Ons</a></li>
                <li><a href="Index.php">Producten</a></li>
            </ul>
        </div>
    </div>
    </div>