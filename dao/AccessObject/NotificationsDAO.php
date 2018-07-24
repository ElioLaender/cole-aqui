<?php

include_once 'config/AutoLoadConfig.php';

class NotificationsDAO extends NotificationsModel
{
    private $insert = "INSERT INTO Notifications (notifications_title,notifications_description,notifications_trade_ref,notifications_url) VALUES ('%s','%s','%s','%s');",
            $select = "SELECT * FROM Notifications WHERE notifications_view = 'Nova' AND notifications_trade_ref = '%s'",
            $update = "UPDATE Notifications SET notifications_view = 'Visualizada' WHERE notifications_id = '%s' AND notifications_trade_ref = '%s'",
            $delete;

    public function insertNotifications($title,$description,$tradeRef,$url)
    {
        $this->setNotificationsTitle($title);
        $this->setNotificationsDescription($description);
        $this->setNotificationsTradeRef($tradeRef);
        $this->setNotificationsUrl($url);

        $this->insert = sprintf
        (
            $this->insert, $this->getNotificationsTitle(),
            $this->getNotificationsDescription(),
            $this->getNotificationsTradeRef(),
            $this->getNotificationsUrl()
        );
        try 
        {
            $this->runQuery($this->insert);
        } catch (Exception $e) {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }

    public function selectNotifications($tradeRef)
    {
        $this->setNotificationsTradeRef($tradeRef);
        $this->select = sprintf($this->select,$this->getNotificationsTradeRef());
        try 
        {
            $row = $this->runSelect($this->select);
	        header('Access-Control-Allow-Origin: *');
            echo json_encode($row);
        } catch (Exception $e) 
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }

    public function updateNotifications($noRef,$tradeRef)
    {
        $this->setNotificationsId($noRef);
        $this->setNotificationsTradeRef($tradeRef);
        $this->update = sprintf($this->update,$this->getNotificationsId(),$this->getNotificationsTradeRef());

        try 
        {
            $this->runQuery($this->update);
        } catch (Exception $e) 
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }

    public function allNotiForTrade($tradeRef)
    {
        $sql = "SELECT * FROM Notifications WHERE notifications_trade_ref = $tradeRef";
        try 
        {
            $row = $this->runSelect($sql);
	        header('Access-Control-Allow-Origin: *');
            echo json_encode($row);
        } catch (Exception $e) 
        {
            echo 'Error: ', $e->getMessage(), "\n";
        }
    }
}
