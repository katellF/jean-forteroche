<?php

require_once "model/PostManager.php";
require_once('view/View.php');


class ControllerPost
{

    private $postManager;

    public function __construct()
    {
        $this->postManager = new PostManager();
    }

    public function listPosts()
    {
        $posts = $this->postManager->getPosts();

        $view = new View("listPosts");
        $view->generate(array('posts' => $posts));

    }

}