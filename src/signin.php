<?php

include('../config/database.php');

    session_start();

    if(isset($_SESSION['user_id'])) {
        header('Refresh:0; url=http://localhost/schoolar/src/home.php');
    }

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
GROUP BY
    id
";

    $res = pg_query($conn, $sql);

    if ($res){
        $row = pg_fetch_assoc($res);
        if($row['total'] > 0){
            //echo " Login OK";
            $_SESSION {'user_id'} = $row['id'];
            header('Refresh:0; url=http://localhost/schoolar/src/home.php');
        }else{
            echo " Cyka blyat! usuario o contraseña incorrecto";
        }
    }
?>