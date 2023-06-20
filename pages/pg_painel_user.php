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
                        <a href="../index.php">
                            <img src="..\img\retorna.png" style="height: 40px; width: 40px;">
                            <p>Pagina principal</p>
                        </a>

                    </div>
                </div>
                <hr
                    style="position: relative;top:100%;border-bottom: 2px solid #0e0e0e;margin-top: 11px!important; opacity:1!important; width: 100%;">
            </div>

            <?php
            if (($permissao) == 2) {
                echo ' <div class="div1">
                <img src="">
                <div>
                    <h5>Administrador</h5><br>
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
            if (($permissao) == 1) {
                echo ' <div class="div1">
                <img src="">
                <div>
                    <h5>Consultar</h5><br>
                    <div class="dv_ig">
                        <a href="../pages/pg_painel_plano_ativos.php">
                            <img src="../img/icons-userr.png" style="height: 40px; width: 40px;">
                            <p>Planos Antivos</p>
                        </a>
                        <a href="../pages/pg_painel_plano.php">
                            <img src="../img/icons-userr.png" style="height: 40px; width: 40px;">
                            <p>Compras Planos</p>
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
                <h2>Perfil de Administrador</h2>
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
                </div>

            </section>


        </form>
    </div>
    <!-- <script src="../js/javaScript.js" crossorigin="anonymous"></script> -->
    <script src="../js/ModalSenha.js" crossorigin="anonymous"></script>
    <script>  
  function formatar(mascara, documento) {
    let i = documento.value.length;
    let saida = '#';
    let texto = mascara.substring(i);
    while (texto.substring(0, 1) != saida && texto.length ) {
      documento.value += texto.substring(0, 1);
      i++;
      texto = mascara.substring(i);
    }
  }
</script>

</body>

</html>