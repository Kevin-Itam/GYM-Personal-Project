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
$img_user = $_POST['user_img'];

if (empty($nome) || empty($cpf) || empty($email) || empty($senha) || empty($senha_conf) || empty($sexo) || empty($data) || empty($telefone)||empty($telefone_ed)||empty($img_user)) {
    echo "<script>alert('Favor preencher os campos solicitatos'); </script>";
    echo "<script> window.location='../pages/pg_cadastro.php' </script>";
} else {
    if (($sexo) == 0){
        echo "<script>alert('Favor informar o sexo;'); </script>";
        echo "<script> window.location='../pages/pg_cadastro.php' </script>";
    }else{
        if (($senha) != ($senha_conf)) {
            echo "<script>alert('A senha não é igual a primeira, favor corrigir!'); </script>";
            echo "<script> window.location='../pages/pg_cadastro.php' </script>";
        } else {
            $select = "SELECT COUNT(cpf) as existe FROM tbl_cadastro WHERE cpf = '{$cpf}' LIMIT 1;";
            $result = mysqli_query($conn, $select);
            $cpf_exis = mysqli_fetch_array($result);

            if ($cpf_exis['existe']) {
                echo "<script>alert('CPF já foi cadastro, caso não lembre a senha clique na opção 'Esqueci minha Senha'. '); </script>";
                echo "<script> window.location='../pages/pg_cadastro.php' </script>";
            } else {

                $sql = "INSERT INTO tbl_cadastro(nome,cpf,email,senha,sexo,nascimento,telefone,telefone_ad,perm_acesso) VALUES('$nome','$cpf','$email','$senha','$sexo','$data','$telefone','$telefone_ad','$img_user','1')";
                $conn->query($sql);
                echo "<script>alert('Cadastrado com sucesso'); </script>";
                echo "<script> window.location='../pages/pg_login.php' </script>";
            }
        }
    }
}
