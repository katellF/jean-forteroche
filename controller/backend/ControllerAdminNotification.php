<?php

class ControllerAdminNotification
{
    private $ctrlConnect;
    private $commentManager;
    private $notificationManager;

    public function __construct(){

        $this->ctrlConnect = New ControllerConnect();
        $this->commentManager = new CommentManager();
        $this->notificationManager = new NotificationManager();

    }

    public function notificationList()
    {
        session_start();

        if ($this->ctrlConnect->isUserConnected()) {



            if ( isset($_POST) && !empty($_POST) && isset($_GET["notificationid"])) {
                $this->Status();
            }


            if ( isset($_GET['status']) && $_GET['status'] === 'archived'){

                $notifications = $this->notificationManager->getNotificationsByStatus('archived');

            }elseif ( isset($_GET['status']) && $_GET['status'] === 'all'){
                $notifications = $this->notificationManager->getAllNotifications();

            }else {
                $notifications = $this->notificationManager->getNotificationsByStatus('unread');


            }

            $view = new View("backend/notification");
            $view->generate(array('notifications' => $notifications));

        }
        else {
            throw new Exception('Vous n avez pas acces à cette page!');
        }

    }

    public function Status()
    {

        if ( $_POST["operation"] === "archived" ){

            $this ->notificationManager->setStatus($_GET['notificationid'] , 'archived');

        }

        if ( $_POST["operation"] === "delete" ){

            $this ->notificationManager->Delete($_GET['notificationid']);
        }
    }


}