<?php

class ControllerAdminComment
{
    private $ctrlConnect;
    private $commentManager;

    public function __construct(){

        $this->ctrlConnect = New ControllerConnect();
        $this->commentManager = new CommentManager();
    }

    public function commentList()
    {
        session_start();

        if ($this->ctrlConnect->isUserConnected()) {

            $comments = $this->commentManager->getAllComments();

            $view = new View("backend/moderation");
            $view->generate(array('comments' => $comments));

        } else {
            throw new Exception('Vous n avez pas acces à cette page!');
        }



    }

    public function getStatus()
    {



    }
}