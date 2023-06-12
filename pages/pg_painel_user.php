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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/3a1453d3f1.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../css/style_painel.css" rel="stylesheet" />
    <title>Painel de Usuario</title>
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
</style>

<body>
    <!--============ Modal===========-->
    <div class="backgroundModal" id="abrir">
        <div class="login-wrap p-4 p-md-5">
            <span class="X-lateral-vei" onclick="fecharSenha('abrir')"><i class="fa-regular fa-circle-xmark"></i></span>
            <h3 class="text-center mb-4" style="padding-top: 50px; color: white; font-size: 25px; color:#0e0e0e;">Digite
                a sua senha nova</h3>
            <form action="../inc/alterarSenha.php" autocomplete="off" class="login-form">
                <input type="hidden" name="id_user" value="<?php echo $id; ?>">
                <div class="form-group">
                    <input name="troca_senha" type="password" class="form-control rounded-left" placeholder="Senha"
                        required="" style="margin-top: 25px;">
                </div>
                <div class="form-group d-flex">
                    <input name="troca_senha_conf" type="password" class="form-control rounded-left"
                        placeholder="Repetir Senha" required="" style="margin-top: 10px;">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-warning"
                        style="width: 150px; margin-top: 25px;">Trocar</button>
                </div>
            </form>
        </div>
    </div>
    <!--=======================-->
    <div id="filterBlur">
        <!--============ LATERAL===========-->
        <section class="la">
            <div class="div_out">
                <h5>Bem-Vindo,<b>
                        <?php echo $nome ?>
                    </b></h5><br>
                <div class="dv_ig">
                    <a href="../inc/logout.php" style="background-color: #0e0e0e; border-radius: 8px;">
                        <img src="../img/icons-userr.png" style="height: 40px; width: 40px;">
                        <p>Sair da Conta</p>
                    </a>
                    <button onclick="abrirSenha('abrir')"
                        style="background-color: #0e0e0e; border-radius: 8px; margin-top: 5px; color: white;">
                        <!--<img src="../img/chave.png" style="height: 40px; width: 40px;">-->
                        <p>Alterar Senha</p>
                        </buttom>
                </div>
            </div>
            <div class="div1">
                <img src="">
                <div align="center">
                    <div class="dv_ig">
                        <a href="../index_Apre.php">
                            <img src="..\img\retorna.png" style="height: 40px; width: 40px;">
                            <p>Pagina principal</p>
                        </a>

                    </div>
                </div>
                <hr
                    style="position: relative;top:100%;border-bottom: 2px solid #0e0e0e;margin-top: 11px!important; opacity:1!important; width: 100%;">
            </div>

            <?php
            if (($permissao) == 1) {
                echo ' <div class="div1">
                <img src="">
                <div>
                    <h5>Plano Contratado</h5><br>
                    <div class="dv_ig">
                        <a href="../pages/pg_plano_user.php">
                            <img src="../img/icons-userr.png" style="height: 40px; width: 40px;">
                            <p>Painel de Administrador</p>
                        </a>
                    </div>
                </div>
            </div>';
            }
            ?>
            <?php
            if (($permissao) == 2) {
                echo '<div class="div1">
                <img src="">
                <div>
                    <h5>Plano contratado</h5><br>
                    <div class="dv_ig">
                        <a href="">
                            <img src="../img/icon_painel.png" style="height: 40px; width: 40px;">
                            <p>Acessar seus planos</p>
                        </a>
                    </div>
                </div>
            </div>';
            }
            ?>

        </section>
        <!--============CORPO DA PAGINA==========-->
        <form action="../inc/editar_user.php" id="form" autocomplete="off">

            <div class="titulo">
                <img src="../img/icons-userr.png">
                <h2>Perfil de Usuario</h2>
            </div>

            <section class="fild_1">
                <input type="hidden" name="id_user" value="<?php echo $id; ?>">
                <header align="center">Dados Pessoais </header>
                <div class="dv1">
                    <div class="input-container">
                        <input id="firstname" name="nome" class="input" type="text" placeholder=" "
                            value="<?php echo $nome ?>">
                        <label for="firstname" class="placeholder">Nome</label>
                    </div>

                    <div class="input-container">
                        <input id="CPF" name="cpf" class="input" type="text" placeholder=" " value="<?php echo $cpf ?>">
                        <label for="CPF" class="placeholder">CPF</label>
                    </div>
                </div>

                <div class="dv1">
                    <div class="input-container">
                        <input id="E-mail" name="email" class="input" type="text" placeholder=" "
                            value="<?php echo $email ?>">
                        <label for="E-mail" class="placeholder">E-mail</label>
                    </div>
                    <div class="input-container">
                        <input id="Data" name="data" class="input" type="date" value="<?php echo $nascimento ?>">
                        <label for="E-mail" class="placeholder">Data de Nascimento</label>
                    </div>
                </div>
                <?php
                if (($sexo) == 'Masculino') {
                    echo '
                <div class="dvsec">
                    <label for="select" class="lasec">Sexo</label>
                    <select name="sexo" id="select">
                        <option "value=' . $sexo . '">' . $sexo . '</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Outro">Outro</option>
                    </select>
                </div>';
                } else {
                    if (($sexo) == 'Feminino') {
                        echo '
                        <div class="dvsec">
                            <label for="select" class="lasec">Sexo</label>
                            <select name="sexo" id="select">
                                <option "value=' . $sexo . '">' . $sexo . '</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Outro">Outro</option>
                            </select>
                        </div>';
                    } else {
                        echo '
                        <div class="dvsec">
                            <label for="select" class="lasec">Sexo</label>
                            <select name="sexo" id="select">
                                <option "value=' . $sexo . '">' . $sexo . '</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                            </select>
                        </div>';
                    }
                }
                ?>


                <div class="dv1">
                    <div class="input-container">
                        <input id="TEl1" name="telefone" class="input" type="text" placeholder=" "
                            value="<?php echo $telefone ?>">
                        <label for="TEl1" class="placeholder">Telefone</label>
                    </div>
                    <div class="input-container">
                        <input id="TEL2" name="telefone_ad" class="input" type="text" placeholder=" "
                            value="<?php echo $telefone_ad ?>">
                        <label for="TEL2" class="placeholder">Telefone Adicional</label>
                    </div>
                </div>

                <div class="BTN">
                    <button type="submit">Confirmar</button>
                    <button type="reset">Limpar</button>
                </div>

            </section>


        </form>
    </div>
    <script src="../js/javaScript.js" crossorigin="anonymous"></script>
    <script src="../js/ModalSenha.js" crossorigin="anonymous"></script>

</body>

</html>