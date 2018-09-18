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

            if ( isset($_GET['status']) && $_GET['status'] === 'approved'){

                $comments = $this->commentManager->getCommentsByStatus('approved');

            }elseif ( isset($_GET['status']) && $_GET['status'] === 'rejected'){

                $comments = $this->commentManager->getCommentsByStatus('rejected');

            }elseif ( isset($_GET['status']) && $_GET['status'] === 'all'){

            $comments = $this->commentManager->getAllComments();
            }else {

                $comments = $this->commentManager->getCommentsByStatus('pending');
            }

            $view = new View("backend/moderation");
            $view->generate(array('comments' => $comments), 'template_backend');

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

        if ( $_POST["operation"] === "delete" ){

            $this ->commentManager->Delete($_GET['commentid']);
        }
    }


}