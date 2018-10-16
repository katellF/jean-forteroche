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


                if ( isset($_POST['postid'])  && $_POST['postid'] !== "" ) {


                    if ( $_POST['status'] == 'Publier') {
                        $_POST['status'] = 'published';
                    }

                    if ( $_POST['status'] == 'Brouillon') {
                        $_POST['status'] = 'draft';
                    }

                        $this->postManager->updatePost($_POST['postid'] , $_POST);
                    $post = $this->postManager->getPost($_POST['postid']);

                }  else {

                    $addPostId = $this->postManager->insertPost($_POST);

                    if ( $_POST['status'] == 'Publier') {
                        $this->postManager->setStatus($addPostId , 'published');
                    }

                    $post = $this->postManager->getPost($addPostId);

                }

                //var_dump($_POST);


                $view = new View("backend/addPost");
                $view->generate(array('post' => $post), 'template_backend');

            } else {
                $view = new View("backend/addPost");
                $view->generate(array(),'template_backend');
            }

//            if ( isset($_POST) && !empty($_POST) && isset($_GET["postid"])) {
//                $this->statusPost();
//            }

            // header('Location: index.php?action=addpost');

        } else {
            throw new Exception('Vous n avez pas acces à cette page!');
        }

    }

    public function previewPost()
    {
        session_start();

        if ($this->ctrlConnect->isUserConnected()) {

            $post = $this->postManager->getPost($_GET['id']);
           // $comments = $this->commentManager->getApprovedComments($_GET['id']);
            $view = new View("backend/previewPost");
            $view->generate(array('post' => $post), "template_connect");
        } else {
            throw new Exception('Vous n avez pas acces à cette page!');
        }
    }

    public function editPost()
    {
        session_start();

        if ($this->ctrlConnect->isUserConnected()) {

            if (isset ($_POST) && !empty($_POST)) {
                //var_dump($_POST);

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

    public function recoverPost(){

        session_start();

        if ($this->ctrlConnect->isUserConnected()) {

            $post = $this->postManager->getPost($_GET['postid']);
            $view = new View("backend/addPost");
            $view->generate(array('post' => $post));
        }
    }

    public function postsList()
    {
        session_start();

        if ($this->ctrlConnect->isUserConnected()) {


            if ( isset($_POST) && !empty($_POST) && isset($_GET["postid"])) {
                $this->statusPost();
            }

            if ( isset($_GET['status']) && $_GET['status'] ==='published'){

                $posts= $this->postManager->getPostsByStatus('published');

          }
//elseif ( isset($_GET['status']) && $_GET['status'] === 'pending'){
//
//                $posts= $this->postManager->getPostsByStatus('pending');
//
//            }
            elseif ( isset($_GET['status']) && $_GET['status'] === 'draft'){

                $posts= $this->postManager->getPostsByStatus('draft');

            }elseif ( isset($_GET['status']) && $_GET['status'] === 'trash'){

                $posts= $this->postManager->getPostsByStatus('trash');

            }elseif ( isset($_GET['status']) && $_GET['status'] === 'all'){
              // $start = 0;  $end = 10;
               //$posts= $this->postManager->getPosts($start, $end);
              // $posts= $this->postManager->getPosts();
               $posts= $this->postManager->getPosts();
            }else {

                $posts= $this->postManager->getPosts();
            }

            //$posts = $this->postManager->getPosts();

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

        if ( $_POST["operation"] === "published" ){

            $this ->postManager->setStatus($_GET['postid'] , 'published');

        }


//        if ( $_POST["operation"] === "pending" ){
//
//            $this ->postManager->setStatus($_GET['postid'] , 'pending');
//
//        }

        if ( $_POST["operation"] === "draft" ){

            $this ->postManager->setStatus($_GET['postid'] , 'draft');

        }

        if ( $_POST["operation"] === "trash" ){

            $this ->postManager->setStatus($_GET['postid'] , 'trash');

        }

        if ( $_POST["operation"] === "delete" ){

            $this ->postManager->Delete($_GET['postid']);
        }
    }


}