<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9" ><![endif]-->
<head>

    <meta name="language" content="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="target-densitydpi=device-dpi; width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ColeAqui sistemas para fidelização">
    <meta name="description" content="ColeAqui, sistema para fidelidade de clientes.">
    <meta name="keywords" content="Fidelidade de clientes">
    <title>Painel Adm</title>
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
                <h2>Perfil do Cliente</h2>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2>Informações Pessoais<small>Gerencie as informações pessoais, lançamento de pontuação e histórico de prêmios resgatados.</small></h2>
                    <!-- -->
                    <form method="post" action="#"  enctype="multipart/form-data">

                        <div class="card-body card-padding">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                                        <div class="fg-line">
                                            <input type="text" id='nameCli' name="nameCli" class="form-control" value="" placeholder="Nome">
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-account-box-phone"></i></span>
                                        <div class="fg-line">
                                            <input type="text" id="phoCli" name="phoCli" class="form-control input-mask" data-mask="(00) 00000-0000" placeholder="Tel: (00) 00000-0000">
                                        </div>
                                    </div>

                                    <br/>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                                        <div class="fg-line">
                                            <input type="text" id="emailCli" name="emailCli" class="form-control" value="" placeholder="Email">
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-accounts-list"></i></span>
                                        <div class="fg-line">
                                            <input type="text" id="cpfCli" class="form-control input-mask" data-mask="000.000.000-00" placeholder="CPF: 000.000.000-00" name="cpfCli" class="form-control" >
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="card-body card-padding">
                                        <p class="c-black f-500 m-b-20">Selecione o Sexo</p>

                                        <div class="radio m-b-15">
                                            <label>
                                                <input id='opM' type="radio" name="sexCli" value="M">
                                                <i class="input-helper"></i>
                                                Masculino
                                            </label>
                                        </div>

                                        <div class="radio m-b-15">
                                            <label>
                                                <input id='opF' type="radio" name="sexCli" value="F">
                                                <i class="input-helper"></i>
                                                Feminino
                                            </label>
                                        </div>
                                        <input type="hidden" id='up' name="ref" value="">
                                        <br/>
                                        <br/><br/>
                                        <button type="button" id='sa-params' class="btn btn-primary btn-lg waves-effect">Alterar Informações</button>

                    </form>
                    <!-- -->

                </div>


            </div>


    </section>

    <section id="content"><!-- Inicia bloco de prêmios resgatados-->
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>Prêmios Resgatados<small>Confira os prêmios resgatados por este cliente.</small></h2>

                    <div id="rescued-history"></div>

                </div>
            </div>
    </section><!-- Encerra bloco de prêmios resgatados-->

    <section id="content"><!-- Inicia bloco de pontos disponíveis -->
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>Prêmios Disponíveis<small>Prêmios disponíveis para este usuário.</small></h2>
                    <!-- ///////////// -->
                    <div class="table-responsive">
                        <div id="awards-rescue"></div>


                    </div>

                    <!-- ////////////  -->

    </section><!-- Encerra bloco de premios disponiveis-->

    <section id="content"><!-- Inicia bloco de pontuação lançada-->
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>Histórico de Pontuação<small>Veja os lançamentos realizados para este cliente.</small></h2>
                    <div id="fu"></div>
                    <!-- ///////////// -->
                    <h3>Total de Pontos:<br/> <small>lançados = <span id='lancer'></span></small><br/><small>Resgatados = <span id='rescue'></span></small><small><br/>Disponíveis para resgate (Contabilizado apenas os confirmados pelo cliente) = <span id='avaliable'></span></small><h3>
                    </div>

                    <!-- ////////////  -->

    </section><!-- Encerra bloco de pontuação lançada-->

    <section id="content"><!-- Inicia bloco de pontuação lançada-->
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>Lançamento de Pontos <br/> Valor Atual do Ponto - R$ <span class="point-value"></span><small>Faça um lançamento!</small></h2>
                    <form method="post" action="#"  enctype="multipart/form-data">

                        <div class="card-body card-padding">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-assignment"></i></span>
                                        <div class="fg-line">
                                            <textarea type="text" id='description-score' name="description-score" class="form-control" value="" placeholder="Descrição da compra, Ex: Compra de calça jeans"></textarea>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="zmdi zmdi-balance-wallet"></i></span>
                                        <div class="fg-line">
                                            <input type="number" id="value-score" name="value-score" class="form-control" placeholder="Valor da Compra, Ex: R$ 15.00">

                                        </div>
                                        <br/>

                                    </div>
                                    <input type="hidden" id='up' name="ref" value="">
                                    <input type="hidden" id="point-vlue-periodo" name="point-value" value="">
                                    <br/>
                                    <br/>

                                    <button type="button" id='calc-points' class="btn bgm-teal">Verificar conversão</button>
                                    <br/>
                                    <span id='points-result'></span>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>
                                    <br/>

                                        <button type="button" id='pontuation' class="btn btn-primary btn-lg waves-effect">Lançar Pontuação</button>

                    </form>
                </div>
            </div>
    </section><!-- Encerra bloco de pontuação lançada-->

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
<script src="view/assets/js/CalcPoints.js"></script>
<script src="view/assets/js/poinstValue.js"></script>
<script src="view/assets/js/dataCostumer.js"></script>
<script src="view/assets/js/dataAllDash.js"></script>
<script src="view/assets/assets-dash/js/functions.js"></script>
<script src="view/assets/assets-dash/js/demo.js"></script>


<script src="view/assets/assets-dash/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>

<script>

function upData(){

    $.post("index.php", {
            controller: 'Dashboard',
            action: 'UpClient',
            nameCli:$('#nameCli').val(),
            phoCli:$('#phoCli').val(),
            emailCli:$('#emailCli').val(),
            cpfCli:$('#cpfCli').val(),
            sexCli:$("input[type='radio']:checked").val(),
            ref:$('#up').val()


        },

        function (result) {
            location.reload();
        });

}

function insertScore(){

    $.post("index.php", {
            controller: 'Dashboard',
            action: 'insertScore',
            score:$('#value-score').val(),
            description:$('#description-score').val(),
            ref:$('#up').val(),
            valuePoint: $('#point-vlue-periodo').val()


        },

        function (result) {
            location.reload();

        });

}


    //Atualização dos dados do usuário.
    $('#sa-params').click(function(){
        swal({
            title: "Atualizar dados de "+$('#nameCli').val()+" ?",
            text: "Alterações erradas podem ocasionar transtornos!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Sim, desejo alterar!",
            cancelButtonText: "Não, obrigado!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm){
            if (isConfirm) {
                swal("Confirmado", "Sua alteração será processada", "success");
                upData();

            } else {
                swal("Candelado", "Alteração não será processada", "error");
                return false;
            }
        });
    });

//Lançamento de pontuação
$('#pontuation').click(function(){
    swal({
        title: "Confirmação de lançamento para "+$('#nameCli').val(),
        text: "Lançar "+$('#description-score').val()+" no valor de: R$"+$('#value-score').val(),
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "LANÇAR",
        cancelButtonText: "CANCELAR",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function(isConfirm){
        if (isConfirm) {
            swal("Lançamento Confirmado", "Seu lançamento está sendo processado.", "success");
            insertScore();
        } else {
            swal("Candelado", "Este lançamento não será processado.", "error");
            $('#description-score').val('');
            $('#value-score').val('');
            return false;
        }
    });
});
    </script>

</body>
</html>