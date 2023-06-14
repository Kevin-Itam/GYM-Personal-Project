<?php


session_start();


include_once("connect.php");

if (!empty($_SESSION['id_usuario'])) {
    $id = $_SESSION['id_usuario'];
    $sql_detalhes = "SELECT * FROM tbl_cadastro WHERE id_cadastro=$id";
    $result = $conn->query($sql_detalhes);
    if ($result->num_rows > 0) {
        while ($usuario_detalhes = mysqli_fetch_array($result)) {
            $nome = $usuario_detalhes['nome'];
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
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    <link href="css/style_planos.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Tela Inicial</title>
</head>
<style>
    p {
        font-size: 14px;
        line-height: 22px;
    }

    header {
        position: fixed;
        top: 0;
        right: 0;
        left: 0;
        display: flex;
        z-index: 1002;
    }

    h2 {
        font-size: 36px;
        line-height: 1;
        color: #ffffff;
        font-weight: bold;
        text-transform: uppercase;
        position: relative;
        padding-bottom: 20px;

    }

    span {
        color: rgba(255, 251, 0, 0.747);
    }
    .btn-primary {
        color:rgba(255,255,255,.55);
        background-color: transparent!important;
        border-color: transparent!important;
    }
</style>

<body>
    <!--========== Menus ==========-->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: rgb(0, 0, 0);">
            <a class="navbar-brand" href="#" style="color: white;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" onclick="scrollElement('apresentacao')" style="margin-left: 200px;">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="scrollElement('Sobre')">Sobre</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" onclick="scrollElement('ativ')">Programas<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" onclick="scrollElement('coach')">Treinadores<span
                                class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="scrollElement('planos')">Planos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="scrollElement('calendario')">Horarios</a>
                    </li>
                </ul>

                <?php
                if (!empty($_SESSION['id_usuario'])) {
                    echo '                <form class="form-inline my-2 my-lg-0">
                    <a class="btn btn-outline-danger" href="../inc/logout.php" role="button">Sair</a>
                </form>';
                    echo '               <form class="form-inline my-2 my-lg-0" >
                    <a class="btn btn-outline-warning" href="pages/pg_painel_user.php" role="button">' . $nome . '</a>
                </form>';
                } else {
                    echo '                <form class="form-inline my-2 my-lg-0">
                    <a class="btn-outline-warning" href="pages/pg_login.php" role="button">Acessar</a>
                </form>';
                }
                
                ?>
                <div class="dropdown">
                    <a class=" btn-primary dropdown-toggle" role="button" id="dropdownMenuLink"
                        data-mdb-toggle="dropdown" aria-expanded="false" style="text-decoration:none;">
                        Perfil de Acesso
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><form><a class="dropdown-item" href="pages/pg_painel_user.php" role="button">' . $nome . '</a></form></li>
                        <li><form><a class="dropdown-item" href="pages/pg_login.php" role="button">Acessar</a></form></li>
                        <li><form><a class="dropdown-item" href="../inc/logout.php" role="button">Sair</a></form></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!--========== Corpo da Pagina ==========-->
    <a id="back-to-top"></a>
    <section class="corpo" id="apresentacao">
        <div id="carouselExampleIndicators" class="carousel slide" data-mdb-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-mdb-interval="3000"
                    style="max-height:70vh; max-width:100vw;position: relative;top:0;">
                    <img src="https://wallpaperaccess.com/full/5595849.jpg" class="d-block w-100" alt="Wild Landscape"
                        style=" transform: scaleX(-1);" />
                    <div class="carousel-caption d-none d-md-block">
                        <p style="font-size: 30px;font-weight: 600;line-height:5vh; position:relative;top:-10rem;">A
                            cada dia você deve escolher
                            entre a
                            dor<br> da disciplina e a dor do arrependimento</p>
                        <label style="position:relative;top:-10rem;">(Jorge de Sá)</label>
                    </div>
                </div>
                <div class="carousel-item" data-mdb-interval="3000"
                    style="max-height:70vh; width:auto;position: relative;top:0;">
                    <img src="https://images2.alphacoders.com/692/692041.jpg" class="d-block w-100" alt="Camera" />
                    <div class="carousel-caption d-none d-md-block">

                        <p
                            style="font-size: 30px;font-weight: 700;line-height:5vh; position:relative;top:-12rem;left:-90vh;">
                            Sorte é o que acontece quando a preparação encontra a oportunidade.</p>
                    </div>
                </div>
                <div class="carousel-item" data-mdb-interval="3000"
                    style="max-height:70vh; max-width:100vw;position: relative;top:0;">
                    <img src="https://coolwallpapers.me/picsup/6043149-bw-fitness-barbell-gym-girls-two.jpg"
                        class="d-block w-100" alt="Exotic Fruits" />
                    <div class="carousel-caption d-none d-md-block">

                        <p style="font-size: 30px;font-weight: 600;line-height:5vh; position:relative;top:-10rem;">
                            Ser fitness não é sobre ter o corpo perfeito, mas sim sobre ter uma vida saudável e
                            equilibrada.
                        </p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleIndicators"
                data-mdb-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleIndicators"
                data-mdb-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <!--=========================================================================-->
    <section class="sobre" id="Sobre">
        <div class="crop_so">
            <div class="d_img">
                <div class="corr"></div>
                <div class="sobre_img"></div>
            </div>
            <div class="sobre_txt">

                <h2>
                    SOBRE <span style="color: #dc3543;">Lóss<span>Fit</span></span>
                </h2>
                <p style="font-size:20px;">No bairro Aventureiro tem o que você precisa para o seu treino.
                    <br>
                    <br>
                    <a>- Instrutores especializados e qualificados.</a>
                    <br>
                    <a>- Aparelhos novos e modernos.</a>
                    <br>
                    <a></a>- Ambiente climatizado. </a>
                    <br>
                    <a> - Piso emborrachado. </a>
                    <br>
                    <br>
                    Aberta de segunda a segunda, confira nossos horários.
                </p>
            </div>
        </div>
    </section>
    <section class="gym_ativ" id="ativ">
        <div class="gym_ativ_header">
            <p class="gym_ativ_title">
            <h5 style="font-size: 30px!important;"><b>Nossos Programas</b></h5>
            Oferecemos programas para todas as idades e necessidades,escolha seus objetivos e venha conquista-los
            </p>
        </div>

        <section class="gym_ativ_mid_div">
            <div class="gym_ativ_type">
                <img src="img/bodybuild.png" style="height: 600px; width: 450px;">
                <div class="gym_ativ_type_txt">
                    <h5><a><b>Musculação</b></a></h5>
                </div>
            </div>
            <div class="gym_ativ_type">
                <img src="img/zumba.jpg" style="height: 600px; width: 450px;">
                <div class="gym_ativ_type_txt">
                    <h5><a><b>Zumba</b></a></h5>
                </div>
            </div>
            <div class="gym_ativ_type">
                <img src="img/velho_treinando.jpg" style="height: 600px; width: 450px;">
                <div class="gym_ativ_type_txt">
                    <h5><a><b>Treinamento Funcional</b></h5>
                </div>
            </div>
        </section>
    </section>
    <!--=============================================================================================================================================-->
    <!--========== PLANO ==========-->

    <section class="planos" id="planos">
        <div class="row">
            <h1 style="margin-top: 5%;">Planos Disponíveis</h1>
            <?php
            $consulta = "SELECT * FROM tbl_planos";
            $sql = $conn->query($consulta) or die($conn->error);

            while ($plano = $sql->fetch_assoc()) {
                echo '<div class="col-md-4 col-sm-6">
                    <div class="pricing_table">
                        <div class="pricing_table_header">
                            <i class="fa fa-users"></i>
                            <h2 class="title">Bodybuilder</h2>
                            <span class="price-plan">
                                <i class="fa fa-inr"></i>
                                <span class="price">R$ ' . $plano['valor_plano'] . '</span>
                                <span class="monthly_plan">' . $plano['opcao_plano'] . '</span>
                            </span>
                        </div>
                        <div class="pricing_table_plan">
                            <ul>
                                <a>' . $plano['desc_plano'] . '</a>
                            </ul>
                            <a class="btn btn-outline-danger" href="pages/pg_painel_plano.php" role="button">MATRICULE-SE</a>
                        </div>
                    </div>
                </div>';
            }

            ?>
        </div>
    </section>
    <!--=============================================================================================================================================-->
    <section id="coach">

        <div class="gym_coach">
            <div class="body_spans">
                <h2>Time experiente de Treinadores</h2>
                <span class="span_c1">
                    Há mais de 5 anos no mercado, a Lóss Fit tem como propósito incentivar você a cuidar da sua saúde. E
                    é pensando nisso que preparamos um espaço completo, perfeito para você e toda a sua família. Todos
                    os nossos alunos podem usufruir do espaço de treinamento funcional, aulas de zumba e musculação.
                </span>
                <div class="span_c2">
                    <div class="back_h">
                        <p class="h_csss">+5 anos</p>
                    </div>
                    <div class="h_css">
                        <p class="h_css">de sucesso no trabalho e experiencia em treinamento</p>
                    </div>
                </div>
            </div>

            <section class="gym_back_coach">
                <div class="perfil_coach"><a class="perf_img1"></a></div>
                <div class="perfil_coach"><a class="perf_img2"></a></div>
                <div class="perfil_coach"><a class="perf_img3"></a></div>
                <div class="perfil_coach"><a class="perf_img4"></a></div>
            </section>


        </div>

    </section>

    <section class="gym_calendario" id="calendario">
        <div style="position:relative;top:5vh;padding-top:20px;padding-bottom:20px;">
            <h1 style="font-weight:800;">HORÁRIOS DE TRABALHO E AULAS</h1>
        </div>
        <section class="gym_calendario_posi">
            <table>
                <thead>
                    <tr>
                        <th scope="col" style="font-size:18px!important;">Horarios</th>
                        <th scope="col" style="font-size:18px!important;">Segunda</th>
                        <th scope="col" style="font-size:18px!important;">Terça</th>
                        <th scope="col" style="font-size:18px!important;">Quarta</th>
                        <th scope="col" style="font-size:18px!important;">Quinta</th>
                        <th scope="col" style="font-size:18px!important;">Sexta</th>
                        <th scope="col" style="font-size:18px!important;">Sábado</th>
                        <th scope="col" style="font-size:18px!important;">Domingo</th>
                        <th scope="col" style="font-size:18px!important;">Feriádos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="tr_zumba_tf">
                        <td data-label="Horarios de ">&ensp;Abertura</td>
                        <td data-label="Segunda">5:30</td>
                        <td data-label="Terça">5:30</td>
                        <td data-label="Quarta">5:30</td>
                        <td data-label="Quinta">5:30</td>
                        <td data-label="Sexta">5:30</td>
                        <td data-label="Sábado">8:00</td>
                        <td data-label="Domingo">9:00</td>
                        <td data-label="Feriádos">9:00</td>
                    </tr>
                    <tr class="tr_zumba_tf">
                        <td data-label="Horarios&ensp;">&ensp;Zumba & Treinamento<br>funcional</td>
                        <td data-label="Segunda">Zumba 6:30<br> &<br>
                            T.F 8:00</td>
                        <td data-label="Terça">Zumba 6:30<br> &<br>
                            T.F 8:00</td>
                        <td data-label="Quarta">Zumba 6:30<br> &<br>
                            T.F 8:00</td>
                        <td data-label="Quinta">Zumba 6:30<br> &<br>
                            T.F 8:00</td>
                        <td data-label="Sexta">Zumba 6:30<br> &<br>
                            T.F 8:00</td>
                        <td data-label="Sábado">Zumba <br> &<br>
                            T.F 9:00</td>
                    </tr>

                    <tr class="one">
                        <td data-label="Horarios" style="font-weight:700!important;">5:30</td>
                        <td data-label="Segunda">Abertura</td>
                        <td data-label="Terça">Abertura</td>
                        <td data-label="Quarta">Abertura</td>
                        <td data-label="Quinta">Abertura</td>
                        <td data-label="Sexta">Abertura</td>
                        <td data-label="Sábado">Fechado</td>
                        <td data-label="Domingo">Fechado</td>
                        <td data-label="Feriádos">Fechado</td>
                    </tr>
                    <tr class="one">
                        <td style="font-weight:700!important;">6:30</td>
                        <td>Zumba</td>
                        <td>Zumba</td>
                        <td>Zumba</td>
                        <td>Zumba</td>
                        <td>Zumba</td>
                        <td>Fechado</td>
                        <td>Fechado</td>
                        <td>Fechado</td>
                    </tr>
                    <tr class="one">
                        <td style="font-weight:700!important;">8:00</td>
                        <td>Treinamento funcional</td>
                        <td>Treinamento funcional</td>
                        <td>Treinamento funcional</td>
                        <td>Treinamento funcional</td>
                        <td>Treinamento funcional</td>
                        <td>Abertura</td>
                        <td>Fechado</td>
                        <td>Fechado</td>
                    </tr>
                    <tr class="one">
                        <td style="font-weight:700!important;">9:00</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Zumba &
                            Treinamento funcional</td>
                        <td>Abertura</td>
                        <td>Abertura</td>
                    </tr>
                    <tr class="one">
                        <td style="font-weight:700!important;">Fechamento</td>
                        <td>24:00</td>
                        <td>24:00</td>
                        <td>24:00</td>
                        <td>24:00</td>
                        <td>24:00</td>
                        <td>17:00</td>
                        <td>16:00</td>
                        <td>16:00</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </section>

    <section class="gym_cantato">
        <section class="gym_cont_back">
            <section class="gym_cont_posi">
                <div class="gym_cont_row1">
                    <h5 class="h5local"><b>Localização</b></h5>
                    <a
                        href="https://www.google.com.br/maps/place/R.+Tuiuti,+1683+-+Aventureiro,+Joinville+-+SC,+89226-000/@-26.2566859,
                        -48.8231582,17z/data=!3m1!4b1!4m6!3m5!1s0x94deae3e13de697f:0xcf3986cbfef8677b!8m2!3d-26.2566907!4d-48.8205833!16s%2Fg%2F11gsmb_ln5?entry=ttu">
                        <img src=" img\mapa.png" style="max-width:400px; max-height:155px">
                    </a>
                    <span style="margin-top:30px; color: yellow;"><b style="color:white;">Endereço :</b> R.
                        Tuiuti,
                        1683 - Aventureiro, <br>Joinville - SC,
                        89226-001</span>
                </div>
                <div class="gym_cont_row2">
                    <ul class="list_cont">
                        <h5 style="font-size:25px;"><b>Horarios de abretura da academia</b></h5><br><br>
                        <li class="d-flex">
                            <p style="font-size:18px;">Segundo-Sexta :<span> 5:30 AM - 12:00 PM</span></p>

                        </li>
                        <li class="d-flex">
                            <p style="font-size:18px;">Sabado :<span> 8:00 AM - 17:00 PM</span></p>

                        </li>
                        <li class="d-flex">
                            <p style="font-size:18px;">Domingo :<span> 9:00 AM - 16:00 PM</span></p>

                        </li>
                        <li class="d-flex">
                            <p style="font-size:18px;">Feriados :<span> 9:00 AM - 16:00 PM</span></p>

                        </li>
                    </ul>
                </div>
                <div class="gym_cont_row3">
                    <img src="img\logo.jpg" style="max-width: 120px; max-height: 100px; margin-bottom:20px;">
                    <p style="word-break:normal;max-width: 400px; max-height: 500px; font-size:18px;">As últimas
                        três ou quatro
                        repetições é o que faz o músculo crescer. Essa área de dor divide o
                        campeão de outra pessoa que não o é. Isso é o que falta à maioria das pessoas, ter
                        coragem
                        de continuar e apenas dizer que vão passar pela dor, não importa o que aconteça.</p>
                    <span><b>Nossas redes sociais</b></span>
                    <div style="display:flex; flex-direction:row; ">
                        <a href="https://instagram.com/lossfit_?igshid=MzRlODBiNWFlZA==">
                            <div class="insta-full"></div>
                        </a>
                        <a href="https://instagram.com/lossfit_?igshid=MzRlODBiNWFlZA==">
                            <div class="face-full"></div>
                        </a>
                    </div>
                </div>
            </section>
        </section>
    </section>

    <section class="gym_footer">
        <section class="rodape" style="background-color: #0e0e0e!important;">
            <footer>©2023 Sesi/Senai, todos os direitos reservados</footer>
        </section>
    </section>

    <!-- =================================================-->
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"></script>
    <script>
        var btn = $("#back-to-top");
        btn.click(function () {
            $('html, body').animate({ scrollTop: 0 }, 'fast');
        });
    </script>
    <script type="text/javascript" src="js/scroll.js"></script>
</body>

</html>