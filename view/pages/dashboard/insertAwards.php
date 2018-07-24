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
    <title>Pacientes - SysConsulte</title>

    <!-- Vendor CSS -->
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

                            <a class="lv-footer" href="?controller=Dashboard&action=viewAlerts">Ver todas</a>
                        </div>

                    </div>
                </li>



            </ul>
        </li>
    </ul>


</header>

<section id="main">
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
            <li><a href="?controller=Dashboard&action=dashStart"><i class="zmdi zmdi-home"></i> Início</a></li>
            <li class="sub-menu">
                <a href=""><i class="zmdi zmdi-accounts"></i>Gerenciar Clientes</a>

                <ul>
                    <li><a href="?controller=Dashboard&action=viewAllClient"><i class="zmdi zmdi-assignment"></i> Listar Clientes</a></li>
                    <li><a href="?controller=Dashboard&action=viewNewClient"><i class="zmdi zmdi-account-add"></i> Novo Cliente</a></li>
                </ul>
            </li>
            <li class="sub-menu active toggled">
                <a href=""><i class="zmdi zmdi-label-heart"></i>Meus Prêmios</a>

                <ul>
                    <li><a href="?controller=Dashboard&action=viewAwardsList"><i class="zmdi zmdi-check-all"></i> Listar prêmios</a></li>
                    <li><a  class="active" href="?controller=Dashboard&action=viewInserAwards"><i class="zmdi zmdi-shopping-basket"></i> Adicionar Prêmio</a></li>
                </ul>
            </li>
            <li><a href="?controller=Dashboard&action=viewPointManager"><i class="zmdi zmdi-ticket-star"></i> Gerenciar Pontuação</a></li>
            <li><a href="?controller=Dashboard&action=viewAlerts"><i  class="tm-icon zmdi zmdi-notifications"></i><div id='count-notification'></div></a></li>
        </ul>
    </aside>

    <aside id="chat" class="sidebar c-overflow">

        <div class="chat-search">
            <div class="fg-line">
                <input type="text" class="form-control" placeholder="Search People">
            </div>
        </div>

        <div class="listview">
            <a class="lv-item" href="">
                <div class="media">
                    <div class="pull-left p-relative">
                        <img class="lv-img-sm" src="view/assets/assets-dash/img/profile-pics/2.jpg" alt="">
                        <i class="chat-status-busy"></i>
                    </div>
                    <div class="media-body">
                        <div class="lv-title">Jonathan Morris</div>
                        <small class="lv-small">Available</small>
                    </div>
                </div>
            </a>

            <a class="lv-item" href="">
                <div class="media">
                    <div class="pull-left">
                        <img class="lv-img-sm" src="view/assets/assets-dash/img/profile-pics/1.jpg" alt="">
                    </div>
                    <div class="media-body">
                        <div class="lv-title">David Belle</div>
                        <small class="lv-small">Last seen 3 hours ago</small>
                    </div>
                </div>
            </a>

            <a class="lv-item" href="">
                <div class="media">
                    <div class="pull-left p-relative">
                        <img class="lv-img-sm" src="view/assets/assets-dash/img/profile-pics/3.jpg" alt="">
                        <i class="chat-status-online"></i>
                    </div>
                    <div class="media-body">
                        <div class="lv-title">Fredric Mitchell Jr.</div>
                        <small class="lv-small">Availble</small>
                    </div>
                </div>
            </a>

            <a class="lv-item" href="">
                <div class="media">
                    <div class="pull-left p-relative">
                        <img class="lv-img-sm" src="view/assets/assets-dash/img/profile-pics/4.jpg" alt="">
                        <i class="chat-status-online"></i>
                    </div>
                    <div class="media-body">
                        <div class="lv-title">Glenn Jecobs</div>
                        <small class="lv-small">Availble</small>
                    </div>
                </div>
            </a>

            <a class="lv-item" href="">
                <div class="media">
                    <div class="pull-left">
                        <img class="lv-img-sm" src="view/assets/assets-dash/img/profile-pics/5.jpg" alt="">
                    </div>
                    <div class="media-body">
                        <div class="lv-title">Bill Phillips</div>
                        <small class="lv-small">Last seen 3 days ago</small>
                    </div>
                </div>
            </a>

            <a class="lv-item" href="">
                <div class="media">
                    <div class="pull-left">
                        <img class="lv-img-sm" src="view/assets/assets-dash/img/profile-pics/6.jpg" alt="">
                    </div>
                    <div class="media-body">
                        <div class="lv-title">Wendy Mitchell</div>
                        <small class="lv-small">Last seen 2 minutes ago</small>
                    </div>
                </div>
            </a>
            <a class="lv-item" href="">
                <div class="media">
                    <div class="pull-left p-relative">
                        <img class="lv-img-sm" src="view/assets/assets-dash/img/profile-pics/7.jpg" alt="">
                        <i class="chat-status-busy"></i>
                    </div>
                    <div class="media-body">
                        <div class="lv-title">Teena Bell Ann</div>
                        <small class="lv-small">Busy</small>
                    </div>
                </div>
            </a>
        </div>
    </aside>


    <section id="content">
        <div class="container">
            <div class="block-header">
                <h2>Adicionar Novo Prêmio</h2>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2>Novo Prêmio<small>Adicione aqui seu novo prêmio.</small></h2>
                    <!-- -->

                    <form method="post" action="?controller=Dashboard&action=insertAwards"  enctype="multipart/form-data">

                        <div class="card-body card-padding">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-tag"></i></span>
                                        <div class="fg-line">
                                            <input type="text" name="title" class="form-control" value="" placeholder="Titulo descritivo do prêmio">
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-star"></i></span>
                                        <div class="fg-line">
                                            <input type="text" name="points" class="form-control" placeholder="Pontuação necessária para resgatar: Ex: 30">
                                        </div>
                                    </div>
                                    <br/>
                                    <br/><br/>
                                    <br/>
                                        <button type="submit" class="btn btn-primary btn-lg waves-effect" style="margin-left: 70%">Cadastrar</button>

                    </form>
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
<script src="view/assets/assets-dash/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="view/assets/assets-dash/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="view/assets/assets-dash/vendors/bower_components/Waves/dist/waves.min.js"></script>
<script src="view/assets/assets-dash/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
<script src="view/assets/assets-dash/vendors/input-mask/input-mask.min.js"></script>

<!-- Placeholder for IE9 -->
<!--[if IE 9 ]>
<script src="view/assets/assets-dash/vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
<![endif]-->
<script src="view/assets/js/request.js"></script>
<script src="view/assets/js/dataAllDash.js"></script>
<script src="view/assets/assets-dash/js/functions.js"></script>
<script src="view/assets/assets-dash/js/demo.js"></script>


</body>
</html>