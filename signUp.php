<?php 

session_start();
$error = ""; $succeseMsg="";

$link = mysqli_connect ("localhost", "root", "", "projekat");

    if (mysqli_connect_error()) {

        die('Error');
    }

    

if ($_POST) {


    if (!$_POST["email"]) {

        $error.="An email adress is required<br>";      
    }

    if  (array_key_exists('email', $_POST) OR array_key_exists('password', $_POST)) {

            $query= "SELECT id FROM users WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";

            $result = mysqli_query($link, $query);

            if(mysqli_num_rows($result)) {

                echo "Email already taken";
            }
    }

    if (!$_POST["name"]) {

        $error.="Name is required<br>";     
    }

    if (!$_POST["height"]) {

        $error.="Your height is required<br>";      
    }


    if (!$_POST["weight"]) {

        $error.="Your weight is required<br>";      
    }

    if ($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)===false) {
        
        $echo .= "The email is not a valid email address";
    }


    if ($_POST["sex"] == "Choose...") {

        $error.="Your sex is required<br>";  
    }

    if ($_POST["activity"] == "Choose...") {

        $error.="Your actvity level is required<br>";  
    }
   

    if ($error != "") {

        $error= '<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' . $error . '</div>';
    }  

    if ($error == ""){

        
        $query = "INSERT INTO users (email, password, name, sex, weight, height, birthday, activity) 
                VALUES('"
                .mysqli_real_escape_string($link, $_POST['email'])."', '"
                .mysqli_real_escape_string($link, $_POST['password'])."', '"
                .mysqli_real_escape_string($link, $_POST['name'])."', '"
                .mysqli_real_escape_string($link, $_POST['sex'])."', '"
                .mysqli_real_escape_string($link, $_POST['weight'])."', '"
                .mysqli_real_escape_string($link, $_POST['height'])."', '"
                .mysqli_real_escape_string($link, $_POST['birthday'])."', '"
                .mysqli_real_escape_string($link, $_POST['activity']).
                "')";

                if(mysqli_query($link, $query)) {

                    $email = mysqli_real_escape_string($link, $_POST['email']);
                    $_SESSION['email'] = $email;
                    $_SESSION['success'] = "You are now logged in";
                    header("Location: home.php");
           }else{

                    echo "error!";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    
  </head>
  <body>

    <div class=container>

            <h1>Welcome! Sign in and let's start!</h1>

            <div id="error" name="error"><? echo "$error"; ?></div>
            <div id ="succese"><? echo "$succeseMsg"; ?></div>

            <form method="post">
              <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Eg. John Smith">
                 </div>
                 <div class="form-row">
                    <div class="form-group col-md-6">
                         <label for="email">Email</label>
                         <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="password">Repeat password</label>
                        <input type="password" class="form-control" id="rPassword" name="rPpassword" placeholder="Password">
                    </div>
                 </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="weight">Weight</label>
                      <input type="text" class="form-control" id="weight" name="weight" placeholder="Eg 70(kg)">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="height">Height</label>
                      <input type="text" class="form-control" id="height" name="height" placeholder="Eg 175(cm)">
                    </div>
                </div>
                <div class="form-group row">
                  <label for="birthday" class="col-2 col-form-label">Birthday</label>
                  <div class="col-10">
                    <input class="form-control" type="date" value="2018-08-19" id="birthday" name="birthday">
                  </div>
                </div>
              
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="activity">Activity</label>
                      <select id="activity" class="form-control" name="activity">
                        <option selected>Choose...</option>
                        <option value="None">None</option>
                        <option value="Occasional">Occasional</option>
                        <option value="Active">Active</option>
                        <option value="Very active">Very active</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="sex">Sex</label>
                      <select id="sex" class="form-control" name="sex">
                        <option selected>Choose...</option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                        <option value="Other">Other</option>
                      </select>
                    </div>
                </div>
                <input style="margin-top: 10px; margin-left: 45%;" type="submit" class="btn btn-primary" id="signIn" name = "signIn" value="Sign in" >
            </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <script type="text/javascript">

        
          
        
        
        $("form").submit(function(e){

            e.preventDefault();

            var error="";

            if ($("#email").val() == ""){

                error += "<p>The email field is required!</p>";
            }

            if ($("#password").val() == ""){

                error += "<p>The password field is required!</p>";
            }
            if ($("#rPassword").val()==0){

                    error += "<p>Confirm password is missing</p>";
                }else if($("#password").val() != $("#rPassword").val()){

                    error += "<p>Your passwords dont match</p>";
            }
            if ($("#name").val() == ""){

                error += "<p>Name field is required!</p>";
            }
            if ($("#weight").val() == ""){

                error += "<p>Weight field is required!</p>";
            }else if($.isNumeric($("#weight").val())==false){

                    error += "<p>Please submit your weight in numbers</p>";
                }
            
            
            
            if ($("#height").val() == ""){

                error += "<p>Height field is required!</p>";
            }else if($.isNumeric($("#height").val())==false){

                    error += "<p>Please submit your height in numbers</p>";
                }
            
            
            
            if($( "#sex option:selected" ).text() == "Choose..."){

                error += "<p>Sex field is required!</p>";
            }

            if($( "#activity option:selected" ).text() == "Choose..."){

                error += "<p>Activity field is required!</p>";
            }
            if ($("#birthday").val() == "2018-08-19"){

                error += "<p>Please enter your birthday</p>";
            }

            if (error != "") {
                $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');

                } else {

                    $("form").unbind("submit").submit();
                }
        });

    </script>
  </body>
</html>


