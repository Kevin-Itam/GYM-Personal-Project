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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/3a1453d3f1.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                    <input name="troca_senha" type="password" class="form-control rounded-left" placeholder="Senha" required="" style="margin-top: 25px;">
                </div>
                <div class="form-group d-flex">
                    <input name="troca_senha_conf" type="password" class="form-control rounded-left" placeholder="Repetir Senha" required="" style="margin-top: 10px;">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-warning" style="width: 150px; margin-top: 25px;">Trocar</button>
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
                <hr style="position: relative;top:100%;border-bottom: 2px solid #0e0e0e;margin-top: 11px!important; opacity:1!important; width: 100%;">
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
                <div class="dv_ig" >
                    <a href="../pages/pg_painel_user.php" >
                        <img src="../img/icons-userr.png" style="height: 40px; width: 40px;">
                        <p>Dados do usuário</p>
                    </a>
                    <a href="../pages/pg_painel_plano_ativos.php" style="margin-top: 20px;">
                        <img src="../img/icons-userr.png" style="height: 40px; width: 40px;">
                        <p>Plano Ativo</p>
                    </a>
                    <a href="../pages/pg_painel_plano.php" style="margin-top: 20px;">
                        <img src="../img/icons-userr.png" style="height: 40px; width: 40px;">
                        <p>Comprar Planos</p>
                    </a>

                </div>
            </div>
        </div>';
            }
            ?>

        </section>
        <!--============CORPO DA PAGINA==========-->
        <form action="../inc/editar_user.php" id="form" autocomplete="off">

            <div style="position: absolute;top: 5rem;
    left: 50vw;">

                <h2>Planos disponíveis</h2>
            </div>

            <section style="width: 70%;
    position: absolute;
    left: 0px;
    transform: translate(30%, 100%);">
                <div class="container" style="margin: 0!important;">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col">

                            <div class="card mb-4">
                                <div class="card-body p-4">

                                    <div class="row align-items-center" style="margin-top: 25px;">
                                        <div class="col-md-2">
                                            <p class="lead fw-normal mb-0"><i class="fas fa-circle me-2" style="color: green;" aria-hidden="true"></i>
                                                Ativo</p>
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-center">
                                            <div>
                                                <p class="small text-muted mb-4 pb-2">Nome</p>
                                                <p class="lead fw-normal mb-0">Frango</p>
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-center">
                                            <div>
                                                <p class="small text-muted mb-F4 pb-2">Tipo</p>
                                                <p class="lead fw-normal mb-0"><i class="#" aria-hidden="true"></i>
                                                    Mensal</p>
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-center">
                                            <div>
                                                <p class="small text-muted mb-4 pb-2">Descrição</p>
                                                <p class="lead fw-normal mb-0">Poderá cancelar seu plano a qualquer
                                                    momento</p>
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-center">
                                            <div>
                                                <p class="small text-muted mb-4 pb-2">Valor</p>
                                                <p class="lead fw-normal mb-0">109,99</p>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="button" class="btn btn-danger btn-lg">Cancelar Plano</button>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
    </section>


    </form>
    </div>
    <script src="../js/javaScript.js" crossorigin="anonymous"></script>
    <script src="../js/ModalSenha.js" crossorigin="anonymous"></script>

</body>

</html>