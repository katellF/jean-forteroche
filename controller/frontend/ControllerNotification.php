<?php

class ControllerNotification
{
    public function __construct()
    {
        $this->notificationManager = new NotificationManager();
        $this->commentManager = new CommentManager();
        $this->ctrlConnect = new ControllerConnect();
    }


    public function notification()
    {

        session_start();
        if ($this->ctrlConnect->isUserConnected()) {
            if (isset ($_POST) && !empty($_POST)) {
                if (!empty($_POST['email']) && !empty($_POST['reason'])) {

                    $errorCounter = 0;

                    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {

                        echo 'ecriture email fausse';
                        $errorCounter++;
                    }

                    if ($errorCounter === 0) {
                        $this->addNotification();
                    }
                } else {

                    throw new Exception('Tous les champs ne sont pas remplis !');
                }

            } else {

                $view = new View("frontend/notification");
                $view->generate(array(), 'template_connect');
            }
        } else {
            if (isset ($_POST) && !empty($_POST)) {
                if (!empty($_POST['email']) && !empty($_POST['reason'])) {

                    $errorCounter = 0;

                    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {

                        echo 'ecriture email fausse';
                        $errorCounter++;
                    }


                    if ($errorCounter === 0) {
                        $this->addNotification();
                    }

                } else {

                    throw new Exception('Tous les champs ne sont pas remplis !');
                }

            } else {

                $view = new View("frontend/notification");
                $view->generate(array());

            }

        }
    }


    public function addNotification()
    {
        $content = $this->notificationManager->insertNotification($_GET['commentid'], $_POST['reason'], $_POST['content'], $_POST['email']);

        if ($this->ctrlConnect->isUserConnected()) {

            $view = new View("frontend/notification");
            $view->generate(array("data" => $content), 'template_connect');

        } else {

            $view = new View("frontend/notification");
            $view->generate(array("data" => $content));
        }
    }

}