<?php

class ControllerComment
{
    private $commentManager;


    public function __construct()
    {
        $this->UserConnect = new UserManager();
        $this->ctrlConnect = new ControllerConnect();
        $this->commentManager = new CommentManager();

    }

    public function addComment($postId, $author, $comment, $status = 'pending')
    {

        $affectedLines = $this->commentManager->postComment($postId, $author, $comment, $status , $source = 'frontend');

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');

        } else {

            if ($source == 'backend') {
                $sourceaction = '&source=backend';
            }

            header('Location: index.php?action=commentsent&postid=' . $postId . $sourceaction);
            $this->ctrlConnect->selectTemplate('frontend');

        }
    }

    public function commentSent()
    {
        session_start();

        $source = 'frontend';
        if ( isset($_GET['source']) && !empty($_GET['source'])) {
            $source = $_GET['source'];
        }

        if( $source == 'frontend' && $this->ctrlConnect->isUserConnected() ){

            $view = new View("frontend/commentSent");
            $view->generate(array(),"template_connect");
        }
        if( $source == 'frontend' && !$this->ctrlConnect->isUserConnected() ){

            $view = new View("frontend/commentSent");
            $view->generate(array());
        }
        if( $source == 'backend' && $this->ctrlConnect->isUserConnected() ){

            $view = new View("backend/commentAdminSent");
            $view->generate(array(),"template_backend");
        }
    }
}
