<?php


class RouteConfig 
{
    /**
     * @return array
     */
    public static function rotas(){

        return array(

            'HOME_PAGE_DIR'             =>  'home/home.php',
            'URL_INI'                   =>  '',
            'ACCESS_CONTROLLER'         =>  'controller/',
            'CONFIG_DIR'                =>  'config/',
            'VIEW_DIR'                  =>  'view/pages/',
            'MODEL_DIR'                 =>  'model/',
            'DASH_START'                =>  'dashboard/start.php',
            'DASH_LOGIN'                =>  'dashboard/dashLogin.php',
            'CLIENT_LOGIN'              =>  'client/clientLogin.php',
            'CONNECTION_FACTORY_DIR'    =>  'dao/ConnectionFactory/',
            'ACCESS_DAO'                =>  'dao/AccessObject',
            'ACCESS_LIBRARIES'          =>  'libraries/',
            'CLIENT_VIEW'               =>  'client/clientHome.php',
            'DASH_TRADE'                =>  'dashboard/viewTradePage.php',
            'DASH_NEW_CLI'              =>  'dashboard/newClient.php',
            'COSTUMER_PAGE'             =>  'dashboard/costumerPage.php',
            'ALL_CLIENT'                =>  'dashboard/allClient.php',
            'INSERT_AWARDS'             =>  'dashboard/insertAwards.php',
            'LIST_AWARDS'               =>  'dashboard/listAwards.php',
            'POINT_MANAGER'             =>  'dashboard/viewPointManager.php',
            'VIEW_ALERTS'               =>  'dashboard/viewAlerts.php',
            'CLIENT_TRADE_INTERFACE'    =>  'client-trade-interface/index.html'
        );
    }
}

