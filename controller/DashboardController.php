<?php

header('Access-Control-Allow-Origin: *');
include_once 'config/AutoLoadConfig.php';

class DashboardController extends ControllerConfig
{

    private $route,
            $result,
            $aut,
            $objUser,
            $objCli,
            $objTrade,
            $objUpImg,
            $objRele,
            $objAwards,
            $objNoti,
            $objValue,
            $objRescue;

    public function __construct()
    {
        parent::__construct();
        $this->route = RouteConfig::rotas();
        $this->aut = AutenticadorConfig::instanciar();
        $this->objUser = new TradeUsersDAO();
        $this->objTrade = new TradeDAO();
        $this->objCli = new ClientDAO();
        $this->objUpImg = new UploadController();
        $this->objRele = new ReleasesDAO();
        $this->objAwards = new AwardsDAO();
        $this->objNoti = new NotificationsDAO();
        $this->objValue = new ValueTradePointsDAO();
        $this->objRescue = new AwardsRescueDAO();
        $this->objCliApp = new ClientAppDAO();
    }        

    #página inicial dashboard
    public function dashStart()
    {
        if ($this->aut->esta_logado() || $this->aut->login_cookie()) 
        {
            $this->view->set('URL_INI', $this->route['URL_INI']);
            $this->view->render($this->route['DASH_START']);
        } else
        {
            header('location: ?controller=Dashboard&action=viewDashLogin');
        }
    }

    public function viewAllClient()
    {
        if ($this->aut->esta_logado() || $this->aut->login_cookie()) 
        {
            $this->view->render($this->route['ALL_CLIENT']);
        } else
        {
            header('location: ?controller=Dashboard&action=viewDashLogin');
        }
    }

    public function cliAll()
    { 
        $data = $this->objUser->tradeFromUser($this->aut->userRef(),'no');
        $this->objCli->ClientForTrade($data[0]['trade_id'],'on');
    }

    #chama login dashboard
    public function viewDashLogin()
    {
        if ($this->aut->esta_logado() || $this->aut->login_cookie()) 
        {
            header("location: ?controller=Dashboard&action=dashStart");
        } else 
        {
            $this->view->set('URL_INI', $this->route['URL_INI']);
            $this->view->render($this->route['DASH_LOGIN']);
        }
    }

    #página para gerenciar informações da empresa
    public function viewTradePage()
    {
        if ($this->aut->esta_logado() || $this->aut->login_cookie()) 
        {
            $this->view->render($this->route['DASH_TRADE']);
        } else 
        {
            header('location: ?controller=Dashboard&action=viewDashLogin');
        }
    }

    public function returnTradeInfo()
    {
        if(isset($_GET['ref']) && !empty($_GET['ref']))
        {
            $data = $this->objUser->tradeFromUser($_GET['ref'],'off');
            $this->objTrade->returnTrade($data[0]['trade_id']);
        } else 
        {
            $data = $this->objUser->tradeFromUser($this->aut->userRef(),'off');
            $this->objTrade->returnTrade($data[0]['trade_id']); //criar lógica para pegar o id da empresa no qual o mesmo está vinculado.
        }
    }

    public function awardsRescueCli()
    {
        $data = $this->objUser->tradeFromUser($this->aut->userRef(),'no');
        $this->objCli->returnAwardsCliOnRescue($_GET['ref'],$data[0]['trade_id'],'on');
    }

    public function updateTrade()
    {
        $data = $this->objUser->tradeFromUser($this->aut->userRef(),'no');
        $this->objTrade->updateTradeInfo(RequestConfig::getPost('name'),
            RequestConfig::getPost('cnpj'),
            RequestConfig::getPost('boxes'),
            RequestConfig::getPost('phone'),
            RequestConfig::getPost('address'),
            RequestConfig::getPost('complement'),
            RequestConfig::getPost('district'),
            RequestConfig::getPost('city'),
            RequestConfig::getPost('state'),
            $this->objUpImg->upLoadImag("uploads/trade-profiles/"),
            $data[0]['trade_id']); //criar lógica para pegar o id do trade.
    }

    public function tradeUserData()
    {
        $this->objUser->returnUserData($this->aut->userRef());
    }

    #update in the user data // A principio poderá ser alterado apenas a senha
    public function updateUserData()
    {
        $this->objUser->userUpdate
        ( 
            RequestConfig::getPost('name'),
            RequestConfig::getPost('email'),
            RequestConfig::getPost('pass'),
            $this->aut->userRef()
        ); //RequestConfig::getPost('userId')
    }

    public function viewNewClient()
    {
        if ($this->aut->esta_logado() || $this->aut->login_cookie()) 
        {
            $this->view->render($this->route['DASH_NEW_CLI']);
        } else 
        {
            header('location: ?controller=Dashboard&action=viewDashLogin');
        }
    }

