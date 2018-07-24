<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Material Admin</title>

    <!-- Vendor CSS -->
    <link href="view/assets/assets-dash/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
    <link href="view/assets/assets-dash/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">

    <!-- CSS -->
    <link href="view/assets/assets-dash/css/app.min.1.css" rel="stylesheet">
    <link href="view/assets/assets-dash/css/app.min.2.css" rel="stylesheet">
</head>

<body class="login-content">
<!-- Login -->
<div class="lc-block toggled" id="l-login">
    <form>
	<div id="returnLogin"></div>
        <div class="input-group m-b-20">
            <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
            <div class="fg-line">
                <input type="text" id="tM" class="form-control" placeholder="Usuário">
            </div>
        </div>

        <div class="input-group m-b-20">
            <span class="input-group-addon"><i class="zmdi zmdi-male"></i></span>
            <div class="fg-line">
                <input type="password" id="tSenha" class="form-control" placeholder="Senha">
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="checkbox">
            <label>
                <input type="checkbox" id="tMan" value="logado">
                <i class="input-helper"></i>
                Manter conectado
            </label>
        </div>

        <a class="btn btn-login btn-danger btn-float"><i class="zmdi zmdi-arrow-forward"></i></a>

        <ul class="login-navigation">
            <!-- li data-block="#l-register" class="bgm-red">Register</li -->
            <li data-block="#l-forget-password" class="bgm-orange">Esqueceu sua senha?</li>
        </ul>

    </form>

</div>

<!-- Register -->
<div class="lc-block" id="l-register">
    <div class="input-group m-b-20">
        <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
        <div class="fg-line">
            <input type="text" class="form-control" placeholder="Usuário">
        </div>
    </div>

    <div class="input-group m-b-20">
        <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
        <div class="fg-line">
            <input type="text" class="form-control" placeholder="Email">
        </div>
    </div>

    <div class="input-group m-b-20">
        <span class="input-group-addon"><i class="zmdi zmdi-male"></i></span>
        <div class="fg-line">
            <input type="password" class="form-control" placeholder="Senha">
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="checkbox">
        <label>
            <input type="checkbox" value="">
            <i class="input-helper"></i>
            Accept the license agreement
        </label>
    </div>

    <a href="" class="btn btn-login btn-danger btn-float"><i class="zmdi zmdi-arrow-forward"></i></a>

    <ul class="login-navigation">
        <li data-block="#l-login" class="bgm-green">Login</li>
        <li data-block="#l-forget-password" class="bgm-orange">Forgot Password?</li>
    </ul>
</div>

<!-- Forgot Password -->
<div class="lc-block" id="l-forget-password">
    <p class="text-left">Informe seu email de registro. Dentro de poucos minutos você receberá um email com a redefinição de sua senha. Caso não possua mais o email de login, entre em contato com o suporte pelo email suporte@simplesconect.com.br</p>

    <div class="input-group m-b-20">
        <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
        <div class="fg-line">
            <input type="text" class="form-control" placeholder="Email">
        </div>
    </div>

    <a href="" class="btn btn-login btn-danger btn-float"><i class="zmdi zmdi-arrow-forward"></i></a>

    <ul class="login-navigation">
        <li data-block="#l-login" class="bgm-green">Login</li>
        <!-- li data-block="#l-register" class="bgm-red">Register</li -->
    </ul>
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

<script src="view/assets/assets-dash/vendors/bower_components/Waves/dist/waves.min.js"></script>

<!-- Placeholder for IE9 -->
<!--[if IE 9 ]>
<script src="view/assets/assets-dash/vendorsbower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
<![endif]-->
<script src="view/assets/js/loginClient.js"></script>
<script src="view/assets/assets-dash/js/functions.js"></script>

</body>
</html>
