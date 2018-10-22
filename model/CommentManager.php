<?php


class CommentManager extends Manager
{
    public function getApprovedComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id=:post_id AND status=\'approved\' ORDER BY comment_date DESC');
        $comments->execute(array('post_id'=> $postId));

        return $comments;
    }

    public function getCommentsById($commentId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, post_id, status, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id=:id AND status=\'approved\' ORDER BY comment_date DESC');
        $comments->execute(array('id'=> $commentId));

        return $comments;
    }


    public function getAllComments()
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, status, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments  ORDER BY comment_date DESC');
        $comments->execute(array());

        return $comments;
    }

    public function getCommentsByStatus($status)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, status, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE status=:status ORDER BY comment_date DESC');
        $comments->execute(array('status' => $status));

        return $comments;
    }


    public function setStatus($commentId , $status)
    {
        $db = $this->dbConnect();
        $updateStatus = $db->prepare('UPDATE comments SET  status=:status WHERE  id=:id ');
        $modifyStatus = $updateStatus->execute(array('id' => $commentId  , 'status' => $status  ));

        return $modifyStatus;
    }

    public function delete($commentId)
    {
        $db = $this->dbConnect();
        $deleteComment = $db->prepare('DELETE FROM comments WHERE  id=:id ');

        return $deleteComment->execute(array('id' => $commentId ));

    }

    public function postComment($postId, $author, $comment, $status = 'pending')
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, status, comment_date) VALUES(?, ?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment, $status));

        return $affectedLines;
    }

    public function getCountComment($argsComment)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT count(id) AS num_pendingComments FROM comments WHERE status = :status');
        $req->execute(array('status' => $argsComment['status']));
        $countNotifications = $req->fetch();

        return $countNotifications;
    }

}