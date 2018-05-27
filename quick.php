<?php
session_start();

include 'conn.php';


    if (isset($_POST)) {

        $email = $SESSION['email'];
        $sugar = $_POST['sugar'];
        $category = $_POST['category'];

        
     

        $query = "INSERT INTO data( email, sugar,category) VALUES ( $email, '$sugar','$category' ) ";

        $result = $link->query($query);
        if ($result) {
            # code...
            echo "good";
        }
        

     }else{
        echo "bad";
     }

     $result->closeCursor();
     $link = null;


?>

 
