<?php

    include('../config/database.php');

    $fname      = $_POST['f_name'];
    $lname      = $_POST['l_name'];
    $email      = $_POST['mail'];
    $passwd    = $_POST['pass'];
    $enc_pass=md5($passwd);

    $sql_mail_validation = "
    SELECT
        COUNT(email) as total
    FROM
        users
        WHERE email = '$email'
        LIMIT 1
    ";
    $res = pg_query($conn, $sql_mail_validation);

    if ($res){
        $row = pg_fetch_assoc($res);
        if($row['total'] > 0){

            echo " Cyka blyat! ya tienes una cuenta con ese correo";

        }else{
            $sql = "INSERT INTO users (firstname, lastname, email, password)
                VALUES('$fname','$lname','$email','$enc_pass')
    
            ";

            $res = pg_query($conn, $sql);

            if ($res){
                echo "User has been created succesfully";
            }else{
            echo "Cyka blyat, un error";
            }
        }
    }
    
?>