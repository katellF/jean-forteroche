<?php

require_once('controller/ControllerPost.php');
require_once('controller/ControllerComment.php');
require_once('view/View.php');

//class Router
//{
//    private $ctrlPost;
//
//    public function __construct()
//    {
//        $this->ctrlPost = new ControllerPost();
//    }
//
//    public function routerRequest()
//    {
//        try {
//            if (isset($_GET['action'])) {
//
//                if ($_GET['action'] == 'listPosts') {
//                    $this->ctrlPost->listPosts();
//                }
//
//            } else {
//
//                $this->ctrlPost->listPosts();
//            }
//
//        } catch (Exception $e) {
//
//            echo 'Erreur : ' . $e->getMessage();
//        }
//
//    }
//}

class Router
{
    private $ctrlPost;
    private $ctrlComment;

    public function __construct()
    {
        $this->ctrlPost = new ControllerPost();
        $this->ctrlComment = new ControllerComment();
    }


    public function routerRequest()
    {

        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'listPosts') {
                    $this->ctrlPost->listPosts();
                } elseif ($_GET['action'] == 'post') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $this->ctrlPost->post();

                    } else {
                        // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                        throw new Exception('Aucun identifiant de billet envoyé');
                    }
                } elseif ($_GET['action'] == 'addComment') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                            $this->ctrlComment->addComment($_GET['id'], $_POST['author'], $_POST['comment']);

                        } else {
                            // Autre exception
                            throw new Exception('Tous les champs ne sont pas remplis !');
                        }

                    } else {
                        // Autre exception
                        throw new Exception('Aucun identifiant de billet envoyé');
                    }
                }
            }
        } catch (Exception $e) {

            echo 'Erreur : ' . $e->getMessage();
        }
    }
}