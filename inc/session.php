<?php

session_start();
//print_r($_REQUEST);

if (isset($_POST['submit']) && !empty($_POST['Usuario']) && !empty($_POST['Senha'])) {
    include_once('connect.php');
    $login = $_POST['Usuario'];
    $senha = $_POST['Senha'];

    //print_r('<br>');
    //print_r('Login: ' . $login);
    //print_r('<br>');
    //print_r('Senha: ' . $senha);

    $sql = "SELECT * FROM tbl_cadastro WHERE username = '$login' and senha = '$senha'";

    $result = $conn->query($sql);

    //print_r($sql);
    //print_r($result);

    if (mysqli_num_rows($result) < 1) {
        unset($_SESSION['Usuario']);
        unset($_SESSION['Senha']);
        header('Location: index.php');
    } else {
        $_SESSION['Usuario'] = $login;
        $_SESSION['Senha'] = $senha;
        header('Location: menu.php');
    }

} else {
    header('Location: index.php');
}