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
            $senha = $usuario_detalhes['senha'];
            $cpf = $usuario_detalhes['cpf'];
            $email = $usuario_detalhes['email'];
            $sexo = $usuario_detalhes['sexo'];
            $nascimento = $usuario_detalhes['nascimento'];
            $telefone = $usuario_detalhes['telefone'];
            $telefone_ad = $usuario_detalhes['telefone_ad'];
            $permissao = $usuario_detalhes['perm_acesso'];
        }
    } else {
        echo "<script> window.location='../pages/pg_login.php'</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../css/SASS/SASS_Perfil/style_PERFIL_sass.css" rel="stylesheet" />
    <title>Perfil de Usuário</title>
</head>

<body>
    <!--============ LATERAL===========-->
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

            }
            if (($permissao) == 1) {
                echo '<li class="menu_pg">
                <a href="#">
                    <span class="menu_ico"><i class="bi bi-cart-check"></i></span>
                </a>
                
                <a href="../pages/pg_painel_plano_ativos.php" class="menu_link">
                    <span class="menu_txt">Plano Ativo</span>
                </a>
            </li>';
                echo '<li class="menu_pg">
                <a href="#">
                    <span class="menu_ico"><i class="bi bi-cart-plus"></i></span>
                </a>
                
                <a href="../pages/pg_painel_plano.php" class="menu_link">
                    <span class="menu_txt">Comprar Planos</span>
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
    <!--=========CORPO DA PAGINA==========-->
    <form action="../inc/editar_user.php" id="form" autocomplete="off">
        <section class="sec-border">
            <section class="sec-form">
                <div class="perfil__img">
                    <div class="item-0">
                        <div class="our-team">
                            <div class="picture">
                                <img class="img-fluid" src="https://picsum.photos/130/130?image=1027">
                            </div>
                            <!-- <div class="team-content">
                                <h3 class="name">Michele Miller</h3>
                                <h4 class="title">Web Developer</h4>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="input__form" id="item-1">
                    <input id="firstname" name="nome" class="input__field" type="text" placeholder=" ">
                    <label for="firstname" id="item-name" class="form__label">Nome Completo</label>
                </div>
                <div class="input__form" id="item-2">
                    <input id="Cpf" name="cpf" class="input__field" type="text" placeholder=" ">
                    <label for="Cpf" id="item-cpf" class="form__label">CPF</label>
                </div>
                <div class="input__form" id="item-3">
                    <input id="Email" name="email" class="input__field" type="text" placeholder=" ">
                    <label for="Email" id="item-email" class="form__label">E-mail</label>
                </div>
                <div class="input__form" id="item-4">
                    <label for="item-4" class="select__label">SEXO</label>
                    <?php
                    if (($sexo) == 'Masculino') {
                        echo '
                            <div class="">
                                <select name="sexo" id="select">
                                    <option "value=' . $sexo . '">' . $sexo . '</option>
                                    <option value="Feminino">Feminino</option>
                                    <option value="Outro">Outro</option>
                                </select>
                            </div>';
                    } else {
                        if (($sexo) == 'Feminino') {
                            echo '
                    <div>
                        <select name="sexo" id="select">
                            <option "value=' . $sexo . '">' . $sexo . '</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>';
                        } else {
                            echo '
                    <div class="select">
                        <select name="sexo">
                            <option "value=' . $sexo . '">' . $sexo . '</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                        </select>
                    </div>';
                        }
                    }
                    ?>

                </div>
                <div class="input__form" id="item-5">
                    <label for="Data" class="select__label">Data de Nascimento</label>
                    <input id="Data" name="data" class="input__date" type="date">
                </div>
                <div class="input__form" id="item-6">
                    <input id="Tel_Cel" name="tel_cel" class="input__field" type="text" placeholder=" ">
                    <label for="Tel_Cel" id="item-cel" class="form__label">telefone celular</label>
                </div>
                <div class="input__form" id="item-7">
                    <input id="Tel_Re" name="tel_re" class="input__field" type="text" placeholder=" ">
                    <label for="Tel_Re" id="item-cel-cs" class="form__label">telefone casa</label>
                </div>
                <!-- <div class="colunm">
                    <div class="input__form" id="item-8">
                        <input id="Cep" name="CEP" class="input__field" type="text" placeholder=" ">
                        <label for="Cep" id="item-cep" class="form__label">CEP</label>
                    </div>
                    <div class="input__form" id="item-9">
                        <input id="loco" name="local" class="input__field" type="text" placeholder=" ">
                        <label for="loco" id="item-cid_es" class="form__label">Cidade/Estado</label>
                    </div>
                    <div class="input__form" id="item-10">
                        <input id="bair" name="Bairro" class="input__field" type="text" placeholder=" ">
                        <label for="bair" id="item-bairro" class="form__label">Bairro</label>
                    </div>
                    <div class="input__form" id="item-11">
                        <input id="rua" name="Rua" class="input__field" type="text" placeholder=" ">
                        <label for="rua" id="item-rua" class="form__label">Rua</label>
                    </div>
                    <div class="input__form" id="item-12">
                        <input id="num" name="Número" class="input__field" type="text" placeholder=" ">
                        <label for="num" id="item-numero" class="form__label">Número</label>
                    </div> -->
                </div>
                <div class="button__form" id="item-13">
                    <div class="btn">
                        <button class="btn__button">Confirmar</button>
                        <button class="btn__button">Limpar</button>
                    </div>
                </div>
            </section>
        </section>

    </form>
    <!-- <script src="../js/javaScript.js" crossorigin="anonymous"></scri> -->

    <script>
        function formatar(mascara, documento) {
            let i = documento.value.length;
            let saida = '#';
            let texto = mascara.substring(i);
            while (texto.substring(0, 1) != saida && texto.length) {
                documento.value += texto.substring(0, 1);
                i++;
                texto = mascara.substring(i);
            }
        }
    </script>
</body>

</html>