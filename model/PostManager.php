<?php


class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, status, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, status, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function insertPost($data)
    {

       // var_dump($data);
        $db = $this->dbConnect();
        $post = $db->prepare('INSERT INTO posts( title, content, creation_date) VALUES ( :title, :content, NOW())');
        $post->execute(array(
            'title' => $data['title'],
            'content' => $data['content'],
        ));

        return $db->lastInsertId();
    }



}