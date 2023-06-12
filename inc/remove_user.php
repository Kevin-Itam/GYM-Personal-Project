<?php
include_once('connect.php');

if (!empty($_GET['id'])) {

    $id = $_GET['id'];

    $sqlSelect = "SELECT *  FROM tbl_cadastro WHERE id_cadastro=$id";

    $result = $conn->query($sqlSelect);

    if ($result->num_rows > 0) {
        $sqlDelete = "DELETE FROM tbl_cadastro WHERE id_cadastro=$id";
        $resultDelete = $conn->query($sqlDelete);
    }
}
echo "<script> window.location='../pages/pg_plano_user.php' </script>";