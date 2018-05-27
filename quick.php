<?php
session_start();


$link = new PDO("mysql:host=localhost;dbname=projekat", "root", "");
$error = $db->errorInfo();
    if (!is_null($error[2])) {
        echo "Query failed! " . $error[2];
    }


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

 