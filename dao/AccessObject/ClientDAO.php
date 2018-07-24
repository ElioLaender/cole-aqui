<?php
header('Access-Control-Allow-Origin: *');
include_once 'config/AutoLoadConfig.php';
/**
 * Created by PhpStorm.
 * User: laender
 * Date: 10/08/16
 * Time: 19:07
 */
class ClientDAO extends ClientModel
{
    private $insert = "INSERT INTO Client (client_name,client_phone,client_email,client_cpf,client_sex,client_trade_ref,client_points) VALUES ('%s','%s','%s','%s','%s','%s',0)",
            $select = "SELECT * FROM Client WHERE client_trade_ref = '%s'",
            $update = "UPDATE Client SET client_name = '%s', client_phone = '%s', client_email = '%s', client_cpf = '%s', client_sex = '%s' WHERE client_id = '%s'",
            $delete,
            $reseasesSun;

    public function cliPersist($name,$phone,$email,$cpf,$sex,$tradeRef)
    {
        $this->setClientName($name);
        $this->setClientPhone($phone);
        $this->setClientEmail($email);
        $this->setClientCpf($cpf);
        $this->setClientSex($sex);
        $this->setClientTradeRef($tradeRef);

        $this->insert =  sprintf
        (
            $this->insert,$this->getClientName(),
            $this->getClientPhone(),
            $this->getClientEmail(),
            $this->getClientCpf(),
            $this->getClientSex(),
            $this->getClientTradeRef()
        );
        try 
        {
            $this->runQuery($this->insert);
            $cliRef = $this->ClientForCpf($this->getClientCpf(),'off');
            //fazer lógica para direcionar para a página do cliente.
            header('location: ?controller=Dashboard&action=viewCostumerPage&client='.$cliRef[0]['client_id']);
        } catch (Exception $e) 
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }

    public function clientUpdate($name,$phone,$email,$cpf,$sex,$cliRef)
    {
        $this->setClientName($name);
        $this->setClientPhone($phone);
        $this->setClientEmail($email);
        $this->setClientCpf($cpf);
        $this->setClientSex($sex);
        $this->setClientId($cliRef);

        $this->update =  sprintf
        (
            $this->update,$this->getClientName(),
            $this->getClientPhone(),
            $this->getClientEmail(),
            $this->getClientCpf(),
            $this->getClientSex(),
            $this->getClientId()
        );
        try 
        {
            $this->runQuery($this->update);
           // echo $this->update;
           // header('location: ?controller=Dashboard&action=viewCostumerPage&client='.$this->getClientId());
        } catch (Exception $e) 
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }

    public function ClientForCpf($cpf,$json = 'on')
    {
        $sql = "SELECT * FROM Client WHERE client_cpf = '%s'";
        $this->setClientCpf($cpf);
        $sql = sprintf($sql,$this->getClientCpf());
        try {
            $row = $this->runSelect($sql);

            if($json == 'on')
            {
                echo json_encode($row);
            } else 
            {
                return $row;
            }

        } catch (Exception $e) 
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }

    public function ClientAndTrade($cpf,$tradeRef,$json = 'on')
    {
       // $this->setClientCpf($cpf);
       // $this->setClientTradeRef($tradeRef);
        $sql = "SELECT * FROM Client
                    INNER JOIN Trade ON Client.client_trade_ref = Trade.trade_id
                    WHERE Client.client_cpf = '".$cpf."' AND Trade.trade_id = '".$tradeRef."'";
                   
       // $sql = sprintf($sql,$this->getClientCpf(),$this->getClientTradeRef());
        try 
        {
            $row = $this->runSelect($sql);

            if($json == 'on')
            {
		        header('Access-Control-Allow-Origin: *');
                echo json_encode($row);
            } else 
            {
                return $row;
            }
        } catch (Exception $e) 
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }

    public function ClientForRef($cliRef,$json = 'on')
    {
        $sql = "SELECT * FROM Client WHERE client_id = '%s'";
        $this->setClientId($cliRef);
        $sql = sprintf($sql,$this->getClientId());
        try 
        {
            $row = $this->runSelect($sql);

            if($json == 'on')
            {
                echo json_encode($row);
            } else 
            {
                return $row;
            }

        } catch (Exception $e) 
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }

    public function ClientForTrade($tradeRef,$json = 'on')
    {
        $this->setClientTradeRef($tradeRef);
        $this->select = sprintf($this->select,$this->getClientTradeRef());
        
        try 
        {
            $row = $this->runSelect($this->select);
            $objDateTime = new DateTimeFunctions();

            for($i = 0; $i<count($row);$i++)
            {
                $row[$i]['client_accession'] = $objDateTime->dateTimeBr($row[$i]['client_accession']);
            }

            if($json == 'on')
            {
                echo json_encode($row);
            } else 
            {
                return $row;
            }

        } catch (Exception $e) 
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }

