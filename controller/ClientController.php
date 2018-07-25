<?php

#realiza controle das funcionalidades do tablet
include_once 'config/AutoLoadConfig.php';

class ClientController extends ControllerConfig
{
    private $route,
            $aut,
            $objCli,
            $objUser;

    public function __construct()
    {
        parent::__construct();
        $this->route = RouteConfig::rotas();
        $this->aut = AutenticadorConfig::instanciar();
        $this->objCli = new ClientDAO();
        $this->objUser = new TradeUsersDAO();
    }

    public function viewClientLogin()
    {
        if ($this->aut->esta_logado() || $this->aut->login_cookie())
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
        if ($this->aut->esta_logado() || $this->aut->login_cookie()) 
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
        if ($this->aut->login(RequestConfig::getRequest('email'),md5(RequestConfig::getRequest('senha')))) 
        {
            #verifica se o usuário deseja se manter logado
            if(RequestConfig::getPost('manterConectado') == "logado")
            {
                #caso passar pelo método login, é porque os dados batem com o que está no servidor. Nesse caso será armazenado a hash criptografada no cookie.
                $this->aut->setPermanecerLogado(RequestConfig::getPost('email'), md5(RequestConfig::getPost('senha')));//Resolver problema de não poder salvar senha com criptografia no cookie.
            }  
                echo $this->aut->userRef();
        } else 
        {
            echo "0";
        }
    }

    public function returnCli()
    {
        if(isset($_GET['ref']) && !empty($_GET['ref']))
        {
        $this->objCli->ClientAndTrade($_GET['cpf'],$_GET['ref']);
        } else 
        {
        $data = $this->objUser->tradeFromUser($this->aut->userRef(),'no');
        $this->objCli->ClientAndTrade($_GET['cpf'],$data[0]['trade_id']);
        }
    }
}
