<?php

include '../inc/connect.php';

$nome = $_POST['name'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$senha_conf = $_POST['senha_conf'];
$sexo = $_POST['sexo'];
$data = $_POST['data'];
$telefone = $_POST['telefone'];
$telefone_ad = $_POST['telefone_ad'];

if (empty($nome) || empty($cpf) || empty($email) || empty($senha) || empty($senha_conf) || empty($sexo) || empty($data) || empty($telefone))
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
        //$select = "SELECT email, password FROM usuarios WHERE email = '$email' AND password = '$hash'";
        //$valida_senha = mysqli_query($conn,$select);
        

        $sql = "INSERT INTO tbl_cadastro(nome,cpf,email,senha,sexo,nascimento,telefone,telefone_ad,perm_acesso) VALUES('$nome','$cpf','$email','$senha','$sexo','$data','$telefone','$telefone_ad','1')";
        $conn->query($sql);
        echo "<script>alert('Cadastrado com sucesso'); </script>";
        echo "<script> window.location='../pages/pg_login.php' </script>";
    }
}