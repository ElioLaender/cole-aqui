<?php

include_once 'config/AutoLoadConfig.php';

class HomeController extends ControllerConfig 
{
	private $route;

	public function index()
	{
		$this->route = RouteConfig::rotas();
        $this->view->set('URL_INI', $this->route['URL_INI']);
        $this->view->render($this->route['HOME_PAGE_DIR']);
	}
}

