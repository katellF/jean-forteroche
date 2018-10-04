<?php

class ControllerAdminPost
{
    private $postManager;
    private $ctrlConnect;


    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->ctrlConnect = new ControllerConnect();
    }

    public function addPost()
    {
        session_start();

        if ($this->ctrlConnect->isUserConnected()) {

            if (isset ($_POST) && !empty($_POST)) {
                var_dump($_POST);

                $addPostId = $this->postManager->insertPost($_POST);

                $post = $this->postManager->getPost($addPostId);

                //var_dump($post);

                $view = new View("backend/addPost");
                $view->generate(array('post' => $post), 'template_backend');

            } else {
                $view = new View("backend/addPost");
                $view->generate(array(),'template_backend');
            }



            // header('Location: index.php?action=addpost');

        } else {
            throw new Exception('Vous n avez pas acces à cette page!');
        }

    }

    public function editPost()
    {
        session_start();

        if ($this->ctrlConnect->isUserConnected()) {

            if (isset ($_POST) && !empty($_POST)) {
                var_dump($_POST);

                $addPost = $this->postManager->insertPost($_POST);
                //var_dump($addPost);
                $view = new View("backend/addPost");
                $view->generate(array('addPost' => $addPost));

            } else {

                if ( isset($_GET['postid']) &&  !empty($_GET['postid'])  ) {

                    //we retrieve the post data

                    $post = $this->postManager->getPost($_GET['postid']);
                }

                $view = new View("backend/addPost");
                $view->generate(array('post' => $post));
            }



            // header('Location: index.php?action=addpost');

        } else {
            throw new Exception('Vous n avez pas acces à cette page!');
        }

    }

    public function recoverPost(){}

    public function postsList()
    {
        session_start();

        if ($this->ctrlConnect->isUserConnected()) {


            if ( isset($_POST) && !empty($_POST) && isset($_GET["postid"])) {
                $this->statusPost();
            }

            if ( isset($_GET['status']) && $_GET['status'] === 'approved'){

                $posts= $this->postManager->getPostsByStatus('approved');

            }elseif ( isset($_GET['status']) && $_GET['status'] === 'rejected'){

                $posts= $this->postManager->getPostsByStatus('rejected');

            }elseif ( isset($_GET['status']) && $_GET['status'] === 'all'){

                $posts= $this->postManager->getPosts();
            }else {

                $posts= $this->postManager->getPostsByStatus('draft');
            }

            $posts = $this->postManager->getPosts();

        $view = new View("backend/admin");
         $view->generate(array('posts' => $posts), 'template_backend');

//            $view = new View("backend/moderation");
//            $view->generate(array('comments' => $comments), 'template_backend');

        } else {
            throw new Exception('Vous n avez pas acces à cette page!');
        }

    }

    public function statusPost()
    {

        if ( $_POST["operation"] === "approved" ){

            $this ->postManager->setStatus($_GET['postid'] , 'approved');

        }


        if ( $_POST["operation"] === "rejected" ){

            $this ->postManager->setStatus($_GET['postid'] , 'rejected');

        }

        if ( $_POST["operation"] === "delete" ){

            $this ->postManager->Delete($_GET['postid']);
        }
    }

}