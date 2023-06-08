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
    <link href="../css/style_lateral.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/3a1453d3f1.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Página do Administador</title>
</head>
<style>
    button {
        border: 0;
        outline: none;
        padding: 10px 36px;
        font-size: 17px;
        font-weight: 600;
        border-radius: 5px;
        background-color: #a5a5a5;
        transition: all 0.5s ease;
    }

    button:hover {
        background-color: #ffffff;

    }

    .login-wrap {
        background: white;
        border-radius: 5px;
    }

    .backgroundModal {
        position: fixed;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
        background-color: rgb(0 0 0 / 95%);
        z-index: 5;
        /* Ocultar a janela modal */
        display: none;
    }
</style>

<body>
    <!--============ Modal===========-->
    <div class="backgroundModal" id="abrir">
        <div class="login-wrap p-4 p-md-5">
            <span class="X-lateral-vei" onclick="fecharSenha('abrir')"><i class="fa-regular fa-circle-xmark"></i></span>
            <h3 class="text-center mb-4" style="padding-top: 50px; color: white; font-size: 25px; color:#0e0e0e;">Cadastrar o novo Plano</h3>
            <form action="../inc/cadastro_plano.php" method="post" class="login-form">
                <input type="hidden" name="id_user">
                <div class="form-group">
                    <input name="nome_plano" type="text" class="form-control rounded-left" placeholder="Nome do Plano" required="" style="margin-top: 25px;">
                </div>
                <div class="form-group">
                    <input name="valor_plano" type="text" class="form-control rounded-left" placeholder="Valor do Plano" required="" style="margin-top: 25px;">
                </div>
                <div class="form-group">
                    <input name="opcao_plano" type="text" class="form-control rounded-left" placeholder="Mensal/Trimensal/Anual" required="" style="margin-top: 25px;">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descrição do Plano</label>
                    <textarea  name="desc_plano" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-warning" style="width: 150px; margin-top: 25px;">Salvar</button>
                </div>
            </form>
        </div>
    </div>
    <!--=======================-->]
    <header>
        <div class="nav-top">
            <nav class="div-navv">
                <div class="imgss"></div>
            </nav>
            <nav class="div-nav2">
                <div class="btn">
                    <span onclick="menu_toogle()"><i class="fa-solid fa-bars fa-2xl"></i></span>
                </div>
            </nav>
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <form class="d-flex" method="GET" action="">
                        <input name="nome" class="form-control me-2" type="search" placeholder="Search..." value="<?php if (isset($_GET['nome_aluno']))
                                                                                                                        echo $_GET['nome_aluno']; ?>">
                        <button type="submit">Pesquisar</button>
                    </form>
                </div>
            </nav>
            <div class="div-nav">
                <nav class="full">
                    <div class="d-flex">
                        <div class="dropdown d-inline-block user-dropdown">
                            <span class="d-none d-xl-inline-block ms-1">Kevin</span>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!--========================== SIDEBAR ============================-->
    <div class="forum_menu">
        <ul>

            <li class="list active fa-house">
                <a class="alink">
                    <span class="titulo-menu">Menu</span>
                    <span><i class="fa-solid fa-house"></i></span>
                    <span class="titulo"><a class="a" href="../index_Apre.php">Página principal</a></span>
                </a>
            </li>
        </ul>
    </div>
    <!--========================== TABLE ============================-->
    <div class="tabela">
        <a>Cadastros</a>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">excluir</th>
                    <th scope="col">Editar</th>

                </tr>
            </thead>
            <tbody>

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

                    while ($cadastro = $sql_query->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td> <input type='checkbox' /></td>";
                        echo "<td>" . $cadastro['id_cadastro'] . "</td>";
                        echo "<td>" . $cadastro['nome'] . "</td>";
                        echo "<td>" . $cadastro['cpf'] . "</td>";
                        echo "<td>" . $cadastro['email'] . "</td>";
                        echo "<td>" . '  <a class="linkar2" href=excluido_turma.php?id=' . $cadastro['id_cadastro'] . "><img  src='..\img\icons8-excluir-30.png'></a>" . "</td>";
                        echo "<td>" . '<a  class="linkar" href=edit_turma.php?id=' . $cadastro['id_cadastro'] . "><img class='img-edit' src='..\img\icons8-engrenagem-30.png'></a>" . "</td>";
                        echo "</tr>";
                    }
                }
            ?>
            </tbody>
            <?php
            ?>
            </tbody>
        </table>
    </div>
    <div class="tabela_planos">
        <a>Planos</a>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">#</th>
                    <th scope="col">Plano</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Excluir</th>
                    <th scope="col">Editar</th>

                </tr>
                <div>
            <button onclick="abrirSenha('abrir')" class="btn btn-success" style="height: 40px; width:100px ;">
                <p>Cadastrar</p>
                </buttom>
        </div>
            </thead>
            <tbody>
                <?php
                $consulta = "SELECT * FROM tbl_planos";
                $sql = $conn->query($consulta) or die($conn->error);
                while ($plano = $sql->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td> <input type='checkbox' /></td>";
                    echo "<td>" . $plano['idl_planos'] . "</td>";
                    echo "<td>" . $plano['nome_plano'] . "</td>";
                    echo "<td>" . $plano['valor_plano'] . "</td>";
                    echo "<td>" . '  <a class="linkar2" href=excluido_turma.php?id=' . $plano['idl_planos'] . "><img  src='..\img\icons8-excluir-30.png'></a>" . "</td>";
                    echo "<td>" . "<button class='btn btn-success' onclick='abrir(" . $plano['idl_planos'] . ")' >Editar</button>" . "</td>";
                    echo '</tr>';
                    
                    echo" <div class='backgroundModal' id=" . $plano["idl_planos"] . ">
                    <div class='login-wrap p-4 p-md-5'>
                        <span class='X-lateral-vei' onclick='fechar(" . $plano['idl_planos'] . ") '><i class='fa-regular fa-circle-xmark'></i></span>
                        <h3 class='text-center mb-4' style='padding-top: 50px; color: white; font-size: 25px; color:#0e0e0e;'>Cadastrar o novo Plano</h3>
                        <form action='../inc/editar_plano.php' method='post' class='login-form'>
                            <input type='hidden' name='id_user'>
                            <div class='form-group'>
                                <input name='nome_plano' type='text' class='form-control rounded-left' placeholder='Nome do Plano' required='' style='margin-top: 25px;'>
                            </div>
                            <div class='form-group'>
                                <input name='valor_plano' type='text' class='form-control rounded-left' placeholder='Valor do Plano' required='' style='margin-top: 25px;'>
                            </div>
                            <div class='form-group'>
                                <input name='opcao_plano' type='text' class='form-control rounded-left' placeholder='Mensal/Trimensal/Anual' required='' style='margin-top: 25px;'>
                            </div>
                            <div class='form-group'>
                                <label for='exampleFormControlTextarea1'>Descrição do Plano</label>
                                <textarea  name='desc_plano' class='form-control' id='exampleFormControlTextarea1' rows='3'></textarea>
                            </div>
                            <div class='form-group'>
                                <button type='submit' class='btn btn-outline-warning' style='width: 150px; margin-top: 25px;'>Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>";
                }
                ?>
            </tbody>
            <?php
            ?>
            </tbody>
        </table>
    </div>
    <?php 
    
    ?>
    <script>
        function menu_toogle() {
            var _body = document.body;

            if (_body.classList.contains('menu-close')) {
                _body.classList.remove('menu-close');
            } else {
                _body.classList.add('menu-close');
            }
        }
    </script>
    <script src="../js/ModalSenha.js" crossorigin="anonymous"></script>
</body>

</html>