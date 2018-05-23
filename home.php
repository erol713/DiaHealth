<?php 
   session_start();

 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="index.css">

    <title>DiaHealth</title>
  </head>


  <body data-spy="scroll" data-target="#navbar" data-offset="150">

    <nav class="navbar navbar-expand-lg  fixed-top navbar-dark" style="background-color: #FFC3CC;" id ="navbar">
        <a class="navbar-brand" href="#">Dia<span style="color:#D90A8C;">Health</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto nav-tabs">
            <li class="nav-item">
              <a class="nav-link" href="#jumbotron">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
           <li class="nav-item">
              <a class="nav-link" href="#footer">Contact</a>
            </li>
          </ul>
          <ul class="navbar-nav ">
                <!-- PROFILE DROPDOWN - scrolling off the page to the right -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navDropDownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Profile
            </a>
                    <div class="dropdown-menu" aria-labelledby="navDropDownLink">
                        <a style="padding-left: 1px;" class="dropdown-item" href="#">Preferences</a>
                        <div class="dropdown-divider"></div>
                        <a style="padding-left: 1px;" class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
      </nav>

      
      <div style="margin-top: 100px;" class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Congratulations!</strong> You are signed up!
      </div>

      <div class="jumbotron" id="jumbotron">
        <div class="textJumbo">
          <h1 class="display-4">Keep track of and manage your condition</h1>
          <button type="submit" class="btn btn-primary" id="signIn">Sign in</button>
        </div>
      </div>
   

    <div class="container" id="about">

      <h2 style="color:#FFC3CC; margin-bottom: 100px;">What will you will be able to do?</h2>
      <div class="card-deck">
        <div class="card">
          <img class="card-img-top" src="photos/diab1.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"><i class="fab fa-angellist"></i>Card title</h5>
            <p class="card-text">+ Log your values wherever you are</p><br>
            <p class="card-text">+ Send detailed reports to your doctor</p>
          </div>
        </div>

        <div class="card">
          <img class="card-img-top" src="photos/data1.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-anchor"></i>Card title</h5>
            <p class="card-text">+ Analyze and understand the data at a glance</p><br>
            <p class="card-text">+ Keep your diabetis under control</p>
          </div>
        </div>
        <div class="card">
          <img class="card-img-top" src="photos/food1.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-address-book"></i>Card title</h5>
            <p class="card-text">+ Track your food intake and monitor your diet</p>
          </div>
        </div>
      </div>
     </div>


    <div id="footer">
       
      <div>
        
        <h1 style="color:#FFC3CC;">Soon you can download the app!</h1>

       

        <a href=""><img id="icon" src="photos/download.png"></a>

      </div>

     </div>

    </body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script type="text/javascript">$('body').scrollspy({ target: '#navbar' })</script>
  </body>
</html>