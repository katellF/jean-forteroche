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


            if ( isset($_POST) && !empty($_POST) && isset($_GET["commentid"])) {
                $this->Status();
            }

            $comments = $this->commentManager->getAllComments();

            $view = new View("backend/moderation");
            $view->generate(array('comments' => $comments));

        } else {
            throw new Exception('Vous n avez pas acces à cette page!');
        }

    }

    public function Status()
    {

        if ( $_POST["operation"] === "approved" ){

            $this ->commentManager->setStatus($_GET['commentid'] , 'approved');

        }


        if ( $_POST["operation"] === "rejected" ){

            $this ->commentManager->setStatus($_GET['commentid'] , 'rejected');

        }

    }
}