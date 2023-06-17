<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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
                            <!-- <img src="../img/logo.jpg" width="30" height="30" style="position:relative;"
                                class="d-inline-block align-top" style="width: 100px; height: 100px;"> -->
                            <h3 class="text-center mb-4" style="font-size: 25px; color: white;">Preencher os campos para
                                realizar o seu cadastro</h3>
                            <form action="../inc/cadastro_user.php" method="post" class="login-form">
                                <div class="form-group d-flex" style="margin-top: 10px;">
                                    <input name="name" id="nome" type="text" class="form-control rounded-left"
                                        placeholder="Nome Completo" required="">
                                    <span class="span_cad">Preencha o campo Nome </span>
                                </div>
                                <div class="form-group d-flex" style="margin-top: 10px;">
                                    <input name="cpf" id="CPF" type="text" class="form-control rounded-left" placeholder="CPF"
                                        required="">
                                    <span class="span_cad">Preencha o campo CPF </span>
                                </div>
                                <div class="form-group d-flex" style="margin-top: 10px;">
                                    <input name="email" id="E-mail" type="email" class="form-control rounded-left"
                                        placeholder="E-mail" required="">
                                    <span class="span_cad">Preencha o campo E-MAIL </span>
                                </div>
                                <div class="form-group d-flex" style="margin-top: 10px;">
                                    <input name="senha" id="senha" type="password" class="form-control rounded-left"
                                        placeholder="Senha" required="">
                                    <span class="span_cad">Preencha o campo SENHA </span>
                                </div>
                                <div class="form-group d-flex" style="margin-top: 10px;">
                                    <input name="senha_conf" id="conf_senha" type="password" class="form-control rounded-left"
                                        placeholder=" Confirmar senha" required="">
                                    <span class="span_cad">Confirme sua SENHA </span>
                                </div>
                                <div class="form-g d-flex">
                                    <select name="sexo" class="" aria-label=".form-select-sm example"
                                        style="margin-top: 10px;">
                                        <option selected value="0">Sexo</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Feminino">Feminino</option>
                                        <option value="Outro">Outro</option>
                                    </select>

                                    <div id="date-picker-example"
                                        class="md-form md-outline input-with-post-icon datepicker " inline="true"
                                        style="padding-top: 10px;">
                                        <label for="firtname" style="color: white;">Data de Nascimento&nbsp;:&nbsp;</label>
                                        <input name="data" id="date" type="date" value=""style="border-radius:2px;padding:3px;">
                                    </div>
                                </div>
                                <div class="form-group d-flex" style="margin-top: 10px;">
                                    <input name="telefone" id="TEl1" type="text" class="form-control rounded-left"
                                        placeholder="(00) 00000-0000" required="">
                                    <span class="span_cad">Preencha o campo Telefone </span>
                                </div>
                                <div class="form-check form-switch" style="padding-top: 10px;">
                                    <input name="notification" class="form-check-input" type="checkbox"
                                        id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"
                                        style="color: white;">Aceita receber novidades em seu e-mail?</label>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-outline-warning"
                                        style="width: 150px; margin-top: 25px;">Cadastrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- <script src="../js/javaScript.js" crossorigin="anonymous"></script> -->
</body>

</html>