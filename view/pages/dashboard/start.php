<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
    <meta name="language" content="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="target-densitydpi=device-dpi; width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ColeAqui sistemas para fidelização">
    <meta name="description" content="ColeAqui, sistema para fidelidade de clientes.">
    <meta name="keywords" content="Fidelidade de clientes">
    <title>Painel Administrativo</title>

    <!-- Vendor CSS -->
    <link href="view/assets/assets-dash/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="view/assets/assets-dash/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
    <link href="view/assets/assets-dash/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
    <link href="view/assets/assets-dash/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
    <link href="view/assets/assets-dash/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">

    <!-- CSS -->
    <link href="view/assets/assets-dash/css/app.min.1.css" rel="stylesheet">
    <link href="view/assets/assets-dash/css/app.min.2.css" rel="stylesheet">
    <link rel="icon" href="view/assets/assets-trade-interface/img/img.jpg">

</head>
<body class="toggled sw-toggled">
<header id="header" class="clearfix" data-current-skin="blue">
    <ul class="header-inner">
        <li id="menu-trigger" data-trigger="#sidebar">
            <div class="line-wrap">
                <div class="line top"></div>
                <div class="line center"></div>
                <div class="line bottom"></div>
            </div>
        </li>

        <li class="logo hidden-xs">
            <a href="?controller=Dashboard&action=dashStart"> <img src="view/assets/assets-dash/img/logo@branco.png" alt="logo ColeAqui"></a>
        </li>

        <li class="pull-right">
            <ul class="top-menu">



                <li class="dropdown">

                    <div class="dropdown-menu dropdown-menu-lg pull-right">
                        <div class="listview">
                            <div class="lv-header">
                                Mensagens
                            </div>
                            <div class="lv-body">
                            </div>
                            <a class="lv-footer" href="?controller=Dashboard&action=viewAlerts">Ver todas</a>
                        </div>
                    </div>
                </li>
                <li class="dropdown">
                    <a id='ss' data-toggle="dropdown" href="">

                    </a>
                    <div class="dropdown-menu dropdown-menu-lg pull-right">
                        <div class="listview" id="notifications">
                            <div class="lv-header">
                                Notificações

                                <ul class="actions">
                                    <li class="dropdown">
                                        <a href="" data-clear="notification">
                                            <i class="zmdi zmdi-check-all"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="lv-body">
                                <div id="alerts-notification"></div>
                            </div>

                            <a class="lv-footer" href="?controller=Dashboard&action=viewAlerts">Ver Todas</a>
                        </div>

                    </div>
                </li>
            </ul>
        </li>
    </ul>


