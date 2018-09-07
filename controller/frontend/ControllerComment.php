<?php

class ControllerComment
{
    function addComment($postId, $author, $comment)
    {
        $commentManager = new CommentManager();

        $affectedLines = $commentManager->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
        else {
          header('Location: index.php?action=post&id=' . $postId);
          // header('Location: index.php?action=moderation');
        }
    }

}