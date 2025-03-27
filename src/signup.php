<?php

    include('../config/database.php');

    $fname      = $_POST['f_name'];
    $lname      = $_POST['l_name'];
    $email      = $_POST['mail'];
    $passwd    = $_POST['pass'];

    $sql = "INSERT INTO users (firstname, lastname, email, password)
            VALUES('$fname','$lname','$email','$passwd')
    
    ";

    $res = pg_query($conn, $sql);

    if ($res){
        echo "User has been created succesfully";
    }else{
        echo "Error suka blyat";
    }
    
?>