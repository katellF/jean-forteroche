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

       // var_dump($_POST);

        if (isset ($_POST) && !empty($_POST)) {

          //  var_dump('ADD NOTIFICATION!!!');
            $this->addNotification();

        } else {

            $view = new View("notification");
            //  $view->generate(array('notification' => $notification,'comments' => $comments));
            $view->generate(array());

        }
    }

    public function addNotification()
    {
        // var_dump($_POST);
        $notificationManager = new NotificationManager();
        $content = $notificationManager->insertNotification($_GET['commentid'], $_POST['email'], $_POST['reason'], $_POST['content']);
        $view = new View("notification");
        $view->generate(array("data" => $content));
        echo "Ca marche";

    }
}