<?php


session_start();

if ((!isset($_SESSION['cpf']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['cpf']);
    unset($_SESSION['senha']);
    echo "<script> window.location='../pages/pg_login.php' </script>";
}

include_once("../inc/connect.php");

if (!empty($_SESSION['id_usuario'])) {
    $id = $_SESSION['id_usuario'];
    $sql_detalhes = "SELECT * FROM tbl_cadastro WHERE id_cadastro=$id";
    $result = $conn->query($sql_detalhes);
    if ($result->num_rows > 0) {
        while ($usuario_detalhes = mysqli_fetch_array($result)) {
            $nome = $usuario_detalhes['nome'];
            $permissao = $usuario_detalhes['perm_acesso'];
        }
    } else {
        echo "<script> window.location='../pages/pg_login.php'</script>";
    }
}

//Permissão de acesso

if (($permissao) == 1) {
} else {
    echo "<script> window.location='../pages/pg_painel_user.php' </script>";
}

//Pesquisar Cliente.

if (!empty($_GET['nome'])) {
    $data = $_GET['nome'];
    $sql = "SELECT * FROM tbl_cadastro WHERE nome LIKE '%$data%'  ORDER BY id_cadastro DESC";
} else {
    $sql = "SELECT * FROM tbl_cadastro ORDER BY id_cadastro DESC";
}

$result = $conn->query($sql);

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <link href="../css/style_lateral.css" rel="stylesheet" />
    <title>Seus Planos</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar" value=" <?php if (isset($_GET['nome'])) echo $_GET['nome']; ?>">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
        </form>
    </nav>
    <!--main content wrapper-->
    <div class="mcw">
        <!--navigation here-->
        <!--main content view-->
        <div class="cv">
            <div>
                <div class="inbox">
                    <div class="inbox-sb">

                    </div>
                    <div class="inbox-bx container-fluid">
                        <div class="row">
                            <div class="col-md-2">
                                <ul>
                                    <li><a href="#">Usuários</a></li>
                                    <li><a href="#">Planos</a></li>
                                </ul>
                            </div>
                            <div class="col-md-10">
                                <table class="table table-stripped">
                                    <tbody>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nome</th>
                                            <th scope="col">CPF</th>
                                            <th scope="col">E-mail</th>
                                            <th scope="col">Editar</th>
                                        </tr>
                                        <?php


                                        $pesquisa = "";

                                        if (isset($_GET['nome']))
                                            $pesquisa = $conn->real_escape_string($_GET['nome']);

                                        $sql_code = "SELECT * FROM tbl_cadastro WHERE nome LIKE '%$pesquisa%'";
                                        $sql_query = $conn->query($sql_code) or die("ERRO ao consultar! " . $conn->error);

                                        if ($sql_query->num_rows == 0) {

                                        ?>
                                            <tr>
                                                <td colspan="3">Nenhum resultado encontrado...</td>
                                            </tr>
                                    <tbody>
                                    <?php
                                        } else {

                                            while ($row_turma = $sql_query->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td> <input type='checkbox' /></td>";
                                                echo "<td>" . $row_turma['id_cadastro'] . "</td>";
                                                echo "<td>" . $row_turma['nome'] . "</td>";
                                                echo "<td>" . $row_turma['cpf'] . "</td>";
                                                echo "<td>" . $row_turma['email'] . "</td>";
                                                echo "<td>" . '  <a class="linkar2" href=excluido_turma.php?id=' . $row_turma['id_cadastro'] . "><img  src='..\img\icons8-excluir-30.png'></a>" . "</td>";
                                                echo "<td>" . '<a  class="linkar" href=edit_turma.php?id=' . $row_turma['id_cadastro'] . "><img class='img-edit' src='..\img\icons8-engrenagem-30.png'></a>" . "</td>";
                                                echo '</tr>';
                                            }
                                        }
                                    ?>
                                    </tbody>
                                    <?php
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>