<?php
include_once 'dao/ConnectionFactory/ConnectionFactory.php';
class AwardsRescuedModel extends ConnectionFactory{

    private $ar_id,$ar_trade_ref,$ar_awards_ref,$ar_client_ref;

    /**
     * @return mixed
     */
    public function getArId()
    {
        return $this->ar_id;
    }

    /**
     * @param mixed $ar_id
     */
    public function setArId($ar_id)
    {
        $this->ar_id = $ar_id;
    }

    /**
     * @return mixed
     */
    public function getArTradeRef()
    {
        return $this->ar_trade_ref;
    }

    /**
     * @param mixed $ar_trade_ref
     */
    public function setArTradeRef($ar_trade_ref)
    {
        $this->ar_trade_ref = $ar_trade_ref;
    }

    /**
     * @return mixed
     */
    public function getArAwardsRef()
    {
        return $this->ar_awards_ref;
    }

    /**
     * @param mixed $ar_awards_ref
     */
    public function setArAwardsRef($ar_awards_ref)
    {
        $this->ar_awards_ref = $ar_awards_ref;
    }

    /**
     * @return mixed
     */
    public function getArClientRef()
    {
        return $this->ar_client_ref;
    }

    /**
     * @param mixed $ar_client_ref
     */
    public function setArClientRef($ar_client_ref)
    {
        $this->ar_client_ref = $ar_client_ref;
    }




}