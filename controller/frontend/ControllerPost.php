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
        $start = 0;
        $end = 3;

        if( isset($_GET['page']) && is_integer( (int)$_GET['page'] ) ){
            $page = $_GET['page'];


            if ( $page !== 1 ){

                $end = $page * 4;
                $start = $end - 4;

            }
        } else {
            $page = 1;
        }
        $navigation = $this->navigation($page);

        $posts = $this->postManager->getPosts($start, $end);
        $view = new View("frontend/listPosts");
        $view->generate(array('posts' => $posts , 'navigation' => $navigation));

    }

    public function post()
    {
        $post = $this->postManager->getPost($_GET['id']);
        $comments = $this->commentManager->getApprovedComments($_GET['id']);
        $view = new View("frontend/post");
        $view->generate(array('post' => $post, 'comments' => $comments));
    }

    public function writer()
    {
        $view = new View("frontend/writer");
        $view->generate(array());
    }

    public function chaptersList()
    {
//        $start = 0;
//        $end = ;
        $allPosts = $this->postManager->getAllPosts();
        $view = new View("frontend/chaptersList");
        $view->generate(array('allPosts' => $allPosts));
    }

    public function navigation($current_page)
    {

        $post_per_page = 5;
        $data['status'] = 'draft';

        $count_posts = $this->postManager->countPosts($data);


        $nav['next_page'] = 0;
        $nav['prev_page'] = 0;

        if ( $current_page == 1 && $count_posts['num_posts'] > $post_per_page ) {
            // Show next page
            $nav['next_page'] = 2;
        }

        if ( $current_page > 1 && $count_posts['num_posts'] > $post_per_page ) {

            if ( $count_posts['num_posts'] > $current_page * $post_per_page) {
                $nav['next_page'] = $current_page + 1;
            }
            $nav['prev_page'] = $current_page - 1;

        }


        return $nav;

    }

}