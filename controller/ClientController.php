<?php

#realiza controle das funcionalidades do tablet
include_once 'config/AutoLoadConfig.php';

class ClientController extends ControllerConfig
{
    private $route;

    public function viewClientLogin()
    {
        $this->route = RouteConfig::rotas();
        $aut = AutenticadorConfig::instanciar();
        $this->sessao = SessaoConfig::instanciar();

        if ($aut->esta_logado() || $aut->login_cookie())
         {
            header('location: ?controller=Client&action=clientView');
        } else 
        {
        }

        $this->view->set('URL_INI', $this->route['URL_INI']);
        $this->view->render($this->route['CLIENT_LOGIN']);
    }


    public function clientView()
    {
        $this->route = RouteConfig::rotas();
        $aut = AutenticadorConfig::instanciar();
        $this->sessao = SessaoConfig::instanciar();

        if ($aut->esta_logado() || $aut->login_cookie()) 
        {
            $this->view->set('URL_INI', $this->route['URL_INI']);
            $this->view->render($this->route['CLIENT_TRADE_INTERFACE']);
        } else 
        {
            header("location: ?controller=Client&action=viewClientLogin");
        }
    }

    public function loginClient()
    {
        $aut = AutenticadorConfig::instanciar();
        $this->sessao = SessaoConfig::instanciar();

        if ($aut->login(RequestConfig::getRequest('email'),md5(RequestConfig::getRequest('senha')))) 
        {
            #verifica se o usuário deseja se manter logado
            if(RequestConfig::getPost('manterConectado') == "logado")
            {
                #caso passar pelo método login, é porque os dados batem com o que está no servidor. Nesse caso será armazenado a hash criptografada no cookie.
                $aut->setPermanecerLogado(RequestConfig::getPost('email'), md5(RequestConfig::getPost('senha')));//Resolver problema de não poder salvar senha com criptografia no cookie.
            }
		
 	            $aut = AutenticadorConfig::instanciar();
                echo $aut->userRef();
        } else 
        {
            echo "0";
        }
    }

    public function returnCli()
    {
        $objCli = new ClientDAO();
        $aut = AutenticadorConfig::instanciar();
        $objUser = new TradeUsersDAO();

        if(isset($_GET['ref']) && !empty($_GET['ref']))
        {
        $objCli->ClientAndTrade($_GET['cpf'],$_GET['ref']);
        } else 
        {
        $data = $objUser->tradeFromUser($aut->userRef(),'no');
        $objCli->ClientAndTrade($_GET['cpf'],$data[0]['trade_id']);
        }
    }
}
