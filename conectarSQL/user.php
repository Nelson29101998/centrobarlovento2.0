<?php
require 'database.php';

$query = "select * from cursos";
if($is_query_run = mysqli_query($conn, $query)){
    $userData = [];
    while($query_exect = mysqli_fetch_assoc($is_query_run)){
        $userData [] = $query_exect;
    }
}else{
    echo "Error en ejecutar!!";
}

echo json_encode($userData);
?>