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
                $this->statusComment();
            }

            if ( isset($_GET['status']) && $_GET['status'] === 'approved'){

                $comments = $this->commentManager->getCommentsByStatus('approved');

            }elseif ( isset($_GET['status']) && $_GET['status'] === 'rejected'){

                $comments = $this->commentManager->getCommentsByStatus('rejected');

            }elseif ( isset($_GET['status']) && $_GET['status'] === 'trash') {

                $comments = $this->commentManager->getCommentsByStatus('trash');

            }elseif ( isset($_GET['status']) && $_GET['status'] === 'all'){

                $comments = $this->commentManager->getAllComments();
            }elseif ( isset($_GET['status']) && $_GET['status'] === 'pending') {

                $comments = $this->commentManager->getCommentsByStatus('pending');
            }else{

                $comments = $this->commentManager->getAllComments();
            }

            $view = new View("backend/commentList");
            $view->generate(array('comments' => $comments), 'template_backend');

        } else {
            throw new Exception('Vous n avez pas acces à cette page!');
        }

    }

    public function statusComment()
    {

        if ( $_POST["operation"] === "approved" ){

            $this ->commentManager->setStatus($_GET['commentid'] , 'approved');

        }

        if ( $_POST["operation"] === "pending" ){

            $this ->commentManager->setStatus($_GET['postid'] , 'pending');

        }

        if ( $_POST["operation"] === "trash" ){

            $this ->commentManager->setStatus($_GET['commentid'] , 'trash');

        }

        if ( $_POST["operation"] === "delete" ){

            $this ->commentManager->Delete($_GET['commentid']);
        }
    }

    public function adminAnswer()
    {
        session_start();

        if ($this->ctrlConnect->isUserConnected()) {

        $comments = $this->commentManager->getCommentsById($_GET['commentid']);
        $view = new View("backend/answerComment");
        $view->generate(array('comments' => $comments),'template_backend');

        }else {
            throw new Exception('Vous n avez pas acces à cette page!');
        }

    }

    // A enlever
    function addComment($postId, $author, $comment)
    {

        $affectedLines = $this ->commentManager->postComment($postId, $author, $comment, 'approved');

        if ($affectedLines === false) {

            throw new Exception('Impossible d\'ajouter le commentaire !');

        } else {

            header('Location: index.php?action=post&id=' . $postId);

        }

    }

    function viewComment (){

        session_start();

        if ($this->ctrlConnect->isUserConnected()) {

            $comment = $this->commentManager->getCommentsById($_GET['comment_id']);

            $view = new View("backend/comment");

            $view->generate(array('comment' => $comment), 'template_backend');
        } else {
            
            throw new Exception('Vous n avez pas acces à cette page!');

        }

    }

}