<?php

class ControllerPost
{

    private $postManager;
    private $commentManager;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();

    }

    public function listPosts()
    {
        $posts = $this->postManager->getPosts();

        $view = new View("frontend/listPosts");
        $view->generate(array('posts' => $posts));
    }

    public function post()
    {
        $post = $this->postManager->getPost($_GET['id']);
        $comments = $this->commentManager->getApprovedComments($_GET['id']);
        $view = new View("frontend/post");
        $view->generate(array('post' => $post, 'comments' => $comments));
    }
}