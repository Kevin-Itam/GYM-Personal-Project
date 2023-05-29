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
    <link href="../css/style_painel.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/3a1453d3f1.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Painel de Usuario</title>
</head>
<style>

</style>

<body>
    <!--============ LATERAL===========-->
    <section class="la">
        <div class="div_out">
            <h5>Bem-Vindo,<b> <?php echo $nome ?></b></h5><br>
            <div class="dv_ig">
                <a href="../inc/logout.php" style="background-color: #0e0e0e; border-radius: 8px;">
                    <img src="../img/icons-userr.png" style="height: 40px; width: 40px;">
                    <p>Sair da Conta</p>
                </a>
            </div>
        </div>

        <div class="div1">
            <img src="">
            <div>
                <h5>Bem-Vindo,<b> Andre Manoel Santana</b></h5><br>
                <div class="dv_ig">
                    <a href="">
                        <img src="../img/icons-userr.png" style="height: 40px; width: 40px;">
                        <p>Sair da Conta</p>
                    </a>

                </div>
            </div>
        </div>
        <hr style="border-bottom: 2px solid #0e0e0e; margin: 1px!important; opacity:1!important;">
        <div class="div1">
            <img src="">
            <div>
                <h5>Plano Contratado</h5><br>
                <div class="dv_ig">
                    <a href="">
                        <img src="../img/icon_painel.png" style="height: 40px; width: 40px;">
                        <p>Acessar seus planos</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="div1">
            <img src="">
            <div>
                <h5>Bem-Vindo</h5><br>
                <div class="dv_ig">
                    <a href="">
                        <img src="../img/icons-userr.png" style="height: 40px; width: 40px;">
                        <p>Sair da Conta</p>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--============CORPO DA PAGINA==========-->
    <form action="" id="form">

        <div class="titulo">
            <img src="../img/icons-userr.png">
            <h2>Cadastro</h2>
        </div>

        <section class="fild_1">
            <header align="center">Dados Pessoais </header>
            <div class="dv1">
                <div class="input-container">
                    <input id="firstname" name="nome" class="input" type="text" placeholder=" " value="<?php echo $nome ?>">
                    <label for="firstname" class="placeholder">Nome</label>
                </div>

                <div class="input-container">
                    <input id="CPF" name="cpf" class="input" type="text" placeholder=" " value="<?php echo $cpf ?>">
                    <label for="CPF" class="placeholder">CPF</label>
                </div>
            </div>

            <div class="dv1">
                <div class="input-container">
                    <input id="E-mail" name="email" class="input" type="text" placeholder=" " value="<?php echo $email ?>">
                    <label for="E-mail" class="placeholder">E-mail</label>
                </div>
                <div class="input-container">
                    <input id="Data" name="data" class="input" type="date" value="<?php echo $nascimento ?>">
                </div>
            </div>

            <div class="dvsec">
                <label for="select" class="lasec">Sexo</label>
                <select name="select" id="select" value="<?php echo $nascimento ?>">
                    <option>Selecionar</option>
                    <option>Masculino</option>
                    <option>Feminino</option>
                </select>
            </div>

            <div class="dv1">
                <div class="input-container">
                    <input id="TEl1" name="tel1" class="input" type="text" placeholder=" " value="<?php echo $telefone ?>">
                    <label for="TEl1" class="placeholder">Telefone</label>
                </div>
                <div class="input-container">
                    <input id="TEL2" name="tel2" class="input" type="text" placeholder=" " value="<?php echo $telefone_ad ?>">
                    <label for="TEL2" class="placeholder">Telefone 2</label>
                </div>
            </div>

            <div class="BTN">
                <button type="submit">Confirmar</button>
                <button type="reset">Limpar</button>
            </div>

        </section>


    </form>
    <script src="../js/javaScript.js" crossorigin="anonymous"></script>
</body>

</html>