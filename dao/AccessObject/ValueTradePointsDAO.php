<?php

include_once 'config/AutoLoadConfig.php';

class ValueTradePointsDAO extends ValueTradePointsModel
{
    private $insert = "INSERT INTO Value_trade_points (vtp_value_points,vtp_trade_id) VALUES ('%s','%s');",
            $select = "SELECT * FROM Value_trade_points WHERE vtp_trade_id = '%s'",
            $update = "UPDATE Value_trade_points SET vtp_value_points = '%s' WHERE vtp_trade_id = '%s';",
            $delete;

    public function insertTradePoints($value,$tradeRef)
    {
        $this->setVtpValuePoints($value);
        $this->setVtpTradeId($tradeRef);
        $this->insert = sprintf($this->insert,$this->getVtpValuePoints(),$this->getVtpTradeId());
        try 
        {
            $this->runQuery($this->insert);
        } catch (Exception $e) 
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }

    public function updateTradePoints($value,$tradeRef)
    {
        $this->setVtpValuePoints($value);
        $this->setVtpTradeId($tradeRef);
        $this->update = sprintf
        (
            $this->update,
            $this->getVtpValuePoints(),
            $this->getVtpTradeId()
        );
        try 
        {
            $this->runQuery($this->update);
        } catch (Exception $e) 
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }

    public function selectTradePoints($tradeRef)
    {
        $this->setVtpTradeId($tradeRef);
        $this->select = sprintf($this->select,$this->getVtpTradeId());
        try 
        {
            $row = $this->runSelect($this->select);
            header('Access-Control-Allow-Origin: *');
            echo json_encode($row);
        } catch (Exception $e) 
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }

    public function allValues()
    {
        $sql = "SELECT * FROM Value_trade_points";
        try 
        {
            $row = $this->runSelect($sql);
            header('Access-Control-Allow-Origin: *');
            echo json_encode($row);
        } catch (Exception $e) 
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }
}
