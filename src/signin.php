<?php

include('../config/database.php');

    $email      = $_POST['mail'];
    $passwd     = $_POST['pass'];
    
    $sql    =   "
    SELECT
	--id,
    --email,
    --password,
	COUNT(id) AS total
FROM
	users
WHERE
	email = '$email' and
	password = '$passwd' and
	status = true
";

    $res = pg_query($conn, $sql);

    if ($res){
        $row = pg_fetch_assoc($res);
        if($row['total'] > 0){

            echo " Login OK";

        }else{
            echo " Cyka blyat! user doesnt exist";
        }
    }
?>