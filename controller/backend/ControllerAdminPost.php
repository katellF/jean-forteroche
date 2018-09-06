<?php
/**
 * Created by PhpStorm.
 * User: katell
 * Date: 9/6/18
 * Time: 2:52 PM
 */

class ControllerAdminPost
{
    public function __construct()
    {
        $this->postManager = new PostManager();
    }

    public function addPost()
    {
        session_start();

        if (isset ($_POST) && !empty($_POST)) {


                $addPost = $this->postManager->insertPost();
                $view = new View("backend/addPost");
                $view->generate(array('addPost' => $addPost));

            header('Location: index.php?action=addpost');

        } else {

            $view = new View("backend/addPost");
            $view->generate(array());

            // require('view/frontend/addPostView.php');

        }
    }
}