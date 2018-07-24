<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 10/08/16
 * Time: 19:06
 */
include_once 'model/AwardsModel.php';
include_once 'libraries/DateTimeFunctions.php';

class AwardsDAO extends AwardsModel
{
    private $insert = "INSERT INTO Awards (awards_title,awards_points,awards_trade_ref) VALUES ('%s','%s','%s');",
        $select = "SELECT * FROM Awards WHERE awards_trade_ref = '%s'",
        $update,
        $delete;

    public function insertAwards($title,$points,$tradeRef)
    {
        $this->setAwardsTitle($title);
        $this->setAwardsPoints($points);
        $this->setAwardsTradeRef($tradeRef);

        $this->insert = sprintf
        (
            $this->insert,$this->getAwardsTitle(),
            $this->getAwardsPoints(),
            $this->getAwardsTradeRef()
        );
        try 
        {
            $this->runQuery($this->insert);
        } catch (Exception $e) 
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }

    public function awardsForTradeRef($tradeRef)
    {
        $objDateTime = new DateTimeFunctions();
        $this->setAwardsTradeRef($tradeRef);
        $this->select = sprintf($this->select, $this->getAwardsTradeRef());
        try 
        {
            $row = $this->runSelect($this->select);

            for($i = 0; $i<count($row);$i++)
            {
                $row[$i]['awards_create'] = $objDateTime->dateTimeBr($row[$i]['awards_create']);
            }
            header('Access-Control-Allow-Origin: *');
            echo json_encode($row);

        } catch (Exception $e) 
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }

    #retorna o menor valor de prêmios cadastrados por empressas.
    public function minValForTradeRef($tradeRef)
    {
        $sql = "SELECT MIN(awards_points) FROM Awards WHERE awards_trade_ref = '%s'";
        $this->setAwardsTradeRef($tradeRef);
        $sql = sprintf($sql, $this->getAwardsTradeRef());
        try 
        {
            $row = $this->runSelect($sql);
            return $row[0]['MIN(awards_points)'];
        } catch (Exception $e)
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }

    public function returnAllAwards()
    {
	    header("Content-Type: application/json;charset=utf-8");
        $sql = "SELECT * FROM Awards";
        try 
        {
            $row =  $this->runSelect($sql);
            echo json_encode($row, JSON_PRETTY_PRINT);
        } catch (Exception $e) 
        {
            echo 'Error: ',  $e->getMessage(), "\n";
        }
    }  
}
