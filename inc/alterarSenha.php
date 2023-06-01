<?php
include_once '../inc/connect.php';

$id = filter_input(INPUT_GET, 'id_user', FILTER_SANITIZE_NUMBER_INT);
$senha = filter_input(INPUT_GET, 'troca_senha', FILTER_SANITIZE_STRING);
$senha_conf = filter_input(INPUT_GET, 'troca_senha_conf', FILTER_SANITIZE_STRING);


if (empty($id) || empty($senha) || empty($senha_conf)) {
    echo "<script>alert('Erro ao trocar a senha, não está identica'); </script>";
    echo "<script> window.location='../pages/pg_painel_user.php' </script>";
} else {
    $update_senha = "UPDATE tbl_cadastro SET senha='$senha' WHERE id_cadastro='$id'";
    mysqli_query($conn, $update_senha);
    echo "<script>alert('Alterado dados conforme solicitado!'); </script>";
    echo "<script> window.location='../pages/pg_painel_user.php' </script>";
}
