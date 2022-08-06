<?php


$server = "localhost";
$username = "root";
$password = "";
$database = "student";

//create connect
$con =  new mysqli($server, $username, $password, $database);
//check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}



?> 