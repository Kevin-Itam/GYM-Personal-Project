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

if (($permissao) == 2) {
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
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../css/SASS/SASS_Perfil/style_PERFIL_sass.css" rel="stylesheet" />
    <link href="../css/style_lateral.css" rel="stylesheet" type="text/css">
    <title>Página do Administador</title>
</head>
<style>
    #cad {
        display: block;
    }

    #plan {
        display: none;
    }

    .login-wrap {
        background: white;
        border-radius: 5px;
    }

    .tabela .dv-title {
        max-width: 100px;
        display: flex;
        flex-direction: row;
        position: relative;
    }
</style>
<script src="../js/ModalSenha.js" crossorigin="anonymous"></script>

<body>
    <!--========================== SIDEBAR ============================-->
    <nav id="nav" class="side_menu">
        <div onclick="menu_toogle()">
            <span class="menu_ico"><i class="bi bi-list"></i></span>
        </div>
        <ul class="menu">
            <li class="menu_pg">
                <a href="#">
                    <span class="menu_ico"><i class="bi bi-person-circle"></i></span>
                </a>

                <a href="../pages/pg_painel_perfil.php" class="menu_link">
                    <span class="menu_txt">Perfil </span>
                </a>
            </li>
            <li class="menu_pg">
                <a href="#">
                    <span class="menu_ico"><i class="bi bi-person-gear"></i></span>
                </a>
                <a href="../pages/pg_perfil_config.php" class="menu_link">
                    <span class="menu_txt">Configuração</span>
                </a>
            </li>
            <?php
            if (($permissao) == 2) {
                echo '<li class="menu_pg">
                    <a href="#">
                        <span class="menu_ico"><i class="bi bi-clipboard-data"></i></span>
                    </a>
                  
                    <a href="../pages/pg_plano_user.php" class="menu_link">
                        <span class="menu_txt">Tabelas</span>
                    </a>
                </li>';

            } ?>
            <li class="menu_pg">
                <a href="#">
                    <span class="menu_ico"><i class="bi bi-arrow-left-circle"></i></span>
                </a>

                <a href="../pages/pg_painel_user.php" class="menu_link back">
                    <span class="menu_txt">HOME</span>
                </a>
            </li>
        </ul>

    </nav>
    <!--========================== Navbar ============================-->
    <div class="topnav">
        <a href="#about" onclick="abrir_plan('plan')">Sistema</a>
        <a href="#contact" onclick="abrir_cad('cad')">Clientes</a>
        <div class="search-container">
            <form action="/action_page.php">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit" class="btn__search"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </div>
    </div>
    <!--=============================== TABELA  Cadastros  ==========================================-->
    <div class="table-wrapper" id="cad">

        <table class="fl-table table-bordered border-white caption-top">
            <caption>Informações de Cadastro</caption>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Permissão</th>
                    <th scope="col">Excluir</th>
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

                        echo "<td>" . $cadastro['id_cadastro'] . "</td>";
                        echo "<td>" . $cadastro['nome'] . "</td>";
                        echo "<td>" . $cadastro['cpf'] . "</td>";
                        echo "<td>" . $cadastro['email'] . "</td>";
                        if ($cadastro['perm_acesso'] == 1) {
                            echo "<td>Cliente</td>";
                        }
                        if ($cadastro['perm_acesso'] == 2) {
                            echo "<td>Admin</td>";
                        }
                        echo "<td>" . '  <a class="btn btn-danger" hhref=../inc/remove_user.php?id=' . $cadastro['id_cadastro'] . "><img  src='..\img\icons8-excluir-30.png'></a>" . "</td>";
                        echo "<td>" . "<button class='btn btn-success' onclick='abrir(" . $cadastro['id_cadastro'] . ")' >Editar</button>" . "</td>";
                        echo "</tr>";
                        echo " <div>
                        <div class='backgroundModal'style='position:absolute!important;top:15%;left:25%;' id=" . $cadastro["id_cadastro"] . ">
                        <div class='login-wrap p-4 p-md-5'>
                            <span class='X-lateral-vei' style='cursor:pointer;' onclick='fechar(" . $cadastro['id_cadastro'] . ") '><img src='..\img\icons8-excluir-30.png'></span>
                            <h3 class='text-center mb-4' style='padding-top: 50px; color: white; font-size: 25px; color:#0e0e0e;'>Editar os Cadastros</h3>
                            <form action='../inc/editar_user2.php' method='get' class='login-form'>

                            <input type='hidden' name='id_user' value=" . $cadastro['id_cadastro'] . ">
                            <div class='dvsec'>
                                <label for='select' class='lasec' style='color: #000000;'>Perfil de acesso</label>
                                <select name='perf_acesso' id='select'>
                                    <option value=" . $cadastro['perm_acesso'] . ">Selecione</option>
                                    <option value='1'>Cliente</option>
                                    <option value='2'>Admin</option>
                                </select>
                            </div>
                                <div class='form-group'>
                                    <input name='nome' type='text' class='form-control rounded-left' placeholder=' ' style='margin-top: 30px;' value=" . $cadastro['nome'] . ">
                                    <label for='firstname' class='placeholder'> Nome do cliente</label>
                                </div>

                                <div class='form-group'>
                                    <input name='cpf' type='text' class='form-control rounded-left' placeholder=' ' style='margin-top: 30px;' value=" . $cadastro['cpf'] . ">
                                    <label for='firstname' class='placeholder'> CPF</label>
                                </div>

                                <div class='form-group'>
                                    <input name='email' type='text' class='form-control rounded-left' placeholder=' ' style='margin-top: 30px;' value=" . $cadastro['email'] . ">
                                    <label for='firstname' class='placeholder'>E-mail</label>
                                </div>
                                <div class='form-group'>
                                    <button type='submit' class='btn btn-outline-warning' style='width: 150px; margin-top:30px;background-color:black;color:white;position:relative;left:35%;'>Salvar</button>
                                </div>

                            </form>
                        </div>
                    </div>
                    </div>"
                        ;
                    }
                }
                ?>
            </tbody>
            <?php
            ?>
            </tbody>
        </table>

    </div>

    <!--============================================================================-->
    <!--==================================== TABELA  PLANOS ========================-->

    <div class="table-wrapper" id="plan">
        <!-- <div class="dv-title">
            <button onclick="abrirSenha('abrir')" class="btn btn-success"
                style="height: 40px;margin-bottom:20px">Cadastrar</buttom>
        </div> -->
        <table class="fl-table table-bordered border-white caption-top">
            <caption>Informações do site</caption>
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Planos</th>
                    <th scope="col">Valores</th>
                    <th scope="col">Excluir</th>
                    <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $consulta = "SELECT * FROM tbl_planos";
                $sql = $conn->query($consulta) or die($conn->error);
                while ($plano = $sql->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $plano['idl_planos'] . "</td>";
                    echo "<td>" . $plano['nome_plano'] . "</td>";
                    echo "<td>" . $plano['valor_plano'] . "</td>";
                    echo "<td>" . '  <a class="btn btn-danger" href=../inc/remove_planos.php?id=' . $plano['idl_planos'] . "><img src='..\img\icons8-excluir-30.png'></a>" . "</td>";
                    echo "<td>" . "<button class='btn btn-success' onclick='abrir(" . $plano['idl_planos'] . ")' >Editar</button>" . "</td>";
                    echo '</tr>';


                    echo " <div class='backgroundModal'style='position:absolute!important;top:15%;left:25%;' id=" . $plano["idl_planos"] . ">
                                <div class='login-wrap p-4 p-md-5'>
                                    <span class='X-lateral-vei' style='cursor:pointer;' onclick='fechar(" . $plano['idl_planos'] . ") '><img  src='..\img\icons8-excluir-30.png'></span>
                                    <h3 class='text-center mb-4' style='padding-top: 50px; color: white; font-size: 25px; color:#0e0e0e;'>Editar os Planos</h3>
                                    <form action='../inc/editar_plano.php' method='get' class='login-form'>

                                        <input type='hidden' name='id_user' value=" . $plano['idl_planos'] . ">
                                        
                                        <div class='form-group'>
                                            <input name='nome_plano' type='text' class='form-control rounded-left' placeholder=' ' style='margin-top: 30px;' value=" . $plano['nome_plano'] . ">
                                            <label for='firstname' class='placeholder'> Nome do Plano</label>
                                        </div>

                                        <div class='form-group'>
                                            <input name='valor_plano' type='text' class='form-control rounded-left' placeholder=' ' style='margin-top: 30px;' value=" . $plano['valor_plano'] . ">
                                            <label for='firstname' class='placeholder'> Valor do Plano</label>
                                        </div>

                                        <div class='form-group'>
                                            <input name='opcao_plano' type='text' class='form-control rounded-left' placeholder=' ' style='margin-top: 30px;' value=" . $plano['opcao_plano'] . ">
                                            <label for='firstname' class='placeholder'>Opçao de Planos</label>
                                        </div>

                                        <div class='form-outline mb-4'>
                                            <label for='exampleFormControlTextarea1'style='position:relative;top:1vh;color:black;'>Adicione uma descrição ao plano</label>
                                            <textarea  name='desc_plano' class='form-control' id='exampleFormControlTextarea1' rows='4' style='position:relative;top:1vh; resize:none;'>" . $plano['desc_plano'] . "</textarea>
                                        </div>

                                        <div class='form-group'>
                                            <button type='submit' class='btn btn-outline-warning' style='width: 150px; margin-top:30px;background-color:black;color:white;position:relative;left:35%;'>Salvar</button>
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
</body>

</html>