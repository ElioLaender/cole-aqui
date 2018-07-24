<?php

include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class ClientAppModel extends ConnectionFactory{


    private $ca_id,$ca_name,$ca_email,$ca_date_birth,$ca_sex,$ca_pass,$ca_cpf;

    /**
     * @return mixed
     */
    public function getCaCpf()
    {
        return $this->ca_cpf;
    }

    /**
     * @param mixed $ca_cpf
     */
    public function setCaCpf($ca_cpf)
    {
        $this->ca_cpf = $ca_cpf;
    }

    /**
     * @return mixed
     */
    public function getCaId()
    {
        return $this->ca_id;
    }

    /**
     * @param mixed $ca_id
     */
    public function setCaId($ca_id)
    {
        $this->ca_id = $ca_id;
    }

    /**
     * @return mixed
     */
    public function getCaName()
    {
        return $this->ca_name;
    }

    /**
     * @param mixed $ca_name
     */
    public function setCaName($ca_name)
    {
        $this->ca_name = $ca_name;
    }

    /**
     * @return mixed
     */
    public function getCaDateBirth()
    {
        return $this->ca_date_birth;
    }

    /**
     * @param mixed $ca_date_birth
     */
    public function setCaDateBirth($ca_date_birth)
    {
        $this->ca_date_birth = $ca_date_birth;
    }

    /**
     * @return mixed
     */
    public function getCaEmail()
    {
        return $this->ca_email;
    }

    /**
     * @param mixed $ca_email
     */
    public function setCaEmail($ca_email)
    {
        $this->ca_email = $ca_email;
    }

    /**
     * @return mixed
     */
    public function getCaSex()
    {
        return $this->ca_sex;
    }

    /**
     * @param mixed $ca_sex
     */
    public function setCaSex($ca_sex)
    {
        $this->ca_sex = $ca_sex;
    }

    /**
     * @return mixed
     */
    public function getCaPass()
    {
        return $this->ca_pass;
    }

    /**
     * @param mixed $ca_pass
     */
    public function setCaPass($ca_pass)
    {
        $this->ca_pass = $ca_pass;
    }




}
