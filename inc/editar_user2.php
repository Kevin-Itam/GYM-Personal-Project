<?php
include_once '../inc/connect.php';

$id = filter_input(INPUT_GET, 'id_user', FILTER_SANITIZE_NUMBER_INT);
$permissao = filter_input(INPUT_GET, 'perf_acesso', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_GET, 'cpf', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_STRING);

if (empty($nome) || empty($email) || empty($cpf)) {
    echo "<script>alert('Erro ao atualizar dados! Favor preencher os campos necessários'); </script>";
    echo "<script> window.location='../pages/pg_plano_user.php' </script>";
} else {
    $update_cadastro = "UPDATE tbl_cadastro SET nome='$nome', cpf='$cpf', email='$email', perm_acesso='$permissao' WHERE id_cadastro='$id'";
    mysqli_query($conn, $update_cadastro);
    echo "<script>alert('Alterado dados conforme solicitado!'); </script>";
    echo "<script> window.location='../pages/pg_plano_user.php' </script>";
}
