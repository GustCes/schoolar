<?php
    include('../config/database.php');
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Schoolar - List</title>
        <link rel="icon" type="image/png" href="icon/batpepe.png">
    </head>
    <body>
        <center>
        <img src = "images\pepe hacker.jpg" width = "375"><br>
            <table border="2">
                <tr>
                    <th>Firstname</th>
                    <th>Lasttname</th>
                    <th>Email</th>
                    <th>status</th>
                    <td>...</th>
                </tr>
                <?php
                    //idk
                    $sql = "
                    SELECT
                        firstname,
                        lastname,
                        email,
                        case when status = true then 'Active' else 'No active' end as status
                    FROM
                        users
                    ";
                    $res = pg_query($conn, $sql);
                    if(!$res){
                        echo "Query error";
                        exit;
                    }
                    while($row = pg_fetch_assoc($res)){
                        echo "<tr>";
                        echo "<td>". $row['firstname'] ."</td>";
                        echo "<td>". $row['lastname'] ."</td>";
                        echo "<td>". $row['email'] ."</td>";
                        echo "<td>". $row['status'] ."</td>";
                        echo "<td>";
                        echo "<a href=''> <img src = 'icon/pepe_busca.jpg' width='50'> </a>";
                        echo "<a href=''> <img src = 'icon/edit.png' width='50'> </a>";
                        echo "<a href=''> <img src = 'icon/pepe_delete.jpg' width='50'> </a>";
                    }
                ?>
            </table>
        </center>
    </body>
</html>