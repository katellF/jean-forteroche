<?php


class PostManager extends Manager
{
    public function getPosts()
   {
        $db = $this->dbConnect();
       $req = $db->query('SELECT id, title, status, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date');
       $req->execute(array());
       return $req;
   }

    public function getPublishedPosts($start, $end)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare(' SELECT id, title, content,status, DATE_FORMAT(creation_date, \' % d /%m /%Y à % Hh % imin % ss\') AS creation_date_fr FROM posts WHERE status=\'published\' ORDER BY creation_date LIMIT '. $start.','. $end.' ');
        $comments->execute(array());

        return $comments;
    }

    public function getLastPost()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, status, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC  LIMIT 1' );
        $post = $req->fetch();
        return $post;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, status, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function getPublishedPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, status, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ? AND status =\'published\' ');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function getPostsByStatus($status)
    {
        $db = $this->dbConnect();
        $posts = $db->prepare('SELECT id, title, content,status, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE status=:status ORDER BY creation_date DESC');
        $posts->execute(array('status' => $status));

        return $posts;
    }

    public function insertPost($data)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('INSERT INTO posts ( title, content, creation_date ) VALUES ( :title, :content, NOW() )');

        $post->execute(array(
            'title' => $data['title'],
            'content' => $data['content'],
        ));

        return $db->lastInsertId();
    }

    public function countPosts($data)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT count(id) AS num_posts FROM posts WHERE status =:status');
        $req->execute(array(
            'status' => $data['status']));
        $post = $req->fetch();

        return $post;
    }

    public function setStatus($postId , $status)
    {
        $db = $this->dbConnect();
        $updateStatus = $db->prepare('UPDATE posts SET  status=:status WHERE  id=:id ');
        $modifyStatus = $updateStatus->execute(array('id' => $postId  , 'status' => $status  ));

        return $modifyStatus;
    }



    public function updatePost($postId , $data)
    {
        $db = $this->dbConnect();
        $updateStatus = $db->prepare('UPDATE posts SET  title=:title , content=:content, status=:status WHERE  id=:id ');
        $modifyStatus = $updateStatus->execute(array('id' => $postId  , 'title' => $data['title'] , 'content'=>$data['content'], 'status'=>$data['status'] ));

        return $modifyStatus;
    }


    public function delete($postId)
    {
        $db = $this->dbConnect();
        $deleteComment = $db->prepare('DELETE FROM posts WHERE  id=:id ');

        return $deleteComment->execute(array('id' => $postId ));

    }


}