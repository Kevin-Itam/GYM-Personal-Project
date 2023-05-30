<?php

include '/inc/connect.php';

$cpf = $_POST['cpf'];
$senha = $_POST['senha'];


if (empty($cpf) || empty($senha))
{
    echo "<script>alert('Favor preencher os campos solicitatos'); </script>";
    echo "<script> window.location='/pages/pg_cadastro.php' </script>";
}
else{
    $select = "SELECT cpf, password FROM tbl_cadastro WHERE cpf = '$cpf' AND senha = '$senha'";
    $valida_senha = mysqli_query($conn,$select);

    if(mysqli_num_rows($valida_senha) == 0){
        echo "<script>alert('A senha não está certa'); </script>";
        echo "<script> window.location='/pages/pg_cadastro.php' </script>";
    }
    else{
        echo "<script>alert('Login válido'); </script>";
        echo "<script> window.location='/pages/pg_painel_user.php' </script>";
    }
}