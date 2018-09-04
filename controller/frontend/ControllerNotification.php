<?php

class ControllerNotification
{
    public function __construct()
    {
        $this->notificationManager = new NotificationManager();
        $this->commentManager = new CommentManager();
    }

//    public function listPosts()
//    {
//        $posts = $this->postManager->getPosts();
//
//        $view = new View("listPosts");
//        $view->generate(array('posts' => $posts));
//    }

    public function notification()
    {

        var_dump($_POST);

        if (isset ($_POST) && !empty($_POST)) {

            var_dump('ADD NOTIFICATION!!!');
            $this->addNotification();

        } else {

            $view = new View("notification");
            //  $view->generate(array('notification' => $notification,'comments' => $comments));
            $view->generate(array());

        }


//     //   $notification = $this->notificationManager->getNotifications($_GET['commentid']);
//     //  $comments = $this->commentManager->getComments($_GET['commentid']);
//        $view = new View("notification");
//      //  $view->generate(array('notification' => $notification,'comments' => $comments));
//        $view->generate(array());
    }

    public function addNotification()
    {
//        session_start();

        //var_dump($_POST);
        $notificationManager = new NotificationManager();
        $content = $notificationManager->insertNotification($_GET['commentid'], $_POST['email'], $_POST['reason'], $_POST['content']);
        $view = new View("notification");
        $view->generate(array("data" => $content));
        echo "Ca marche";

    }




//    function addNotification($commentId, $content, $notificationReason)
//    {
//       // $notificationManager = new NotificationManager();
//
//
//        $affectedLines =  $this->notificationManager->postNotification($commentId, $content, $notificationReason);
//
////        if ($affectedLines === false) {
////            throw new Exception('Impossible d\'envoyer le formulaire de notification !');
////        }
////        else {
////            header('Location: index.php?action=post&id=' . $commentId);
////        }
//    }
}