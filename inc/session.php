<?php

session_start();

if (!empty($_POST['cpf']) && !empty($_POST['senha'])) {
    include_once('../inc/connect.php');
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM tbl_cadastro WHERE cpf = '$cpf' and senha = '$senha'";
    $result = $conn->query($sql);

	if (mysqli_num_rows($result) == 0) {
		echo "<script> window.location='../pages/pg_login.php' </script>";

	} else {
		$dados_usuario = mysqli_fetch_assoc($result);
		$_SESSION['id_usuario'] = $dados_usuario['id_cadastro'];
		$_SESSION['cpf'] = $cpf;
		header("Location: ../pages/pg_painel_user.php");
	}


} else {
	echo "<script> window.location='../pages/pg_login.php' </script>";
}


