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
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../css/SASS/SASS_Perfil/style_PERFIL_sass.css" rel="stylesheet" />
    <link href="../css/style_painel.css" rel="stylesheet" />
    <title>Planos Disponiveis</title>
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

                <a href="../pages/pg_painel_user.php" class="menu_link back">
                    <span class="menu_txt">Home</span>
                </a>
            </li>
        </ul>
    </nav>
    <!--============CORPO DA PAGINA==========-->
    <form action="../inc/editar_user.php" id="form" autocomplete="off">
        <section style="width: 70%;
    position: absolute;
    left: 0px;
    transform: translate(30%, 35%);">
            <div class="container " style="margin: 0!important;">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">

                        <div class="card mb-4">
                            <div class="card-body p-4">

                                <?php
                                $consulta = "SELECT * FROM tbl_planos";
                                $sql = $conn->query($consulta) or die($conn->error);

                                while ($plano = $sql->fetch_assoc()) {
                                    echo '
                
                <div class="row align-items-center" style="margin-top: 25px;">
                <div class="col-md-2">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="#">
                <label class="form-check-label" for="#">
                  Selecionar
                </label>
              </div>
                <div class="col-md-2 d-flex justify-content-center">
                  <div>
                    <p class="small text-muted mb-4 pb-2">Nome</p>
                    <p class="lead fw-normal mb-0">' . $plano['nome_plano'] . '</p>
                  </div>
                </div>
                <div class="col-md-2 d-flex justify-content-center">
                  <div>
                    <p class="small text-muted mb-F4 pb-2">Tipo</p>
                    <p class="lead fw-normal mb-0"><i class="fas fa-circle me-2" aria-hidden="true"></i>
                    ' . $plano['opcao_plano'] . '</p>
                  </div>
                </div>
                <div class="col-md-2 d-flex justify-content-center" >
                  <div>
                    <p class="small text-muted mb-4 pb-2">Descrição</p>
                    <p class="lead fw-normal mb-0">Poderá cancelar seu plano a qualquer momento</p>
                  </div>
                </div>
                <div class="col-md-2 d-flex justify-content-center">
                  <div>
                    <p class="small text-muted mb-4 pb-2">Valor</p>
                    <p class="lead fw-normal mb-0">' . $plano['valor_plano'] . '</p>
                  </div>
                </div> 
                ';
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-5">
                    <div class="card-body p-4">

                        <div class="float-end">
                            <p class="mb-0 me-5 d-flex align-items-center">
                                <span class="small text-muted me-2">Valor Total:</span> <span class="lead fw-normal">R$
                                    00,00</span>
                            </p>
                        </div>

                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary btn-lg">Continue</button>
                </div>

            </div>
            </div>
            </div>
        </section>


    </form>
</body>

</html>