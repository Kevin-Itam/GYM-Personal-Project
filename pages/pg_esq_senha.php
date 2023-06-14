<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <a class="btn btn-outline-warning" href="../pages/pg_cadastro.php" role="button"
                        style="margin-right: 5.5rem;">Cadastrar</a>
                </form>
                <form class="form-inline my-2 my-lg-0">
                    <a class="btn btn-outline-warning" href="../pages/pg_login.php" role="button">Acessar</a>
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
                            <h3 class="text-center mb-4" style="padding-top: -10px; color: white; font-size: 30px;">
                                Recuperação de senha</h3>
                            <form action="#" class="login-form">
                                <div class="form-group">
                                    <input type="text" class="form-control rounded-left" placeholder="CPF" required=""
                                        style="margin-top: 10px;">
                                </div>
                                <!--========== Colocar notificação de foi enviado e de não foi encotrado o usuário informa o e-mail ou telefone do suporte==========-->
                                <div class="form-group">
                                    <button type="button" class="btn btn-outline-warning"
                                        style="width: 150px; margin-top: 25px;">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</body>

</html>