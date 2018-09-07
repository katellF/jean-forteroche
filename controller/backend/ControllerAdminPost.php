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
                $addPost = $this->postManager->insertPost($_POST);
                //var_dump($addPost);
                $view = new View("backend/addPost");
                $view->generate(array('addPost' => $addPost));

            } else {
                $view = new View("backend/addPost");
                $view->generate(array());
            }



            // header('Location: index.php?action=addpost');

        } else {
            throw new Exception('Vous n avez pas acces à cette page!');
        }



    }
}