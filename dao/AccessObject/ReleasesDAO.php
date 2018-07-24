<?php
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 10/08/16
 * Time: 19:07
 */
include_once 'config/AutoLoadConfig.php';
class ReleasesDAO extends  ReleasesModel
{
    private $insert = "INSERT INTO Releases (releases_value,releases_description,releases_trade_ref,releases_trade_client_ref,releases_confirm,releases_value_points) VALUES ('%s','%s','%s','%s','%s','%s');",
            $select = "SELECT * FROM Releases INNER JOIN Client ON Releases.releases_trade_client_ref = Client.client_id WHERE Releases.releases_trade_client_ref = '%s'",
            $update,
            $delete;

    public function insertReleases($value,$description,$tradeRef,$cliRef,$valuePoint)
    {
        $this->setReleasesDescription($description);
        $this->setReleasesTradeRef($tradeRef);
        $this->setReleasesTradeClientRef($cliRef);
        $this->setReleasesValue($value);
        $this->setReleasesValuePoints($valuePoint);

        $this->insert = sprintf
        (
            $this->insert,$this->getReleasesValue(),
            $this->getReleasesDescription(),
            $this->getReleasesTradeRef(),
            $this->getReleasesTradeClientRef(),
            'Não',
            $this->getReleasesValuePoints()
        );
        try 
        {
            $this->runQuery($this->insert);
        } catch (Exception $e) 
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }

    public function returnReleases($cliRef)
    {
        $this->setReleasesTradeClientRef($cliRef);
        $this->select = sprintf($this->select,$this->getReleasesTradeClientRef());
        try 
        {
            $row = $this->runSelect($this->select);
            $objDateTime = new DateTimeFunctions();

            for($i = 0; $i<count($row);$i++)
            {
                $row[$i]['releases_accession'] = $objDateTime->dateTimeBr($row[$i]['releases_accession']);
            }

	       header('Access-Control-Allow-Origin: *');
           echo json_encode($row);

        } catch (Exception $e) 
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }

    #retorna o valor em dinheiro total lançado de acordo com o id do fornecedor passado.
    public function sunTotalReleased($tradeRef)
    {
        $sql = "SELECT SUM(releases_value) FROM Releases WHERE releases_trade_ref = $tradeRef";
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

    public function pointsForTrading($tradingRef)
    {
        $sql = "SELECT releases_value,releases_value_points FROM Releases WHERE releases_trade_ref =  $tradingRef";
        $totalPoints = "";
        try 
        {
            $row = $this->runSelect($sql);

            for($i=0;$i<count($row);$i++)
            {
                $totalPoints[0]['totalPoints'] += ($row[$i]['releases_value'] / $row[$i]['releases_value_points']);
            }

            header('Access-Control-Allow-Origin: *');
            echo json_encode($totalPoints);

        } catch (Exception $e) 
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }

    #gasto e porcentagem por sexo
    public function spentSex($tradeRef)
    {

        $male = "SELECT SUM(Releases.releases_value) FROM Client
                 INNER JOIN Releases ON Client.client_id = Releases.releases_trade_client_ref WHERE Client.client_Sex = 'M' AND Releases.releases_trade_ref = '{$tradeRef}'";
        $fem =  "SELECT SUM(Releases.releases_value) FROM Client
                 INNER JOIN Releases ON Client.client_id = Releases.releases_trade_client_ref WHERE Client.client_Sex = 'F' AND Releases.releases_trade_ref = '{$tradeRef}'";
        $sex = "";
        $percentFem = 0;
        $percentMale = 100;
        if($row = $this->runSelect($male))
        {
            if($row[0]['SUM(Releases.releases_value)'] == null)
            {
                $sex[0]['male'] = 0;
            } else
            {
                $sex[0]['male'] = $row[0]['SUM(Releases.releases_value)'];
            }
        }

        if($row = $this->runSelect($fem))
        {
            if($row[0]['SUM(Releases.releases_value)'] == null)
            {
                $sex[0]['fem'] = 0;
            } else 
            {
                $sex[0]['fem'] = $row[0]['SUM(Releases.releases_value)'];
            }
        }

        $sex[0]['total'] = $sex[0]['male'] + $sex[0]['fem'];
        $percentFem = $sex[0]['fem'] * 100;
        $percentFem = ($percentFem/$sex[0]['total']);
        $sex[0]['percentFem'] = $percentFem;
        $sex[0]['percentMale'] = ($percentMale - $percentFem);

	    header('Access-Control-Allow-Origin: *');
        echo json_encode($sex);
    }
}
