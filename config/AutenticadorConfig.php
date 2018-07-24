<?php
header('Access-Control-Allow-Origin: *');
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 28/09/15
 * Time: 21:31
 */

include_once 'config/SessaoConfig.php';
include_once 'model/TradeUsersModel.php';

abstract class AutenticadorConfig {

    private static $instancia = null,
        $cookie;


    // private function __construct() {}

    /**
     *
     * @return Autenticador
     */

    #garante uma unica instância do objeto em pelo código.
    public static function instanciar() {

        if (self::$instancia == NULL) {
            self::$instancia = new AutenticadorEmBanco();

        }

        return self::$instancia;

    }

    public abstract function login($email, $senha);
    public abstract function esta_logado();
    public abstract function pegar_usuario();
    public abstract function expulsar();
    public abstract function sair();
    public abstract function setPermanecerLogado($usuario, $hashSenha);
    public abstract function retornaCookieValues();
    public abstract function unsetPermanecerLogado();
    public abstract function cookieExists();
    public abstract function login_cookie();


}



#Classe responsável por implementar os métodos requeridos nas classes abstratas.
class AutenticadorEmBanco extends AutenticadorConfig {

    #verifica se já existe login de algum usuário.
    public function esta_logado() {

        $sess = SessaoConfig::instanciar();

        return $sess->existe('usuario');
    }

    #loga através do cookie caso o usuário não estiver logado e possuir cookie para isso. Retorna true caso dê tudo certo.
    public function login_cookie(){

        if($this->cookieExists()) {

            #recebe os dados de login e senha do cookie
            $row = $this->retornaCookieValues();

            #realiza o login através da informação dos cookies, caso o login for ok retorna true.
            if($this->login($row['login'], $row['senha'])){

                return true;

            } else {
                #caso o login der errado retorna false

                return false;
            }

        } else {

            #caso não estiver logado e não possuir cookie para login, retorna falso.
            return false;

        }

    }

    #realiza operação de fazer usuário deslogar do sistema.
    public function expulsar() {
        LoadClass::loadConfig('RouteConfig');
        $route = RouteConfig::rotas();
        /* avisar que não possui cadastro e redirecionar para uma página de cadastro. */
        header('location: '.$route['URL_INI'].'/?controller=Dashboard&action=ViewLogin');
    }

    #realiza operação de login no sistema.
    public function login($email, $senha) {


        $email = filter_var($email, FILTER_VALIDATE_EMAIL);

        $pdo = new PDO('mysql:dbname=coleaqui_db;host=localhost','root', '');

        $sess = SessaoConfig::instanciar();

        #cli ativo não se encontra no where, pois faremos a verificação dele separadamente para permitir ou não o login caso email e senha estejam corretos.
        $sql = "SELECT tu_name, tu_email,tu_id FROM Trade_users WHERE tu_email = '".$email."' AND tu_pass = '" .$senha."'";

        $stm = $pdo->query($sql);

        #Observação => Falta fazer a verificação se o cadastro foi validado para permitir o login, caso contrário terá de exibir uma mensagem de erro, perguntando se o usuário quer receber email de validação novamente.
        if ($stm->rowCount() > 0) {


            $dados = $stm->fetch(PDO::FETCH_ASSOC);
            #Instancia da classe que possui os métodos acessadores da tabala cliente.
            $tradeUser = new TradeUsersModel();
            @$tradeUser->setTuEmail($dados['tu_email']);
            @$tradeUser->setTuId($dados['tu_id']);
            @$tradeUser->setTuPass($dados['tu_pass']);
            #Será definido como nome do usuário o email de cadastro do cliente.
            $sess->set('usuario', $tradeUser->getTuEmail());
            $sess->set('userRef', $tradeUser->getTuid());
            return true;

        }

        else {
            return false;
        }

    }

    public function sair(){

        $sess = SessaoConfig::instanciar();

        #destroi o cookie ao destruir a sessão.
        $this->unsetPermanecerLogado();
        $sess->logout();

    }

    #reinicia sessão e cookie. Será chamada quando o usuário auterar seus dados de cadastro.
    public function reiniciaLogin($valor){

        $sess = SessaoConfig::instanciar();

        $this->unsetPermanecerLogado();
        // #destroi e reinicia a sessão.
        $sess->set('usuario', $valor);



    }

    #retorna o usuário que está logado na sessão atual, sendo antes verificado se existe algum usuário logado dentro desta requisição.
    public function pegar_usuario() {

        $sess = SessaoConfig::instanciar();

        if ($this->esta_logado()) {

            $user = $sess->get('usuario');
            return $user;

        }
        else {
            return false;
        }
    }

    #retorna Id do usuário
    public function userRef(){

        $sess = SessaoConfig::instanciar();

        if ($this->esta_logado()) {

            $user = $sess->get('userRef');
            return $user;

        }
        else {
            return false;
        }


    }


    #seta a sessão e rash de senha do usuário caso ele deseje se manter conectado
    public function setPermanecerLogado($usuario, $hashSenha){

        $dados = array( 'login' => $usuario, 'senha' => $hashSenha);

        #cookie vai durar por 30 dias ou até que o  usuário acesse a opção sair do dashboard principal.
        setcookie('entrar', serialize($dados), time() + 60*60*24*30);

    }



    #verifica se um cookie foi setado anteriormente.
    public function cookieExists(){



        if(isset($_COOKIE['entrar']) && !empty($_COOKIE['entrar'])){

            return true;

        } else {

            return false;
        }
    }




    //verificar se realmente será necessário esta função para retornar o cookie, e não o valor diretamente.
    #retorna o array do cookie criado na sessão
    public function retornaCookieValues(){

        #verifica se não está vazio
        if(!empty($_COOKIE["entrar"])){
            $cookieUser = unserialize($_COOKIE["entrar"]);
        }


        #verifica se o cookie existe na base de dados
        if(isset($cookieUser['login']) && ($cookieUser['senha'] != "")){

            //retorna um array contendo os valores setados no cookie de login
            return array( 'login' => $cookieUser['login'] , 'senha' => $cookieUser['senha'] );

        } else {

            return "";
        }


    }


    #destrou o cookie gerado para o usuário logado na sessão atual.
    public function unsetPermanecerLogado() {


        #quando um cookie já existente é setado, ele é destruido.
        setcookie("entrar");


    }

}
