<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 10/08/16
 * Time: 19:06
 */
include_once 'model/AwardsRescuedModel.php';

class AwardsRescueDAO extends  AwardsRescuedModel
{

    private $insert = "INSERT INTO Awards_rescued (ar_trade_ref,ar_awards_ref,ar_client_ref) VALUES ('%s','%s','%s')",
            $select = "SELECT * FROM Awards_rescued WHERE ar_awards_ref = '%s' AND ar_client_ref = '%s'",
            $update,
            $delete;

    public function insertRescued($tradeRef,$awardsRef,$clientRef)
    {
        $this->setArTradeRef($tradeRef);
        $this->setArAwardsRef($awardsRef);
        $this->setArClientRef($clientRef);

        $this->insert = sprintf
        (
            $this->insert, $this->getArTradeRef(),
            $this->getArAwardsRef(),
            $this->getArClientRef()
        );
        try 
        {
            $this->runQuery($this->insert);
            #retorna o ultimo registro resgatado para este cliente que seja desta loja
            $upPointCli = "UPDATE Client
                           INNER JOIN Trade ON Client.client_trade_ref = Trade.trade_id
                           INNER JOIN Awards ON Trade.trade_id = Awards.awards_trade_ref SET Client.client_points = (Client.client_points - Awards.awards_points) WHERE Client.client_id = '%s' AND Awards.awards_id = '%s'";

            $upPointCli = sprintf
            (
                $upPointCli,
                $this->getArClientRef(),
                $this->getArAwardsRef()
            );

            if($this->runQuery($upPointCli))
            {
            } else 
            {
                echo "Não foi possível atualizar pontuação do cliente.";
            }
        } catch (Exception $e) 
        {
            echo 'Error: ',  $e->getMessage(), "\n";
        }
    }

    public function selectRescued($tradeRef,$clientRef)
    {

        $this->select = "SELECT * FROM Awards_rescued
                         INNER JOIN Awards ON Awards_rescued.ar_awards_ref = Awards.awards_id
                         WHERE Awards_rescued.ar_trade_ref = '%s' AND Awards_rescued.ar_client_ref = '%s'";

        $this->setArTradeRef($tradeRef);
        $this->setArClientRef($clientRef);

        $this->select = sprintf
        (
            $this->select, 
            $this->getArTradeRef(), 
            $this->getArClientRef()
        );
        try 
        {

            $row = $this->runSelect($this->select);
            $objDateTime = new DateTimeFunctions();

            for($i = 0; $i<count($row);$i++)
            {
                $row[$i]['ar_data_rescue'] = $objDateTime->dateTimeBr($row[$i]['ar_data_rescue']);
            }
            header('Access-Control-Allow-Origin: *');
            echo json_encode($row);
        } catch (Exception $e) 
        {
            echo 'Error: ',  $e->getMessage(), "\n";
        }
    }

    #retorna o total prêmios resgatados em um estabelecimento
    public function totalRescueForTrading($tradingRef)
    {
        $this->setArTradeRef($tradingRef);
        $sql = "SELECT COUNT(ar_id) FROM Awards_rescued WHERE ar_trade_ref = '%s'";
        $sql = sprintf($sql,$this->getArTradeRef());
        try 
        {
            $row = $this->runSelect($sql);
            header('Access-Control-Allow-Origin: *');
            echo json_encode($row);
        } catch (Exception $e) 
        {
            echo 'Error: ',  $e->getMessage(), "\n";
        }
    }

    public function rescuedForCpf($cpf)
    {
        $sql = "SELECT * FROM Awards_rescued
                INNER JOIN Awards ON Awards_rescued.ar_awards_ref = Awards.awards_id
                INNER JOIN Client ON Awards_rescued.ar_client_ref = Client.client_id
                WHERE Client.client_cpf =  '{$cpf}'";
        try 
        {
            $row = $this->runSelect($sql);
            header('Access-Control-Allow-Origin: *');
            echo json_encode($row);
        } catch (Exception $e) 
        {
            echo 'Error: ',  $e->getMessage(), "\n";
        }
    }
}
