<?php

include '../inc/connect.php';

$nome = $_POST['name'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$senha_conf = $_POST['senha_conf'];

if (empty($nome) || empty($cpf) || empty($email) || empty($senha) || empty($senha_conf))
{
    echo "<script>alert('Favor preencher os campos solicitatos'); </script>";
    echo "<script> window.location='../pages/pg_cadastro.php' </script>";
}
else{
    if(($senha) != ($senha_conf)){
        echo "<script>alert('A senha não é igual a primeira, favor corrigir!'); </script>";
        echo "<script> window.location='../pages/pg_cadastro.php' </script>";
    }
    else{
        var_dump($_POST);
        die;
        $sql = "INSERT INTO tbl_cadastro(nome,cpf,e-mail,senha) VALUES('$nome','$cpf','$email','$senha')";
        echo "<script>alert('Cadastrado com sucesso'); </script>";
        echo "<script> window.location='../pages/pg_login.html' </script>";
        $conn->query($sql);
    }
}