</header>
<section id="main" data-layout="layout-1">
    <aside id="sidebar" class="sidebar c-overflow">
        <div class="profile-menu">
            <a href="">
                <div class="profile-pic">
                    <img id='tradeProfile' src="#" alt="Imagem da empresa">
                </div>

                <div id='nameTrade' class="profile-info">
                    <i class="zmdi zmdi-caret-down"></i>
                </div>
            </a>

            <ul class="main-menu">

                <li>
                    <a href="?controller=Dashboard&action=viewTradePage"><i class="zmdi zmdi-settings"></i> Minha Conta</a>
                </li>
                <li>
                    <a href="?controller=Dashboard&action=dashExit"><i class="zmdi zmdi-time-restore"></i> Sair</a>
                </li>
            </ul>
        </div>

        <ul class="main-menu">
            <li class="active"><a href="?controller=Dashboard&action=dashStart"><i class="zmdi zmdi-home"></i> Início</a></li>
            <li class="sub-menu">
                <a href=""><i class="zmdi zmdi-accounts"></i>Gerenciar Clientes</a>

                <ul>
                    <li><a href="?controller=Dashboard&action=viewAllClient"><i class="zmdi zmdi-assignment"></i> Listar Clientes</a></li>
                    <li><a href="?controller=Dashboard&action=viewNewClient"><i class="zmdi zmdi-account-add"></i> Novo Cliente</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href=""><i class="zmdi zmdi-label-heart"></i>Meus Prêmios</a>

                <ul>
                    <li><a href="?controller=Dashboard&action=viewAwardsList"><i class="zmdi zmdi-check-all"></i> Listar prêmios</a></li>
                    <li><a href="?controller=Dashboard&action=viewInserAwards"><i class="zmdi zmdi-shopping-basket"></i> Adicionar Prêmio</a></li>
                </ul>
            </li>
            <li><a href="?controller=Dashboard&action=viewPointManager"><i class="zmdi zmdi-ticket-star"></i> Gerenciar Pontuação</a></li>
            <li ><a  href="?controller=Dashboard&action=viewAlerts"><i class="tm-icon zmdi zmdi-notifications"></i><div id='count-notification'></div></a></li>
        </ul>
    </aside>

    <aside id="chat" class="sidebar c-overflow">

        <div class="chat-search">
            <div class="fg-line">
                <input type="text" class="form-control" placeholder="Search People">
            </div>
        </div>

        <div class="listview">

        </div>
    </aside>


    <section id="content">
        <div class="container">
            <div class="block-header">
                <h2>Painel Administrativo</h2>

            </div>




            <div class="dash-widgets">
                <div class="row">

                    <!-- bloco disponível -->
                    <div class="col-md-6 col-sm-6"><!-- total e porcentagem de clientes -->
                        <div id="pie-charts" class="dash-widget-item">
                            <div class="bgm-pink">
                                <div class="dash-widget-header">
                                    <div class="dash-widget-title">Relatório - Quantidade de clientes</div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="text-center p-20 m-t-25" >
                                   <h2 style="color:white;">Total de clientes</h2><br/>
                                    <h2 id="total-client" style="color:white;">0</h2>
                                </div>
                            </div>

                            <div class="p-t-20 p-b-20 text-center">
                                <div id="pm" class="easy-pie sub-pie-1" data-percent="0">
                                    <div id="percent-male" class="percent">0</div>
                                    <div class="pie-title">Sexo Masculino</div>
                                </div>
                                <div id="pf" class="easy-pie sub-pie-2" data-percent="0">
                                    <div id="percent-fem" class="percent">0</div>
                                    <div class="pie-title">Sexo Feminino</div>
                                </div>
                            </div>

                        </div>
                    </div><!-- Encerra total e porcentagem de clientes -->

                    <!-- Quantidade de prêmios resgatados -->
                    <div class="col-sm-6 col-md-3">
                        <div class="mini-charts-item bgm-cyan">
                            <div class="clearfix">
                                <div class="chart stats-bar"></div>
                                <div class="count">
                                    <small class="text-center">Total de Resgates</small>
                                    <h2 id="total-rescued" class="text-center">7</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Encerra quantidade de prêmios resgatados -->

                    <!-- Dinheiro recebido -->
                    <div class="col-sm-6 col-md-3">
                        <div class="mini-charts-item bgm-orange">
                            <div class="clearfix">
                                <div class="chart stats-line"></div>
                                <div class="count">
                                    <small class="text-center">Lançamento total em dinheiro</small>
                                    <h2 id="max-value" class="text-center">R$ 0,00</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dinheiro recebido -->

                    <!-- total em pontos -->
                    <div class="col-sm-6 col-md-3">
                        <div class="mini-charts-item bgm-bluegray">
                            <div class="clearfix">
                                <div class="chart stats-line-2"></div>
                                <div class="count">
                                    <small class="text-center">Total de pontos convertidos</small>
                                    <h2 id="max-points" class="text-center">0 pontos</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- encerra total em pontos -->

                    <!-- total em pontos -->
                    <div class="col-sm-6 col-md-3">
                        <div class="mini-charts-item bgm-bluegray">
                            <div class="clearfix">
                                <div class="chart stats-line-2"></div>
                                <div class="count">
                                    <small class="text-center">Valor atual do ponto</small>
                                    <h2 id="value-point" class="text-center">R$ 0,00</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- encerra total em pontos -->

                    <div class="col-sm-3" >

                        <div class="epc-item bgm-orange">
                            <div class="pie-title" style="color:white;">Consumo total masculino</div>
                            <div  id="psm" class="easy-pie main-pie" data-percent="">
                                <div  id="spent-spent-male" class="percent">0</div>
                                <div id="spent-male" class="pie-title">R$ 0,00</div>
                            </div>
                        </div>
                    </div><!-- -->

                    <div class="col-sm-3">
                        <div class="epc-item bgm-green">
                            <div class="pie-title" style="color:white;">Consumo total feminino</div>
                            <div id="psf" class="easy-pie main-pie" data-percent="">
                                <div id="percent-spent-fem" class="percent">0</div>
                                <div id="spent-fem" class="pie-title">R$ 0,00</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">



                </div>
            </div>
        </div>
    </section>
