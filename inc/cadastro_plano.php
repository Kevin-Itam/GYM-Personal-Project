<?php

include '../inc/connect.php';

$nome = $_POST['nome_plano'];
$valor = $_POST['valor_plano'];
$opcao = $_POST['opcao_plano'];
$desc = $_POST['desc_plano'];

if (empty($nome) || empty($valor) || empty($desc)) {
    echo "<script>alert('Favor preencher os campos solicitatos'); </script>";
    echo "<script> window.location='../pages/pg_plano_user.php' </script>";
} else {
    $sql = "INSERT INTO tbl_planos(nome_plano,valor_plano,opcao_plano,desc_plano) VALUES('$nome','$valor','$opcao','$desc')";
    $conn->query($sql);
    echo "<script>alert('Cadastrado com sucesso'); </script>";
    echo "<script> window.location='../pages/pg_plano_user.php' </script>";
}
