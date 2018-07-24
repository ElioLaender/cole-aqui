<?php

include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class AwardsModel extends ConnectionFactory{

    private $awards_id,$awards_title,$awards_points,$awards_trade_ref;



    /**
     * @return mixed
     */
    public function getAwardsId()
    {
        return $this->awards_id;
    }

    /**
     * @param mixed $awards_id
     */
    public function setAwardsId($awards_id)
    {
        $this->awards_id = $awards_id;
    }

    /**
     * @return mixed
     */
    public function getAwardsTitle()
    {
        return $this->awards_title;
    }

    /**
     * @param mixed $awards_title
     */
    public function setAwardsTitle($awards_title)
    {
        $this->awards_title = $awards_title;
    }

    /**
     * @return mixed
     */
    public function getAwardsPoints()
    {
        return $this->awards_points;
    }

    /**
     * @param mixed $awards_points
     */
    public function setAwardsPoints($awards_points)
    {
        $this->awards_points = $awards_points;
    }

    /**
     * @return mixed
     */
    public function getAwardsTradeRef()
    {
        return $this->awards_trade_ref;
    }

    /**
     * @param mixed $awards_trade_ref
     */
    public function setAwardsTradeRef($awards_trade_ref)
    {
        $this->awards_trade_ref = $awards_trade_ref;
    }





}