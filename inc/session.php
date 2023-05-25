<?php

session_start();

if (!empty($_POST['cpf']) && !empty($_POST['senha'])) {
    include_once('../inc/connect.php');
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM tbl_cadastro WHERE cpf = '$cpf' and senha = '$senha'";
    $result = $conn->query($sql);

	if ($sql > 0) {
		$dados_usuario = mysqli_fetch_assoc($result);

		$_SESSION['id_usuario'] = $dados_usuario['id_cadastro'];
		$_SESSION['cpf'] = $cpf;
		header("Location: ../pages/pg_painel_user.php");
	} else {
        var_dump($_SESSION);
        die;
		$_SESSION["invalido"] = $error;
		echo "<script> window.location='../pages/pg_login.php' </script>";
	}


} else {
	echo "<script> window.location='../pages/pg_login.php' </script>";
}


