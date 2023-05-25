<?php
$servername = "localhost";
$database = "bd_academia";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Conexão inválida: " . mysqli_connect_error());
}
//echo "Connectado com sucesso";
?>