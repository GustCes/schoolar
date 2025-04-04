<?php

    //Config connection
    /*
    $host       = "localhost";
    $port       = "5432";
    $dbname     = "schoolar";
    $user       = "postgres";
    $password   = "unicesmag";
    */
    $host       = "aws-0-us-east-1.pooler.supabase.com";
    $port       = "6543";
    $dbname     = "postgres";
    $user       = "postgres.egqbyxjlkyqqurtdbzqh";
    $password   = "unicesmag@@";

    //create conection
    $conn = pg_connect("
        host=$host
        port=$port
        dbname=$dbname
        user=$user
        password=$password
    ");

    if(!$conn){
        die("Connection error" . pg_last_error());
    } else {
        echo "success connection";
    }

    pg_close();
?>