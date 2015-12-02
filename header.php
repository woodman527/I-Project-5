<?php
    include('dbactions.php');
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
<div class="page-header">
    <div class="row">
       
        <div class="col-xs-8 col-md-10">
        <div class="media">
            <div class="media-right">
                <a href="#">
                <img class="media-object img-responsive" src="Images/LogoWebsitenotxt.png" alt="Logo" width="127" height="104">
                </a>
            </div>
                <h2 class="media-right media-middle media-heading"> Zo, verkocht! </h2>
            </div>
            
    
    <div class="col-xs-12 col-md-12">  
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">EenmaalAndermaal</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
          
        <li><a href="#">Over ons</a></li>
        <li><a href="#">Profiel</a></li>
          <li><a href="voorbeeldvoorwerp.php">Voorbeeld Voorwerp</a></li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Zoeken">
        </div>
        <button type="submit" class="btn btn-default">Zoek</button>
      </form>
        
    </div><!-- /.navbar-collapse -->
      
  </div><!-- /.container-fluid -->
</nav>
                
    </div>
       
        </div>
       
        <div class="col-xs-4 col-md-2">
        <div class="col-xs-12 col-md-12">  
            <form class="form-signin ">
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputPassword" class="sr-only">Wachtwoord</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Wachtwoord" required>
                <div class="checkbox ">
                    <label>
                    <input type="checkbox" value="remember-me">Onthouden
                    </label>
                    <a class="" href="#" >Registreren</a>    
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            </form>
        </div>
        </div>
        
    </div>
    
        
    </div>
</body>

  
</html>