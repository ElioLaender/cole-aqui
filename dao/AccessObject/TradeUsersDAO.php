<?php
header('Access-Control-Allow-Origin: *');
include_once 'config/AutoLoadConfig.php';
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 10/08/16
 * Time: 19:08
 */
class TradeUsersDAO extends TradeUsersModel{

    private $insert,
            $select = "SELECT * FROM Trade_users WHERE tu_id = '%s'",
            $update = "UPDATE Trade_users SET tu_name = '%s', tu_email = '%s', tu_pass = '%s' WHERE tu_id = '%s'",
            $delete;

    public function userUpdate($name, $email, $pass, $useId)
    {
        $this->setTuName($name);
        $this->setTuEmail($email);
        $this->setTuPass(md5($pass));
        $this->setTuId($useId);

        if($this->getTuPass() == "")
        {
            $this->update = "UPDATE Trade_users SET tu_name = '%s', tu_email = '%s' WHERE tu_id = '%s'";
            $this->update = sprintf($this->update,$this->getTuName(),
                                                  $this->getTuEmail(),
                                                  $this->getTuId());
        } else 
        {
            $this->update = sprintf($this->update,$this->getTuName(),
                                                  $this->getTuEmail(),
                                                  $this->getTuPass(),
                                                  $this->getTuId());
        }
        try 
        {
            $this->runQuery($this->update);
            echo "Dados alterados com sucesso!";
        } catch (Exception $e) 
        {
            echo 'Error: ',  $e->getMessage(), "\n";
        }
    }

    public function returnUserData($userRef)
    {
        $this->setTuId($userRef);
        $this->select = sprintf($this->select, $this->getTuId());
        try 
        {
            $row = $this->runSelect($this->select);
            echo json_encode($row);

        } catch (Exception $e) 
        {
            echo 'Error: ',  $e->getMessage(), "\n";
        }
    }

    #retorna a empresa de acordo com o id do usuário vinculado a mesma.
    public function tradeFromUser($userId,$json = 'on')
    {
        // $this->setTuId($userId);
        $sql = "SELECT * FROM Trade INNER JOIN
                Trade_users ON Trade.trade_id = Trade_users.tu_trade_ref	
                WHERE Trade_users.tu_id = {$userId}";
        //$sql = sprintf($sql, $this->getTuId());
        try {
            $row = $this->runSelect($sql);
            if($json == 'on')
            {
 		        ob_end_flush();
                echo json_encode($row);
            } else 
            {
                return $row;
            }
        } catch (Exception $e) 
        {
            echo 'Error: ',  $e->getMessage(), "\n";
        }
    }
}
ob_end_flush();
