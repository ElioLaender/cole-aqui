<?php
include_once 'dao/ConnectionFactory/ConnectionFactory.php';
class ReleasesModel extends ConnectionFactory{

    private $releases_id,$releases_value,$releases_description,$releases_accession,$releases_trade_client_ref,$releases_confirm,$releases_trade_ref,$releases_value_points;

    /**
     * @return mixed
     */
    public function getReleasesValuePoints()
    {
        return $this->releases_value_points;
    }

    /**
     * @param mixed $releases_value_points
     */
    public function setReleasesValuePoints($releases_value_points)
    {
        $this->releases_value_points = $releases_value_points;
    }

    /**
     * @return mixed
     */
    public function getReleasesTradeRef()
    {
        return $this->releases_trade_ref;
    }

    /**
     * @param mixed $releases_trade_ref
     */
    public function setReleasesTradeRef($releases_trade_ref)
    {
        $this->releases_trade_ref = $releases_trade_ref;
    }

    /**
     * @return mixed
     */
    public function getReleasesId()
    {
        return $this->releases_id;
    }

    /**
     * @param mixed $releases_id
     */
    public function setReleasesId($releases_id)
    {
        $this->releases_id = $releases_id;
    }

    /**
     * @return mixed
     */
    public function getReleasesValue()
    {
        return $this->releases_value;
    }

    /**
     * @param mixed $releases_value
     */
    public function setReleasesValue($releases_value)
    {
        $this->releases_value = $releases_value;
    }

    /**
     * @return mixed
     */
    public function getReleasesDescription()
    {
        return $this->releases_description;
    }

    /**
     * @param mixed $releases_description
     */
    public function setReleasesDescription($releases_description)
    {
        $this->releases_description = $releases_description;
    }

    /**
     * @return mixed
     */
    public function getReleasesAccession()
    {
        return $this->releases_accession;
    }

    /**
     * @param mixed $releases_accession
     */
    public function setReleasesAccession($releases_accession)
    {
        $this->releases_accession = $releases_accession;
    }

    /**
     * @return mixed
     */
    public function getReleasesConfirm()
    {
        return $this->releases_confirm;
    }

    /**
     * @param mixed $releases_confirm
     */
    public function setReleasesConfirm($releases_confirm)
    {
        $this->releases_confirm = $releases_confirm;
    }

    /**
     * @return mixed
     */
    public function getReleasesTradeClientRef()
    {
        return $this->releases_trade_client_ref;
    }

    /**
     * @param mixed $releases_trade_client_ref
     */
    public function setReleasesTradeClientRef($releases_trade_client_ref)
    {
        $this->releases_trade_client_ref = $releases_trade_client_ref;
    }




}