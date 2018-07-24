<?php
include_once 'dao/ConnectionFactory/ConnectionFactory.php';
class TradeUsersModel extends ConnectionFactory{

    private $tu_id,$tu_name,$tu_email,$tu_trade_ref,$tu_pass;

    /**
     * @return mixed
     */
    public function getTuId()
    {
        return $this->tu_id;
    }

    /**
     * @param mixed $tu_id
     */
    public function setTuId($tu_id)
    {
        $this->tu_id = $tu_id;
    }

    /**
     * @return mixed
     */
    public function getTuName()
    {
        return $this->tu_name;
    }

    /**
     * @param mixed $tu_name
     */
    public function setTuName($tu_name)
    {
        $this->tu_name = $tu_name;
    }

    /**
     * @return mixed
     */
    public function getTuEmail()
    {
        return $this->tu_email;
    }

    /**
     * @param mixed $tu_email
     */
    public function setTuEmail($tu_email)
    {
        $this->tu_email = $tu_email;
    }

    /**
     * @return mixed
     */
    public function getTuTradeRef()
    {
        return $this->tu_trade_ref;
    }

    /**
     * @param mixed $tu_trade_ref
     */
    public function setTuTradeRef($tu_trade_ref)
    {
        $this->tu_trade_ref = $tu_trade_ref;
    }

    /**
     * @return mixed
     */
    public function getTuPass()
    {
        return $this->tu_pass;
    }

    /**
     * @param mixed $tu_pass
     */
    public function setTuPass($tu_pass = '')
    {
        $this->tu_pass = $tu_pass;
    }





}