<?php

class ControllerNotification
{
    function addNotification($postId, $author, $comment)
    {
        $notificationManager = new CommentManager();

        $affectedLines = $notificationManager->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }
}