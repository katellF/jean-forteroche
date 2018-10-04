<?php


class ControllerDashboard
{
    private $ctrlConnect;

    public function __construct(){

        $this->ctrlConnect = New ControllerConnect();
        $this->postManager = New PostManager();
    }

    public function adminAccess()
    {
        session_start();
        if ( $this->ctrlConnect->isUserConnected()) {

          //  $this->postManager->postsList();
//            $posts = $this->postManager->getPosts();
//
//        $view = new View("backend/admin");
//        $view->generate(array('posts' => $posts), 'template_backend');

        } else {

            throw new Exception('Vous n avez pas acces à cette page!');
        }
    }

}