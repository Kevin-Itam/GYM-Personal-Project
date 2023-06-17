<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link href="../css/style_cad.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Tela de Cadastro</title>
</head>

<body class="text-center">
    <div>
        <img class="background-image" src="../img/loss_lado.png">
        <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: black;">
            <a class="navbar-brand" href="../index.php" style="color: white;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="form-inline my-2 my-lg-0">
                    <a class="btn btn-outline-warning" href="../pages/pg_cadastro.php" role="button">Cadastrar</a>
                </form>
            </div>
        </nav>
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-5">
                        <div class="login-wrap p-4 p-md-5">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-user-o"></span>
                            </div>
                            <img src="../img/logo.jpg" class="d-inline-block align-top"
                                style="width: 150px; height: 150px;">
                            <h3 class="text-center mb-4" style="padding-top: -10px; color: white; font-size: 25px;">Você
                                tem cadastro?</h3>
                            <form action="../inc/session.php" method="post" class="login-form">
                                <div class="form-group">
                                    <input name="cpf" type="text" class="form-control rounded-left" placeholder="CPF" required=""
                                        style="margin-top: 10px;">
                                </div>
                                <div class="form-group d-flex">
                                    <input name="senha" type="password" class="form-control rounded-left" placeholder="Senha"
                                        required="" style="margin-top: 10px;">
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-md-right" style="margin-top: 10px;position:relative;right:6%;">
                                        <a href="../pages/pg_esq_senha.php" style="color:white;font-size:18px;">Esqueceu a senha?</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-warning"
                                        style="width: 150px; margin-top: 25px;position:relative;left:30%;">Logar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>