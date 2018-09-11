<?php

class ControllerNotification
{
    public function __construct()
    {
        $this->notificationManager = new NotificationManager();
        $this->commentManager = new CommentManager();
    }



    public function notification()
    {
        if (isset ($_POST) && !empty($_POST)) {
            if (!empty($_POST['email']) && !empty($_POST['reason'])) {
                $this->addNotification();

            }else {

                throw new Exception('Tous les champs ne sont pas remplis !');}

        } else {

            $view = new View("notification");
            $view->generate(array());

        }
    }

    public function addNotification()
    {
        $notificationManager = new NotificationManager();
        $content = $notificationManager->insertNotification($_GET['commentid'], $_POST['email'], $_POST['reason'], $_POST['content']);
        $view = new View("notification");
        $view->generate(array("data" => $content));
    }

}