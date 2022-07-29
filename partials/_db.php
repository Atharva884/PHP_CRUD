<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "crud";

$conn = mysqli_connect($server, $username, $password, $database);

if(!$conn){
    die("Shhholllly! Database Not Connected".mysqli_connect_error());
}

?>