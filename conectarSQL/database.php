<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Max-Age: 1728000');
header('Content-Type: text/plain');

$servername = "y6aj3qju8efqj0w1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$username = "oa7wrq5e1ellsws1";
$password = "whwr5q1ob85q16mn";
$bd = "j72gu9u10tpyqllw";

$conn = new mysqli($servername, $username, $password, $bd);

if($conn -> connect_error){
    die("Fallo en internet: ". $conn -> connect_error);
}
?>
