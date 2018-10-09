<?php

class ControllerComment
{
    function addComment($postId, $author, $comment, $status = 'pending')
    {
        $commentManager = new CommentManager();

        $affectedLines = $commentManager->postComment($postId, $author, $comment , $status);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
        else {
          header('Location: index.php?action=post&id=' . $postId);

        }
    }

}