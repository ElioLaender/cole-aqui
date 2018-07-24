<?php
include_once 'dao/ConnectionFactory/ConnectionFactory.php';


class TradeModel extends ConnectionFactory{

    private $trade_id,
            $trade_name,
            $trade_accession,
            $trade_image,
            $trade_cnpj,
            $trade_boxes,
            $trade_phone,
            $trade_address,
            $trade_complement,
            $trade_district,
            $trade_city,
            $trade_state;

    /**
     * @return mixed
     */
    public function getTradeState()
    {
        return $this->trade_state;
    }

    /**
     * @param mixed $trade_state
     */
    public function setTradeState($trade_state)
    {
        $this->trade_state = $trade_state;
    }

    /**
     * @return mixed
     */
    public function getTradeCity()
    {
        return $this->trade_city;
    }

    /**
     * @param mixed $trade_city
     */
    public function setTradeCity($trade_city)
    {
        $this->trade_city = $trade_city;
    }

    /**
     * @return mixed
     */
    public function getTradeDistrict()
    {
        return $this->trade_district;
    }

    /**
     * @param mixed $trade_district
     */
    public function setTradeDistrict($trade_district)
    {
        $this->trade_district = $trade_district;
    }

    /**
     * @return mixed
     */
    public function getTradeComplement()
    {
        return $this->trade_complement;
    }

    /**
     * @param mixed $trade_complement
     */
    public function setTradeComplement($trade_complement)
    {
        $this->trade_complement = $trade_complement;
    }

    /**
     * @return mixed
     */
    public function getTradeAddress()
    {
        return $this->trade_address;
    }

    /**
     * @param mixed $trade_address
     */
    public function setTradeAddress($trade_address)
    {
        $this->trade_address = $trade_address;
    }

    /**
     * @return mixed
     */
    public function getTradePhone()
    {
        return $this->trade_phone;
    }

    /**
     * @param mixed $trade_phone
     */
    public function setTradePhone($trade_phone)
    {
        $this->trade_phone = $trade_phone;
    }

    /**
     * @return mixed
     */
    public function getTradeCnpj()
    {
        return $this->trade_cnpj;
    }

    /**
     * @param mixed $trade_cnpj
     */
    public function setTradeCnpj($trade_cnpj)
    {
        $this->trade_cnpj = $trade_cnpj;
    }


    /**
     * @return mixed
     */
    public function getTradeBoxes()
    {
        return $this->trade_boxes;
    }

    /**
     * @param mixed $trade_boxes
     */
    public function setTradeBoxes($trade_boxes)
    {
        $this->trade_boxes = $trade_boxes;
    }

    /**
     * @return mixed
     */
    public function getTradeId()
    {
        return $this->trade_id;
    }

    /**
     * @param mixed $trade_id
     */
    public function setTradeId($trade_id)
    {
        $this->trade_id = $trade_id;
    }

    /**
     * @return mixed
     */
    public function getTradeName()
    {
        return $this->trade_name;
    }

    /**
     * @param mixed $trade_name
     */
    public function setTradeName($trade_name)
    {
        $this->trade_name = $trade_name;
    }

    /**
     * @return mixed
     */
    public function getTradeAccession()
    {
        return $this->trade_accession;
    }

    /**
     * @param mixed $trade_accession
     */
    public function setTradeAccession($trade_accession)
    {
        $this->trade_accession = $trade_accession;
    }

    /**
     * @return mixed
     */
    public function getTradeImage()
    {
        return $this->trade_image;
    }

    /**
     * @param mixed $trade_image
     */
    public function setTradeImage($trade_image)
    {
        $this->trade_image = $trade_image;
    }





}