<?php 
   session_start();
   $link = mysqli_connect ("localhost", "id5871651_erol", "sarajevo87", "id5871651_projekat");
   

    if (mysqli_connect_error()) {

        die('Error');
    }


    if ($_POST) {

      if (!empty($_POST["value"])) {

        $email= $_SESSION['email'];
        $query = "INSERT INTO data (email, sugar, category) 
                VALUES('"
                .mysqli_real_escape_string($link, $email)."', '"
                .mysqli_real_escape_string($link, $_POST['value'])."', '"
                .mysqli_real_escape_string($link, $_POST['category']).
                "')";

                 $sugar = mysqli_real_escape_string($link, $_POST['value']);
                 $_SESSION['sugar'] = $sugar;

                mysqli_query($link, $query);
              

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <link rel="stylesheet" type="text/css" href="index.css">

    <title>DiaHealth</title>

    
   <script >
      $(document).ready(function(){
        $("#quick").click(function(){

          var sug = $("#value").val();
          var cat = $("#category").val();
          
         
          
          $.ajax({

            url:"quick.php",
                  type:"POST",
                  async:false,
                  data:{
                    sugar: sug,
                    category:cat
                   
                    
                  },

                  success: function(data){

                  }

          });

         });

        });
</script>

  </head>


  <body data-spy="scroll" data-target="#navbar" data-offset="150">

    <nav class="navbar navbar-expand-lg  fixed-top navbar-dark" style="background-color: #000;" id ="navbar">
        <a class="navbar-brand" href="#"><img src="photos/drop2.png" style="width:50px; margin-bottom: 10px; margin-right: -5px;">Dia<span style="color:#D83F78;">Health</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto nav-tabs">
            <li class="nav-item">
              <a class="nav-link" href="#panel">Panel<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sugarAdd.php">+ Measurment</a>
            </li>
           <li class="nav-item">
              <a class="nav-link" href="#table">Reports</a>
            </li>
          </ul>
          <ul class="navbar-nav ">
                <!-- PROFILE DROPDOWN - scrolling off the page to the right -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navDropDownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <?php
                    
                    echo "Hi " . $_SESSION['name'] ."<br>";
                          
                    ?>
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

      
       <div style="margin-bottom: 0px; margin-top: 100px; opacity: 0.5;" class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Congratulations!</strong> You are logged in!
      </div>

      <div class="myContainer" id="panel" style="padding-top: 100px;">
        <h1 class="card-header" style="text-align: left;">Panel</h1>
        
      </div>

   <div class="myContainer" id="workshop" style="padding-top: 20px;">

      <div id="left" style="float:left; ">
        <button style="color:#FFF; " type="submit" class="btn btn-primary" id="add"><a href="sugarAdd.php" style="text-decoration: none; color: #fff;"> + Add Glucose</a></button>

        <button style="margin-left: 5px; " class="btn btn-info my-2 my-sm-0 dropdown inline" type="submit" name="reports" id="reports">
          <a href="#" style="text-decoration:none; color:#FFF;" class="dropdown-toggle" id="DropDownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reports</a>
          <div class="dropdown-menu" aria-labelledby="DropDownLink">
                        <a style="padding-left: 1px;" class="dropdown-item" href="#">Filter</a>
                        <div class="dropdown-divider"></div>
                        <a style="padding-left: 1px;" class="dropdown-item" >Charts</a></div>
        </button>
      </div> 

      <form style="float: right;" id="quick_add_form"  class="form-inline" method="post" >          
         <div id="div_id_value" class="form-group"> 
          <div class="controls"> 
            <input  class="numberinput form-control"
              id="value" name="value" 
              placeholder="Value (mmol/L)"
              required="True" type="number" step="any" min="0"/> 
            </div>
          </div> 

          <div id="div_id_category" class="form-group"> 
            <div class="controls " style="margin-left: 5px;">
              <select class="select form-control" id="category" name="category"> 
                <option value="Breakfast">Breakfast</option>
                 <option value="Lunch" >Lunch</option>
                  <option value="Dinner">Dinner</option> 
                  <option value="Snack">Snack</option> 
                  <option value="Bedtime">Bedtime</option>
                   <option value="No Category" selected="selected">No Category</option> 
                 </select> 
               </div> 
             </div>
               <input style="margin-left: 5px;" type="submit" name="submit" value="Quick Add" class="btn btn-primary" id="quick"> 
           </form>

            
     

        <br><hr class="my-4">

    </div>



    <div class="myContainer" id="content" >

      
        <div class="col-sm-6" style="float: left;" >

          <div  style="padding-bottom: 10px; ">

                    <div class="row">
                      <div class="col-sm-6">
                        <div class="card" >
                          <div class="card-body">
                            <h5 class="card-header" style="text-align: center;">Latest Reading</h5>
                            <p class="card-text" id="latest" style="padding: 20px 20px 23px 20px;text-align: center; color:red; font-size: 150%;">
                                <?php
                                    if ($_POST){
                                    $sugar= $_SESSION['sugar'];
                                    echo $sugar." mmol/L";
                                  }else {
                                    echo "-";
                                  }
                                ?></p>                    
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6" >
                        <div class="card ">
                          <div class="card-body">
                            <h5 class="card-header" style="text-align: center;">A1C Estimate*</h5>
                            
                            <p id ="a1c_card" class="card-text" style="padding: 20px 20px 0 20px; text-align: center;">
                              <span id ="a1c" style="color: green; font-size: 150%;">
                              <?php
                                  $email= $_SESSION['email'];
                                  if ($_POST){
                                  $query= "SELECT AVG(sugar) 
                                  AS avgSugar 
                                  FROM data 
                                  WHERE email = '$email'
                                  AND dateParim 
                                  BETWEEN DATE_SUB(NOW(), INTERVAL 90 DAY)
                                  AND NOW()";
                                  $result = mysqli_query($link,$query);
                                  $rez=mysqli_fetch_array($result);
                                  $num1 = 2.59;
                                  $num2= 1.59;
                                  $A1c = ($num1 + $rez['avgSugar']) / $num2;
                                  echo(round($A1c,1)).'%';
                                  }else {
                                    echo "-";
                                  }
                                  
                              ?>
                                  
                             </span><br>
                             <?php
                             if ($_POST){
                                    echo '('.(round($rez['avgSugar'],1)).' mmol/L)';
                                  }else {
                                    echo "-";
                                  }

                              ?>
                            </p>

                          </div>
                        </div>
                      </div>
                    </div>
          </div> 
          <div class="card col-sm-12" style="margin-bottom: 10px;">    
                <div class="panel panel-default">
                        <div class="card-header">
                          14-Day Breakdown
                        </div>           
                    <table class="table table-condensed" style="text-align: left;">
                        <tr>

                            <td><b>Lowest</b><span id="minSug" style="float: right; font-weight: bold;"><?php
                                  $email= $_SESSION['email'];
                                  $query= "SELECT MIN(sugar) 
                                  AS minSugar 
                                  FROM data
                                  WHERE email = '$email'
                                  AND dateParim 
                                  BETWEEN DATE_SUB(NOW(), INTERVAL 14 DAY)
                                  AND NOW() ";
                                  $result = mysqli_query($link,$query);
                                  $rez=mysqli_fetch_array($result);
                                  echo(round($rez['minSugar'],1)).' mmol/L';
                              ?></span></td>
                            <td id="id_lowest" align="right"></td>
                        </tr>

                        <tr>
                            
                            <td><b>Highest</b><span id="maxSug" style="float: right; font-weight: bold;"><?php
                                  $query= "SELECT max(sugar) 
                                  AS maxSugar 
                                  FROM data 
                                  WHERE email = '$email'
                                  AND dateParim 
                                  BETWEEN DATE_SUB(NOW(), INTERVAL 14 DAY)
                                  AND NOW()";
                                  $result = mysqli_query($link,$query);
                                  $rez=mysqli_fetch_array($result);
                                  echo(round($rez['maxSugar'],1)).' mmol/L';?></span></td>
                            <td id="id_highest" align="right"></td>
                        </tr>
                        
                        <tr>
                            
                            <td><b>Average</b><span id="avgSug" style="float: right; font-weight: bold; color:green;"><?php
                                  $query= "SELECT AVG(sugar) 
                                  AS avgSug 
                                  FROM data 
                                  WHERE email = '$email'
                                  AND dateParim 
                                  BETWEEN DATE_SUB(NOW(), INTERVAL 14 DAY)
                                  AND NOW()";
                                  $result = mysqli_query($link,$query);
                                  $rez=mysqli_fetch_array($result);
                                  echo(round($rez['avgSug'],1)).' mmol/L';?></span></td>
                            <td id="id_average" align="right"></td>
                        </tr>
                    </table>
                </div>
            
          </div>
        </div>      

          
            
          <div class="col-sm-6" id="curve_chart" style=" float: right;  border:1px solid #DFDFDF; border-radius: 1%; width:100%; height:395px;"></div>


     </div>

  
    
    <div class=" row col-sm-12 col-md-12" id="table" style="padding-top: 50px;">
      <div class="myContainer">
          <div class="row "><span class = "" style=" text-align: left; font-weight: bold; margin-bottom: 10px;">Showing last 10 entries:</span>
              <div class="col-sm-12 col-md-12">
                  <div class="panel panel-default">
                      <div class="panel-body">
                          <table id="glucose_table" class="display responsive table-striped" width="100%">
                              <thead class="table-dark" >
                                  <tr style="padding: 20px;">
                                      <th class="all"><center>Sugar Value</center></th>
                                      <th class="all">Category</th>
                                      <th class="min-tablet">Date</th>
                                      <th class="min-tablet">Time</th>
                                      <th class="all"></th>
                                  </tr>
                              </thead>
                              <?php
                                  $email= $_SESSION['email'];
                                  $sql="SELECT sugar, category, dateParim FROM data WHERE email = '$email' ORDER BY id DESC Limit 10";
                                  $result = $link->query($sql);
                                                                                                      
                                  if ($result ->num_rows >0){

                                    while($row = $result ->fetch_assoc()){
                                      $string = $row['dateParim'];
                                      $split = explode(" ", $string);
                                      ?>
                                      <tr>
                                        <td><?php echo $row['sugar']; ?></td>
                                        <td><?php echo $row['category']; ?></td>
                                        <td><?php echo $split[0]; ?></td>
                                        <td><?php echo $split[1]; ?></td>
                                        <td></td>
                                      </tr>
                                      <?php
                                    }
                                  }
                                  
                              ?>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    


      <br><br><br><br><br><br><br><br><br><br><br><br>
    </div>

    <div id="footer">
      <div>
        
        <h1 style="color:#D83F78;">Soon you can download the app!</h1>

       

        <a href=""><img id="icon" src="photos/download.png"></a>

      </div>

     </div>

    </body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    
    <script type="text/javascript"> 
   

      $(document).ready(function() { 

       //color change for average sugar

          var split = ($("#avgSug").html()).split(" ");
          var num = split[0];
          var avgSugColor = parseFloat(num);
             

                if (avgSugColor <= 7.0 ) {
                  $("#avgSug").css("color", "green");
                } else if (avgSugColor > 7.0  && avgSugColor <= 8.0 ){

                      $("#avgSug").css("color", "yellow");

                } else{

                      $("#avgSug").css("color", "red");
                }

                //color change for min sugar

                 var split = ($("#minSug").html()).split(" ");
          var num = split[0];
          var minSugColor = parseFloat(num);
             

                if (minSugColor <= 7.0 ) {
                  $("#minSug").css("color", "green");
                } else if (minSugColor > 7.0  && minSugColor <= 8.0 ){

                      $("#minSug").css("color", "yellow");

                } else{

                      $("#minSug").css("color", "red");
                }

                //color change for max sugar

                 var split = ($("#maxSug").html()).split(" ");
          var num = split[0];
          var maxSugColor = parseFloat(num);
             

                if (maxSugColor <= 7.0 ) {
                  $("#maxSug").css("color", "green");
                } else if (maxSugColor > 7.0  && maxSugColor <= 8.0 ){

                      $("#maxSug").css("color", "yellow");

                } else{

                      $("#maxSug").css("color", "red");
                }


                //color change for latest

                 var split = ($("#latest").html()).split(" ").reverse();
          var num = split[1];
          var latSugColor = parseInt(num);

         
             

                if (latSugColor <= 7 ) {
                  $("#latest").css("color", "green");
                } else if (latSugColor == 8 ){

                      $("#latest").css("color", "yellow");

                } else{

                      $("#latest").css("color", "red");
                }


        });

            // chart panel
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);



          function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Sugar Value'],
          <?php 
                  $email= $_SESSION['email'];
                  $sql="SELECT sugar, dateParim FROM data WHERE email = '$email' AND dateParim 
                  BETWEEN DATE_SUB(NOW(), INTERVAL 14 DAY)
                  AND NOW() ORDER BY id DESC ";
                  $result = $link->query($sql);
                  if ($result ->num_rows >0){

                    while($row = $result ->fetch_assoc()){
                      $string = $row['dateParim'];
                      $split = explode(" ", $string);
                      ?>

              [<?php echo"'". $split[0]."'"?>, <?php echo $row['sugar']?>],
              


              <?php
              }
            }

            ?>
          
        ]);

          

            var options = {
              title: 'Average Glucose Level in Last 14 Days',
              curveType: 'function',
              legend: { position: 'bottom' }

            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
          }
        

    

    </script>



  </body>
</html>