    #retorna a contagem de clientes do sexo feminino e total masculino
    public function totalPerSex($tradeRef)
    {
        $male = "SELECT COUNT(client_id) FROM Client WHERE client_Sex = 'M' AND client_trade_ref = '{$tradeRef}'";
        $fem = "SELECT COUNT(client_id) FROM Client WHERE client_Sex = 'F' AND client_trade_ref = '{$tradeRef}'";
        $sex = "";
        $percentFem = "";
        $percentMale = 100;

        if($row = $this->runSelect($male))
        {
                $sex[0]['male'] = $row[0]['COUNT(client_id)'];
        }

        if($row = $this->runSelect($fem))
        {
                $sex[0]['fem'] = $row[0]['COUNT(client_id)'];
        }

        $sex[0]['total'] = $sex[0]['male'] + $sex[0]['fem'];
        $percentFem = $sex[0]['fem'] * 100;
        $percentFem = ($percentFem/$sex[0]['total']);
        $sex[0]['percentFem'] = $percentFem;
        $sex[0]['percentMale'] = ($percentMale - $percentFem);
        echo json_encode($sex);
    }

    #retorna os prêmios de acordo com o usuário e empresa, sendo retornado apenas os prêmios cujo usuário tem pontos para resgatar.
    public function returnAwardsCliOnRescue($cliRef,$tradeRef,$json = 'on')
    {
        $sql = "SELECT * FROM Client
                INNER JOIN Awards ON Client.client_trade_ref = Awards.awards_trade_ref
                WHERE Client.client_points >= Awards.awards_points AND Client.client_id = '%s' AND Awards.awards_trade_ref = '%s' ";
        $this->setClientId($cliRef);
        $this->setClientTradeRef($tradeRef);
        $sql = sprintf($sql,$this->getClientId(),$this->getClientTradeRef());
        try 
        {
            $row = $this->runSelect($sql);
            $objDateTime = new DateTimeFunctions();

            for($i = 0; $i<count($row);$i++)
            {
                $row[$i]['awards_create'] = $objDateTime->dateTimeBr($row[$i]['awards_create']);
            }

            if($json == 'on')
            {
                echo json_encode($row);

            } else 
            {
                return $row;
            }

        } catch (Exception $e) 
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }

    #seleciona todos os lançamentos realizados para o cliente e que o mesmo ainda não confirmou.
    public function confirmReleasesForSum($cliCpf,$tradeRef)
    {
        $sql = "SELECT * FROM Client
                INNER JOIN Releases ON Client.client_id = Releases.releases_trade_client_ref
                 WHERE Releases.releases_confirm = 'Não' AND Releases.releases_trade_ref = '%s' AND Client.client_cpf = '%s'";
        $sql = sprintf($sql,$tradeRef,$cliCpf);

        try 
        {
            $row = $this->runSelect($sql);
            #se não retornar nada, termina a execução do método.
            if(count($row) <= 0)
            {
                exit("0");
            }

            #Realiza soma dos lançamentos ainda não confirmados
            for($i = 0; $i < count($row); $i++)
            {
                #É dividido o valor em reais pelo valor do ponto, desta forma temos a pontuação.
                $this->reseasesSun += ($row[$i]['releases_value']/$row[$i]['releases_value_points']);
            }

            $up = "UPDATE Client
                   INNER JOIN Releases ON Client.client_id = Releases.releases_trade_client_ref
                   SET Client.client_points = Client.client_points + %s, Releases.releases_confirm = 'Sim'
                   WHERE Releases.releases_confirm = 'Não' AND Releases.releases_trade_ref = '%s' AND Client.client_cpf = '%s'";

            $up = sprintf($up,$this->reseasesSun,$tradeRef,$cliCpf);
            $this->runQuery($up);

            #verifica se a soma de pontos atual do cliente é superior ao menor valor de prêmio.
            $objAwards = new AwardsDAO();
            $minAw = $objAwards->minValForTradeRef($tradeRef);
            $pointsCli = "SELECT * FROM Client WHERE client_cpf = '".$cliCpf."' AND client_trade_ref = '".$tradeRef."'";
            $totalPoints = $this->runSelect($pointsCli);

            #caso o valor seja maior que a premiação mínima, salva como notificação.
           if($totalPoints[0]['client_points'] >= $minAw)
           {
                $objNotifi = new NotificationsDAO();
                $objNotifi->insertNotifications($totalPoints[0]['client_name']." já pode resgatar!","Atingiu ".$totalPoints[0]['client_points']." Pontos",$tradeRef,"?controller=Dashboard&action=viewCostumerPage&client=".$totalPoints[0]['client_id']);
           }

            echo $this->reseasesSun;

        } catch (Exception $e) 
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }
}
