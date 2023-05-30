<?php
$servername = "localhost";
$database = "bd_academia";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

function logout(){
    session_start();
    session_unset();
    session_destroy();
    echo "<script> window.location='../pages/pg_login.php' </script>";
}