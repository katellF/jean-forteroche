<?php

require_once('controller/ControllerPost.php');
require_once('view/View.php');

class Router
{
    private $ctrlPost;

    public function __construct()
    {
        $this->ctrlPost = new ControllerPost();
    }

    public function routerRequest()
    {
        try {
            if (isset($_GET['action'])) {

                if ($_GET['action'] == 'listPosts') {
                    $this->ctrlPost->listPosts();
                }

            } else {

                $this->ctrlPost->listPosts();
            }

        } catch (Exception $e) {

            echo 'Erreur : ' . $e->getMessage();
        }
    }

}