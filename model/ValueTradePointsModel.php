<?php
include_once 'dao/ConnectionFactory/ConnectionFactory.php';
class ValueTradePointsModel extends ConnectionFactory{

    private $vtp_id,$vtp_value_points,$vtp_trade_id;

    /**
     * @return mixed
     */
    public function getVtpId()
    {
        return $this->vtp_id;
    }

    /**
     * @param mixed $vtp_id
     */
    public function setVtpId($vtp_id)
    {
        $this->vtp_id = $vtp_id;
    }

    /**
     * @return mixed
     */
    public function getVtpValuePoints()
    {
        return $this->vtp_value_points;
    }

    /**
     * @param mixed $vtp_value_points
     */
    public function setVtpValuePoints($vtp_value_points)
    {
        $this->vtp_value_points = $vtp_value_points;
    }

    /**
     * @return mixed
     */
    public function getVtpTradeId()
    {
        return $this->vtp_trade_id;
    }

    /**
     * @param mixed $vtp_trade_id
     */
    public function setVtpTradeId($vtp_trade_id)
    {
        $this->vtp_trade_id = $vtp_trade_id;
    }







}