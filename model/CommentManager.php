<?php


class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id=:post_id AND status=\'pending\' ORDER BY comment_date DESC');
        $comments->execute(array('post_id'=> $postId));

        return $comments;
    }

    public function getAllComments()
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment,status, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments  ORDER BY comment_date DESC');
        $comments->execute(array());

        return $comments;
    }

    public function getCommentsByStatus($status)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment,status, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE status=:status ORDER BY comment_date DESC');
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

    public function Delete($commentId)
    {
        $db = $this->dbConnect();
        $deleteComment = $db->prepare('DELETE FROM comments WHERE  id=:id ');

        return $deleteComment->execute(array('id' => $commentId ));

    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }



//    public function getCommentByPostId ( $post_id ) {
//
//    }
//
//    public function getAllComments ( ) {
//
//    }
//
//    public function getAllCommentsByStatus ( $status ) {
//
//    }



}