<?php

include('../config/database.php');

    $email = $_POST['mail'];
    $passwd = $_POST['pass'];
    
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
            //echo " Login OK";
            header('Refresh:0; url=http://localhost/schoolar/src/home.php');
        }else{
            echo " Cyka blyat! usuario o contraseña incorrecto";
        }
    }
?>