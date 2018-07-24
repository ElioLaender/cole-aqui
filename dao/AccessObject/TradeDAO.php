<?php
header('Access-Control-Allow-Origin: *');
include_once 'config/AutoLoadConfig.php';
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 10/08/16
 * Time: 19:07
 */
class TradeDAO extends TradeModel
{
    private $insert,
        $select = "SELECT * FROM Trade WHERE trade_id = '%s'",
        $update = "UPDATE Trade SET      trade_name = '%s',
                                         trade_cnpj = '%s',
                                         trade_boxes = '%s',
                                         trade_phone = '%s',
                                         trade_address = '%s',
                                         trade_complement = '%s',
                                         trade_district = '%s',
                                         trade_city = '%s',
                                         trade_state = '%s',
                                         trade_image = '%s' WHERE trade_id = '%s';",
        $delete;

    public function updateTradeInfo($name, $cnpj, $boxes, $phone, $address, $complement, $district, $city, $state,$image,$tradeId)
    {
        $this->setTradeName($name);
        $this->setTradeCnpj($cnpj);
        $this->setTradeBoxes($boxes);
        $this->setTradePhone($phone);
        $this->setTradeAddress($address);
        $this->setTradeComplement($complement);
        $this->setTradeDistrict($district);
        $this->setTradeCity($city);
        $this->setTradeState($state);
        $this->setTradeImage($image);
        $this->setTradeId($tradeId);

        if($this->getTradeImage() == "")
        {
            $this->update = "UPDATE Trade SET      trade_name = '%s',
                                         trade_cnpj = '%s',
                                         trade_boxes = '%s',
                                         trade_phone = '%s',
                                         trade_address = '%s',
                                         trade_complement = '%s',
                                         trade_district = '%s',
                                         trade_city = '%s',
                                         trade_state = '%s'
                                         WHERE trade_id = '%s';";

            $sql = sprintf($this->update, $this->getTradeName(),
                $this->getTradeCnpj(),
                $this->getTradeBoxes(),
                $this->getTradePhone(),
                $this->getTradeAddress(),
                $this->getTradeComplement(),
                $this->getTradeDistrict(),
                $this->getTradeCity(),
                $this->getTradeState(),
                $this->getTradeId());

        } else 
        {
            $sql = sprintf($this->update, $this->getTradeName(),
                $this->getTradeCnpj(),
                $this->getTradeBoxes(),
                $this->getTradePhone(),
                $this->getTradeAddress(),
                $this->getTradeComplement(),
                $this->getTradeDistrict(),
                $this->getTradeCity(),
                $this->getTradeState(),
                $this->getTradeImage(),
                $this->getTradeId());
        }
        try {
            $this->runQuery($sql);
            header('location: ?controller=Dashboard&action=viewTradePage');
        } catch (Exception $e) 
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }

    function returnTrade($tradeRef)
    {
        header("Content-Type: application/json;charset=utf-8");
        $this->setTradeId($tradeRef);
        $this->select = sprintf($this->select,$this->getTradeId());
        try 
        {
            $row =  $this->runSelect($this->select);
            echo json_encode($row, JSON_PRETTY_PRINT);
        } catch (Exception $e) 
        {
            echo 'Error: ',  $e->getMessage(), "\n";
        }
    }

    public function returnAllTrade()
    {
        header("Content-Type: application/json;charset=utf-8");
        $sql = "SELECT * FROM Trade";
        try 
        {
            $row =  $this->runSelect($sql);
            echo json_encode($row, JSON_PRETTY_PRINT);
        } catch (Exception $e) 
        {
            echo 'Error: ',  $e->getMessage(), "\n";
        }
    }

    #retorna os trades e dados do cliente de acordo com o cpf do cliente logado no app
    public function tradeforCliCpf($appCliCpf)
    {
        $sql = "SELECT * FROM Trade INNER JOIN
                Client ON Trade.trade_id = Client.client_trade_ref
                WHERE Client.client_cpf = '%s'";

        $sql = sprintf($sql,$appCliCpf);
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
