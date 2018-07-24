<?php

header('Access-Control-Allow-Origin: *');
include_once 'config/AutoLoadConfig.php';

class ClientAppController extends ControllerConfig
{
    private $objCliApp;

    public function __construct()
    {
        parent::__construct();
        $this->objCliApp = new ClientAppDAO();
    }
    public function insertNewCliApp()
    {
        $this->objCliApp->insertCliApp(RequestConfig::getRequest('name'),
            RequestConfig::getRequest('email'),
            RequestConfig::getRequest('birth'),
            RequestConfig::getRequest('sex'),
            RequestConfig::getRequest('pass'),
            RequestConfig::getRequest('cpf'));
    }

   public function updadeCliApp()
   {
        $this->objCliApp->updateCliApp(RequestConfig::getRequest('name'),
            RequestConfig::getRequest('email'),
            RequestConfig::getRequest('birth'),
            RequestConfig::getRequest('sex'),
            RequestConfig::getRequest('pass'),
            RequestConfig::getRequest('cpf'),
	        RequestConfig::getRequest('ref'));
    }

    public function cpfVerify()
    {
        $this->objCliApp->cpfExists($_GET['cpf']);
    }

    public function returnClientLog()
    { 
        $this->objCliApp->clientAppForRef($_GET['ref']);
    }

    public function CliLog()
    {
        $this->objCliApp->appCliLog(RequestConfig::getRequest('email'),RequestConfig::getRequest('pass')); 
    }

    public function emailVerify()
    {
	    $this->objCliApp->emailExists($_GET['email']);
    }
}
