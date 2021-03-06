<?php

class ControllerPost
{

    private $postManager;
    private $commentManager;
    private $ctrlConnect;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
        $this->ctrlConnect = new ControllerConnect();

    }

    public function listPosts()
    {

        session_start();
        $start = 0;
        $end = 3;
        $per_page = 3;

        if (isset($_GET['page']) && is_integer((int)$_GET['page'])) {
            $page = $_GET['page'];


            if ($page !== 1) {

                $end = $per_page;
                $start = $per_page * ($page - 1);

            }

        } else {
            $page = 1;
        }

        $navigation = $this->navigation($page);
        $posts = $this->postManager->getPublishedPosts($start, $end);


        if ($this->ctrlConnect->isUserConnected()) {

            $view = new View("frontend/listPosts");
            $view->generate(array('posts' => $posts, 'navigation' => $navigation), 'template_connect');

        } else {

            $view = new View("frontend/listPosts");
            $view->generate(array('posts' => $posts, 'navigation' => $navigation));

        }

    }

    public function post()
    {
        session_start();
        if ($this->ctrlConnect->isUserConnected()) {

            $post = $this->postManager->getPublishedPost($_GET['postid']);
            $comments = $this->commentManager->getApprovedComments($_GET['postid']);
            $view = new View("frontend/post");
            $view->generate(array('post' => $post, 'comments' => $comments), 'template_connect');

        } else {

            $post = $this->postManager->getPublishedPost($_GET['postid']);
            $comments = $this->commentManager->getApprovedComments($_GET['postid']);
            $view = new View("frontend/post");
            $view->generate(array('post' => $post, 'comments' => $comments));

        }

    }

    public function lastPost()
    {
        session_start();

        var_dump($this->ctrlConnect->isUserConnected());

        if ($this->ctrlConnect->isUserConnected()) {
            $post = $this->postManager->getLastPost();
            $comments = $this->commentManager->getApprovedComments($post['id']);
            $view = new View("frontend/post");
            $view->generate(array('post' => $post, 'comments' => $comments), "template_connect");

        } else {

            $post = $this->postManager->getLastPost();
            $comments = $this->commentManager->getApprovedComments($post['id']);
            $view = new View("frontend/post");
            $view->generate(array('post' => $post, 'comments' => $comments));
        }
    }

    public function writer()
    {
        session_start();
        if ($this->ctrlConnect->isUserConnected()) {

            $view = new View("frontend/writer");
            $view->generate(array(), "template_connect");
        } else {

            $view = new View("frontend/writer");
            $view->generate(array());
        }
    }

    public function home()
    {
        session_start();

        if ($this->ctrlConnect->isUserConnected()) {

            $view = new View("frontend/home");
            $view->generate(array(), "template_connect");

        } else {

            $view = new View("frontend/home");
            $view->generate(array());
        }
    }

    public function navigation($current_page, $status = 'published')
    {
        $post_per_page = 3;
        $data['status'] = $status;

        $count_posts = $this->postManager->countPosts($data);


        $nav['next_page'] = 0;
        $nav['prev_page'] = 0;

        if ($current_page == 1 && $count_posts['num_posts'] > $post_per_page) {

            $nav['next_page'] = 2;
        }

        if ($current_page > 1) {

            $nav['prev_page'] = $current_page - 1;

            if ($count_posts['num_posts'] > $current_page * $post_per_page) {
                $nav['next_page'] = $current_page + 1;
            }
        }

        return $nav;
    }
}