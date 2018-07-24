<?php
header('Access-Control-Allow-Origin: *');
include_once "model/ClientAppModel.php";

class ClientAppDAO extends ClientAppModel
{
    private $insert = "INSERT INTO Client_app (ca_name,ca_email,ca_date_birth,ca_sex,ca_pass,ca_cpf) VALUES ('%s','%s','%s','%s','%s','%s');",
            $select,
            $update = "UPDATE Client_app SET ca_name = '%s',ca_email = '%s', ca_date_birth = '%s',ca_sex = '%s', ca_pass = '%s',ca_cpf = '%s' WHERE ca_id = '%s'",
            $delete;

    public function insertCliApp($name,$email,$birth,$sex,$pass,$cpf)
    {
        $this->setCaName($name);
        $this->setCaEmail($email);
        $this->setCaDateBirth($birth);
        $this->setCaSex($sex);
        $this->setCaPass(md5($pass));
        $this->setCaCpf($cpf);

        $this->insert = sprintf
        (
            $this->insert, $this->getCaName(),
            $this->getCaEmail(),
            $this->getCaDateBirth(),
            $this->getCaSex(),
            $this->getCaPass(),
            $this->getCaCpf()
        );
        try 
        {
            $this->runQuery($this->insert);
            $sql = "SELECT ca_id FROM Client_app WHERE ca_cpf = '{$this->getCaCpf()}'";
	        $resp = $this->runSelect($sql);
            echo $resp[0]['ca_id'];
        } catch (Exception $e) 
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }

    public function updateCliApp($name,$email,$birth,$sex,$pass,$cpf,$ref)
    {
	    $this->setCaName($name);
        $this->setCaEmail($email);
        $this->setCaDateBirth($birth);
        $this->setCaSex($sex);
        $this->setCaPass(md5($pass));
        $this->setCaCpf($cpf);
	
    if(empty($pass))
    {

	    $this->update = "UPDATE Client_app SET ca_name = '%s',ca_email = '%s', ca_date_birth = '%s',ca_sex = '%s',ca_cpf = '%s' WHERE ca_id = '%s'";
        $this->update = sprintf
        (
            $this->update, 
            $this->getCaName(),
            $this->getCaEmail(),
            $this->getCaDateBirth(),
            $this->getCaSex(),
            $this->getCaCpf(),
            $ref
        );
    } else
    {
            $this->update = sprintf
            (
                $this->update, $this->getCaName(),
                $this->getCaEmail(),
                $this->getCaDateBirth(),
                $this->getCaSex(),
                $this->getCaPass(),
                $this->getCaCpf(),$ref
            );
	}
     try 
     {
            $this->runQuery($this->update);
            echo $this->update;
        } catch (Exception $e) 
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }

    public function cpfExists($cpf)
    {
        $this->setCaCpf($cpf);
        $sql = "SELECT COUNT(ca_id) FROM Client_app WHERE ca_cpf = '%s'";
        $sql = sprintf($sql,$this->getCaCpf());
        try 
        {
            $row = $this->runSelect($sql);

            if($row[0]['COUNT(ca_id)'] > 0)
            {
                echo 1;
            } else 
            {
                echo 0;
            }
        }catch(Exception $e) 
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }

   public function emailExists($email)
   {
        $this->setCaemail($email);
        $sql = "SELECT COUNT(ca_id) FROM Client_app WHERE ca_email = '%s'";
        $sql = sprintf($sql,$this->getCaemail());
        try 
        {
            $row = $this->runSelect($sql);

            if($row[0]['COUNT(ca_id)'] > 0)
            {
                echo 1;
            } else {
                echo 0;
            }
        }catch(Exception $e) 
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }

    public function clientAppForRef($ref,$json = 'on')
    {
        $sql = "SELECT * FROM Client_app WHERE ca_id = '%s'";
        $this->setCaId($ref);
        $sql = sprintf($sql,$this->getCaId());
        try 
        {
            $row = $this->runSelect($sql);

            if($json == 'on')
            {
                echo json_encode($row);
            }else
            {
                return $row;
            }

        }catch(Exception $e) 
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }

    public function appCliLog($email,$pass)
    {
        $sql = "SELECT ca_id FROM Client_app WHERE ca_email = '%s' AND ca_pass = '%s'";
        $this->setCaEmail($email);
        $this->setCaPass(md5($pass));
        $sql = sprintf($sql,$this->getCaEmail(),$this->getCaPass());
        try 
        {
            $row = $this->runSelect($sql);
            if(count($row) == 0)
            {
                echo "0";
            }else
            {
                echo $row[0]['ca_id'];
            }
        }catch(Exception $e) 
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }

    public function returnCpfForCliAppRef($ref)
    {
            $sql = "SELECT ca_cpf FROM Client_app WHERE ca_id = {$ref}";
        try 
        {
            $row = $this->runSelect($sql);
             return $row;
        }catch(Exception $e) 
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }
}