</section>

<footer id="footer">
    Copyright &copy; 2016 ColeAqui

</footer>

<!-- Page Loader -->
<div class="page-loader">
    <div class="preloader pls-blue">
        <svg class="pl-circular" viewBox="25 25 50 50">
            <circle class="plc-path" cx="50" cy="50" r="20" />
        </svg>

        <p>Carregando...</p>
    </div>
</div>

<!-- Older IE warning message -->
<!--[if lt IE 9]>
<div class="ie-warning">
    <h1 class="c-white">Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="view/assets/assets-dash/img/browsers/chrome.png" alt="">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="view/assets/assets-dash/img/browsers/firefox.png" alt="">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="view/assets/assets-dash/img/browsers/opera.png" alt="">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="view/assets/assets-dash/img/browsers/safari.png" alt="">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="view/assets/assets-dash/img/browsers/ie.png" alt="">
                    <div>IE (New)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->

<!-- Javascript Libraries -->
<script src="view/assets/assets-dash/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script src="view/assets/js/request.js"></script>
<script src="view/assets/js/dataAllDash.js"></script>
<script src="view/assets/js/infoDash.js"></script>
<script src="view/assets/assets-dash/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="view/assets/assets-dash/vendors/bower_components/flot/jquery.flot.js"></script>
<script src="view/assets/assets-dash/vendors/bower_components/flot/jquery.flot.resize.js"></script>
<script src="view/assets/assets-dash/vendors/bower_components/flot.curvedlines/curvedLines.js"></script>
<script src="view/assets/assets-dash/vendors/sparklines/jquery.sparkline.min.js"></script>
<script src="view/assets/assets-dash/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>

<script src="view/assets/assets-dash/vendors/bower_components/moment/min/moment.min.js"></script>
<script src="view/assets/assets-dash/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js "></script>
<script src="view/assets/assets-dash/vendors/bower_components/fullcalendar/dist/pt-br.js "></script>
<script src="view/assets/assets-dash/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js">
</script>
<script src="view/assets/assets-dash/vendors/bower_components/Waves/dist/waves.min.js"></script>
<script src="view/assets/assets-dash/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
<script src="view/assets/assets-dash/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

<!-- Placeholder for IE9 -->
<!--[if IE 9 ]>
<script src="view/assets/assets-dash/vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
<![endif]-->

<script src="view/assets/assets-dash/js/flot-charts/curved-line-chart.js"></script>
<script src="view/assets/assets-dash/js/flot-charts/line-chart.js"></script>
<script src="view/assets/assets-dash/js/charts.js"></script>
<script src="view/assets/assets-dash/js/charts.js"></script>
<script src="view/assets/assets-dash/js/functions.js"></script>
<script src="view/assets/assets-dash/js/demo.js"></script>


</body>
</html>