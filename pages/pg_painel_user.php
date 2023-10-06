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
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../css/SASS/SASS_Perfil/style_PERFIL_sass.css" rel="stylesheet" />
    <title>Página de perfil</title>
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

                <a href="../index.php" class="menu_link back">
                    <span class="menu_txt">Pagina Inicial</span>
                </a>
            </li>
        </ul>
    </nav>
    <!--============CORPO DA PAGINA==========-->
    <form autocomplete="off">

        <section class="sec__back_1">
            <section class="sec__form">
                <div class="perfil__img">
                    <div class="item-0">
                        <div class="our-team">
                            <div class="picture">
                                <img class="img-fluid" src="https://picsum.photos/130/130?image=1027">
                                <p class="name"><?php echo $nome ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="input__form" id="item-2">
                    <input id="Cpf" name="cpf" class="input__field" type="text" placeholder=" "
                        value="<?php echo $cpf ?>" disabled>
                    <label for="Cpf" id="item-cpf" class="form__label">CPF</label>
                </div>
                <div class="input__form" id="item-3">
                    <input id="Email" name="email" class="input__field" type="text" placeholder=" "
                        value="<?php echo $email ?>" disabled>
                    <label for="Email" id="item-email" class="form__label">E-mail</label>
                </div>
                <div class="input__form" id="item-4">
                    <input id="Tel_Cel" name="tel_cel" class="input__field" type="text" placeholder=" "
                        value="<?php echo $telefone ?>" disabled>
                    <label for="Tel_Cel" id="item-cel" class="form__label">telefone celular</label>
                </div>
                <div class="input__form" id="item-5">
                    <input id="Tel_Re" name="tel_re" class="input__field" type="text" placeholder=" "
                        value="<?php echo $telefone_ad ?>" disabled>
                    <label for="Tel_Re" id="item-cel-cs" class="form__label">telefone casa</label>
                </div>
            </section>
        </section>
    </form>
    </div>
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