    #lógica de login para o administrador
    public function loginDash()
    {
        if ($this->aut->login(RequestConfig::getPost('email'),md5(RequestConfig::getPost('senha')))) 
        {
            #verifica se o usuário deseja se manter logado
            if(RequestConfig::getPost('manterConectado') == "logado")
            {
                #caso passar pelo método login, é porque os dados batem com o que está no servidor. Nesse caso será armazenado a hash criptografada no cookie.
                $this->aut->setPermanecerLogado(RequestConfig::getPost('email'), md5(RequestConfig::getPost('senha')));//Resolver problema de não poder salvar senha com criptografia no cookie.
            }

            echo "UserOK";

        } else 
        {
            echo "<p>Ops, email e/ou senha invalidos, tente novamente.</p>";
        }
    }

    #desloga usuário
    public function  dashExit()
    {
        #envia o usuário para fora do sistema
        $this->aut->sair();
        header("location: ?controller=Dashboard&action=viewDashLogin");
    }

    public function newCient()
    { 
        $data = $this->objUser->tradeFromUser($this->aut->userRef(),'no');
        $this->objCli->cliPersist(RequestConfig::getPost('nameCli'),
            RequestConfig::getPost('phoCli'),
            RequestConfig::getPost('emailCli'),
            RequestConfig::getPost('cpfCli'),
            RequestConfig::getPost('sexCli'),
            $data[0]['trade_id']);
    }

    public function UpClient()
    {
        $this->objCli->clientUpdate
        (
            RequestConfig::getPost('nameCli'),
            RequestConfig::getPost('phoCli'),
            RequestConfig::getPost('emailCli'),
            RequestConfig::getPost('cpfCli'),
            RequestConfig::getPost('sexCli'),
            RequestConfig::getPost('ref')
        );
    }

    public function insertScore()
    {
        $data = $this->objUser->tradeFromUser($this->aut->userRef(),'no');
        $this->objRele->insertReleases(RequestConfig::getPost('score'),RequestConfig::getPost('description'),$data[0]['trade_id'],RequestConfig::getPost('ref'),RequestConfig::getPost('valuePoint'));
    }

    public function insertAwards()
    {
        $data = $this->objUser->tradeFromUser($this->aut->userRef(),'no');
        
        $this->objAwards->insertAwards
        (
            RequestConfig::getPost('title'),
            RequestConfig::getPost('points'),
            $data[0]['trade_id']
        );

        header("location: ?controller=Dashboard&action=viewAwardsList");
    }

    public function returnAwards()
    {
        if(isset($_GET['ref']) && !empty($_GET['ref']))
        {
            $this->objAwards->awardsForTradeRef($_GET['ref']);
        } else 
        {
            $data = $this->objUser->tradeFromUser($this->aut->userRef(),'no');
            $this->objAwards->awardsForTradeRef($data[0]['trade_id']);
        }
    }

    public function viewReleases()
    {
        $this->objRele->returnReleases((int)$_GET['ref']);
    }

    public function viewCostumerPage()
    {
        if ($this->aut->esta_logado() || $this->aut->login_cookie()) 
        {
            if(isset($_GET['notRef']) && !empty($_GET['notRef']))
            {
                $data = $this->objUser->tradeFromUser($this->aut->userRef(),'no');
                $this->objNoti->updateNotifications((int)$_GET['notRef'],$data[0]['trade_id']);
            }
            $this->view->render($this->route['COSTUMER_PAGE']);
        } else 
        {
            header('location: ?controller=Dashboard&action=viewDashLogin');
        }
    }

    public function returnCostumer()
    {
        $this->objCli->ClientForRef((int)$_GET['client'],'on');
    }


    public function viewInserAwards()
    {
        if ($this->aut->esta_logado() || $this->aut->login_cookie()) 
        {
            $this->view->render($this->route['INSERT_AWARDS']);
        } else 
        {
            header('location: ?controller=Dashboard&action=viewDashLogin');
        }
    }

    public function viewAwardsList()
    {
        if ($this->aut->esta_logado() || $this->aut->login_cookie()) 
        {
            $this->view->render($this->route['LIST_AWARDS']);
        } else 
        {
            header('location: ?controller=Dashboard&action=viewDashLogin');
        }
    }

    public function viewPointManager()
    {
        if ($this->aut->esta_logado() || $this->aut->login_cookie()) 
        {
            $this->view->render($this->route['POINT_MANAGER']);
        } else 
        {
            header('location: ?controller=Dashboard&action=viewDashLogin');
        }
    }

