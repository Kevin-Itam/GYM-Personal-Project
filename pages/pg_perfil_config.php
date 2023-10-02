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
    <title></title>
</head>
<style>
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

    .form-group {
        position: relative;
        height: 50px !important;
    }

    .form-control {
        background: #222 !important;
        color: white !important;
        font-size: 18px !important;
        height: 100% !important;
        outline: 0 !important;

    }

    .form-control:focus~.cut,
    .form-control:not(:placeholder-shown)~.cut {
        transform: translateY(8px) !important;
    }

    .placeholder {
        color: white !important;
        font-family: sans-serif !important;
        left: 20px !important;
        line-height: 14px !important;
        pointer-events: none !important;
        position: absolute !important;
        transform-origin: 0 50% !important;
        transition: transform 200ms, color 200ms !important;
        top: 20px !important;
    }

    .form-control:focus~.placeholder,
    .form-control:not(:placeholder-shown)~.placeholder {
        transform: translateY(-42px) translateX(-10px) scale(0.95);
    }

    .form-control:not(:placeholder-shown)~.placeholder {
        color: rgb(0, 0, 0) !important;

    }

    .form-control:focus~.placeholder {
        color: rgb(0, 0, 0) !important;
        font-weight: 600;
        font-size: 17px;
    }
</style>

<body>
    <!--============ Modal===========-->
    <div class="backgroundModal" id="abrir">
        <div class="login-wrap p-4 p-md-5">
            <span class="X-lateral-vei" onclick="fecharSenha('abrir')"><img style="cursor:pointer;position: relative;
    bottom: 30px;
    left: 100%;" src='..\img\icons8-excluir-30.png'></span>
            <h3 class="text-center mb-4" style="padding-top: 50px;
    font-size: 25px;
    color: #0e0e0e;
    position: relative;
    top: -4vh;
    font-weight: 600;">Digite
                a sua senha nova</h3>
            <form action="../inc/alterarSenha.php" autocomplete="off" class="login-form" style="position: relative;
    top: -2vh;">
                <input type="hidden" name="id_user" value="<?php echo $id; ?>">
                <div class="form-group">
                    <input name="troca_senha" type="password" class="form-control rounded-left" placeholder=" "
                        style="margin-top: 30px;">
                    <label for="firstname" class="placeholder">Senha</label>
                </div>
                <div class="form-group">
                    <input name="troca_senha_conf" type="password" class="form-control rounded-left" placeholder=" "
                        style="margin-top: 30px;">
                    <label for="firstname" class="placeholder"> Repetir senha</label>
                </div>
                <!-- <div class="form-group">
                    <button type="submit" class="btn btn-outline-warning"
                        style="width: 150px; margin-top: 25px; color: black;border:1px solid black;position:relative;left:20%;">Trocar</button>
                </div> -->
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-warning"
                        style="width: 150px; margin-top:25px;background-color:black;color:white;position:relative;left:25%;">Trocar
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!--=======================-->
    <div id="filterBlur">
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
                <li class="menu_pg">
                    <a href="#">
                        <span class="menu_ico"><i class="bi bi-person-gear"></i></span>
                    </a>
                    <a href="../pages/pg_perfil_config.php" class="menu_link">
                        <span class="menu_txt">Configuração</span>
                    </a>
                </li>
                <?php
            if (($permissao) == 1) {
                echo
                    '<li class="menu_pg">
                        <a href="#">
                            <span class="menu_ico"><i class="bi bi-cart-check"></i></span>
                        </a>                    
                        <a href="../pages/pg_painel_plano_ativos.php" class="menu_link">
                            <span class="menu_txt">planos ativos</span>
                        </a>
                    </li>
                    <li class="menu_pg">
                        <a href="#">
                            <span class="menu_ico"><i class="bi bi-cart-plus"></i></span>
                        </a>
                        <a href="../pages/pg_painel_plano.php" class="menu_link">
                            <span class="menu_txt">Comprar Planos</span>
                        </a>
                    </li>';
            }
            ?>
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
        </section>
        <!--============CORPO DA PAGINA==========-->
        <form action="../inc/editar_user.php" id="form" autocomplete="off">

            <section class="sec-border">
                <section class="sec-form">
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
                    <div class="input__form" id="item-5">
                        <label for="Data" class="select__label">Data de Nascimento</label>
                        <input id="Data" name="data" class="input__date" type="date">
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
    </div>
    <!-- <script src="../js/javaScript.js" crossorigin="anonymous"></scri> -->
    <script src="../js/ModalSenha.js" crossorigin="anonymous"></script>

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