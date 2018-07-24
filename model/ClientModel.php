<?php
include_once 'dao/ConnectionFactory/ConnectionFactory.php';
class ClientModel extends ConnectionFactory{

    private $client_id,$client_name,$client_phone,$client_sex,$client_cpf,$client_email,$client_trade_ref,$client_points;

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * @param mixed $client_id
     */
    public function setClientId($client_id)
    {
        $this->client_id = $client_id;
    }

    /**
     * @return mixed
     */
    public function getClientName()
    {
        return $this->client_name;
    }

    /**
     * @param mixed $client_name
     */
    public function setClientName($client_name)
    {
        $this->client_name = $client_name;
    }

    /**
     * @return mixed
     */
    public function getClientPhone()
    {
        return $this->client_phone;
    }

    /**
     * @param mixed $client_phone
     */
    public function setClientPhone($client_phone)
    {
        $this->client_phone = $client_phone;
    }

    /**
     * @return mixed
     */
    public function getClientSex()
    {
        return $this->client_sex;
    }

    /**
     * @param mixed $client_sex
     */
    public function setClientSex($client_sex)
    {
        $this->client_sex = $client_sex;
    }

    /**
     * @return mixed
     */
    public function getClientCpf()
    {
        return $this->client_cpf;
    }

    /**
     * @param mixed $client_cpf
     */
    public function setClientCpf($client_cpf)
    {
        $this->client_cpf = $client_cpf;
    }

    /**
     * @return mixed
     */
    public function getClientEmail()
    {
        return $this->client_email;
    }

    /**
     * @param mixed $client_email
     */
    public function setClientEmail($client_email)
    {
        $this->client_email = $client_email;
    }

    /**
     * @return mixed
     */
    public function getClientTradeRef()
    {
        return $this->client_trade_ref;
    }

    /**
     * @param mixed $client_trade_ref
     */
    public function setClientTradeRef($client_trade_ref)
    {
        $this->client_trade_ref = $client_trade_ref;
    }

    /**
     * @return mixed
     */
    public function getClientPoints()
    {
        return $this->client_points;
    }

    /**
     * @param mixed $client_points
     */
    public function setClientPoints($client_points)
    {
        $this->client_points = $client_points;
    }



}