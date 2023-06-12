<?php
include_once '../inc/connect.php';

$id = filter_input(INPUT_GET, 'id_user', FILTER_SANITIZE_NUMBER_INT);
$nome_plano = filter_input(INPUT_GET, 'nome_plano', FILTER_SANITIZE_STRING);
$valor = filter_input(INPUT_GET, 'valor_plano', FILTER_SANITIZE_STRING);
$opcao = filter_input(INPUT_GET, 'opcao_plano', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_GET, 'desc_plano', FILTER_SANITIZE_STRING);

if (empty($nome_plano) || empty($valor) || empty($opcao) || empty($descricao) || empty($id)) {
    echo "<script>alert('Erro ao editar plano! Favor preencher os campos necessários'); </script>";
    echo "<script> window.location='../pages/pg_plano_user.php' </script>";
} else {
    $update_cadastro = "UPDATE tbl_planos SET nome_plano='$nome_plano', valor_plano='$valor', opcao_plano='$opcao', desc_plano='$descricao' WHERE idl_planos='$id'";
    mysqli_query($conn, $update_cadastro);
    echo "<script>alert('Alterado dados conforme solicitado!'); </script>";
    echo "<script> window.location='../pages/pg_painel_user.php' </script>";
}
