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

        $affectedLines = $this->commentManager->postComment($postId, $author, $comment , $status);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
        else {

          header('Location: index.php?action=commentSent&postid='.$postId);

        }
    }

    public function commentSent()
    {
        if ($this->ctrlConnect->isUserConnected()) {
        $view = new View("frontend/commentSent");
        $view->generate(array(),"template_connect");
    }else{
            $view = new View("frontend/commentSent");
            $view->generate(array(),"template_connect");
        }

    }


}
