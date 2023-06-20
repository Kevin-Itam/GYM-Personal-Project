<?php
include_once '../inc/connect.php';

$id = filter_input(INPUT_GET, 'id_user', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_GET, 'cpf', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_STRING);
$sexo = filter_input(INPUT_GET, 'sexo', FILTER_SANITIZE_STRING);
$data = filter_input(INPUT_GET, 'data', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_GET, 'telefone', FILTER_SANITIZE_STRING);
$telefone_ad = filter_input(INPUT_GET, 'telefone_ad', FILTER_SANITIZE_STRING);

if (empty($nome) || empty($email) || empty($cpf) || empty($sexo) || empty($id) || empty($data) || empty($telefone)) {
    echo "<script>alert('Erro ao cadastrar usuário! Favor preencher os campos necessários'); </script>";
    echo "<script> window.location='../pages/pg_painel_user.php' </script>";
} else {
    $update_cadastro = "UPDATE tbl_cadastro SET nome='$nome', cpf='$cpf', email='$email', sexo='$sexo', nascimento='$data', telefone='$telefone', telefone_ad='$telefone_ad'  WHERE id_cadastro='$id'";
    mysqli_query($conn, $update_cadastro);
    echo "<script>alert('Alterado dados conforme solicitado!'); </script>";
    echo "<script> window.location='../pages/pg_painel_user.php' </script>";
}