    public function viewAlerts()
    {
        if ($this->aut->esta_logado() || $this->aut->login_cookie()) 
        {
            $this->view->render($this->route['VIEW_ALERTS']);
        } else 
        {
            header('location: ?controller=Dashboard&action=viewDashLogin');
        }
    }

    public function insertPointsValue()
    { 
        $data = $this->objUser->tradeFromUser($this->aut->userRef(),'no');
        $objValue->insertTradePoints(RequestConfig::getPost('value'),$data[0]['trade_id']);
        header('location: ?controller=Dashboard&action=viewPointManager');
    }

    public function updatePointsValue()
    {
        $data = $this->objUser->tradeFromUser($this->aut->userRef(),'no');
        $objValue->updateTradePoints(RequestConfig::getPost('value'),$data[0]['trade_id']);
        header('location: ?controller=Dashboard&action=viewPointManager');
    }

    public function returnPointsValue()
    {
        $data = $this->objUser->tradeFromUser($this->aut->userRef(),'no');
        $objValue->selectTradePoints($data[0]['trade_id']);
    }

    #realiza insert na tabela setando que foi liberado um prẽmio para o usuário.
    public function AwRescued()
    {
        $data = $this->objUser->tradeFromUser($this->aut->userRef(),'no');
        $this->objRescue->insertRescued
        (
            $data[0]['trade_id'],
            RequestConfig::getRequest('awRef'),
            RequestConfig::getRequest('cRef')
        );
        #criar lógica para decremento deste cliente na loja
        header("location: ?controller=Dashboard&action=viewCostumerPage&client=".RequestConfig::getRequest('cRef'));
    }

    #retorna o o histórico dos prêmios cadastrados
    public function retResCli()
    {
        $data = $this->objUser->tradeFromUser($this->aut->userRef(),'no');
        $this->objRescue->selectRescued($data[0]['trade_id'],$_GET['cRef']);
    }

    #confirma o lançamento pelo cliente
    public function releaseConfirm()
    {
        //Verifica se a requisição partiu do aplicativo, caso ref estiver vazio, é porque a requisição veio do dashboard web.
        if(isset($_GET['ref']) && !empty($_GET['ref']))
        {
            $this->objCli->confirmReleasesForSum($_GET['cpf'],$_GET['ref']);
        } else
        {
            $data = $this->objUser->tradeFromUser($this->aut->userRef(),'no');
            $this->objCli->confirmReleasesForSum($_GET['cpf'],$data[0]['trade_id']);
        }
    }

    public function allAwRescued()
    {
        $data = $this->objUser->tradeFromUser($this->aut->userRef(),'no');
        $this->objRescue->totalRescueForTrading($data[0]['trade_id']);
    }

    public function returnCountSex()
    {  
        $data = $this->objUser->tradeFromUser($this->aut->userRef(),'no');
        $this->objCli->totalPerSex($data[0]['trade_id']);
    }

    public function returnMaxValue()
    {
        $data = $this->objUser->tradeFromUser($this->aut->userRef(),'no');
        $this->objRele->sunTotalReleased($data[0]['trade_id']);
    }

    public function totalPoints()
    {
        $data = $this->objUser->tradeFromUser($this->aut->userRef(),'no');
        $this->objRele->pointsForTrading($data[0]['trade_id']);
    }

    public function spentSex()
    {
        $data = $this->objUser->tradeFromUser($this->aut->userRef(),'no');
        $this->objRele->spentSex($data[0]['trade_id']);
    }

    public function returnNotifications()
    {
        $data = $this->objUser->tradeFromUser($this->aut->userRef(),'no');
        $this->objNotifi->selectNotifications($data[0]['trade_id']);
    }

    public function allNotifi()
    {
        $data = $this->objUser->tradeFromUser($this->aut->userRef(),'no');
        $this->objNotifi->allNotiForTrade($data[0]['trade_id']);
    }

    public function allTrade()
    {
        $this->objTrade->returnAllTrade();
    }

    public function allAwards()
    {
        $this->objAwards->returnAllAwards();
    }

    public function allValueTrade()
    {
        $this->objValueTrade->allValues();
    }

    #Retorna as impresas nas quais o cpf está cadastrado
    public function tradeAndPointsAppClient()
    {
        $ret = $this->objCliApp->clientAppForRef($_GET['ref'],'off');
        $this->objTrade->tradeforCliCpf($ret[0]['ca_cpf']);
    }

    #retorna o inner join da premiação oferecida resgatada de acordo com o cpf do cliente logado no app
    public function returTradePerAwardsRescued()
    { 
        $result = $this->objCliApp->returnCpfForCliAppRef($_GET['ref']);
        $this->objAwRes->rescuedForCpf($result[0]['ca_cpf']);
    }
}
