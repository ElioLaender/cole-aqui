<?php

include_once 'dao/ConnectionFactory/ConnectionFactory.php';

class NotificationsModel extends ConnectionFactory{

    private $notifications_id,$notifications_title,$notifications_description,$notifications_data,$notifications_trade_ref,$notifications_view,$notifications_url;

    /**
     * @return mixed
     */
    public function getNotificationsId()
    {
        return $this->notifications_id;
    }

    /**
     * @param mixed $notifications_id
     */
    public function setNotificationsId($notifications_id)
    {
        $this->notifications_id = $notifications_id;
    }

    /**
     * @return mixed
     */
    public function getNotificationsTitle()
    {
        return $this->notifications_title;
    }

    /**
     * @param mixed $notifications_title
     */
    public function setNotificationsTitle($notifications_title)
    {
        $this->notifications_title = $notifications_title;
    }

    /**
     * @return mixed
     */
    public function getNotificationsDescription()
    {
        return $this->notifications_description;
    }

    /**
     * @param mixed $notifications_description
     */
    public function setNotificationsDescription($notifications_description)
    {
        $this->notifications_description = $notifications_description;
    }

    /**
     * @return mixed
     */
    public function getNotificationsData()
    {
        return $this->notifications_data;
    }

    /**
     * @param mixed $notifications_data
     */
    public function setNotificationsData($notifications_data)
    {
        $this->notifications_data = $notifications_data;
    }

    /**
     * @return mixed
     */
    public function getNotificationsTradeRef()
    {
        return $this->notifications_trade_ref;
    }

    /**
     * @param mixed $notifications_trade_ref
     */
    public function setNotificationsTradeRef($notifications_trade_ref)
    {
        $this->notifications_trade_ref = $notifications_trade_ref;
    }

    /**
     * @return mixed
     */
    public function getNotificationsView()
    {
        return $this->notifications_view;
    }

    /**
     * @param mixed $notifications_view
     */
    public function setNotificationsView($notifications_view)
    {
        $this->notifications_view = $notifications_view;
    }

    /**
     * @return mixed
     */
    public function getNotificationsUrl()
    {
        return $this->notifications_url;
    }

    /**
     * @param mixed $notifications_url
     */
    public function setNotificationsUrl($notifications_url)
    {
        $this->notifications_url = $notifications_url;
    }

}