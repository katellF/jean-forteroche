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
        $notification = $this->notificationManager->getNotifications($_GET['id']);
        $comments = $this->commentManager->getComments($_GET['id']);
        $view = new View("notification");
        $view->generate(array('notification' => $notification,'comments' => $comments));
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