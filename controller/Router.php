<?php

class Router
{
    private $ctrlPost;
    private $ctrlComment;

    public function __construct()
    {
        $this->ctrlPost = new ControllerPost();
        $this->ctrlComment = new ControllerComment();
        $this->ctrlNotification = new ControllerNotification();
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
                        throw new Exception('Aucun identifiant de billet envoyé');
                    }
                } elseif ($_GET['action'] == 'addComment') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                            $this->ctrlComment->addComment($_GET['id'], $_POST['author'], $_POST['comment']);

                        } else {
                            throw new Exception('Tous les champs ne sont pas remplis !');
                        }

                    } else {
                        throw new Exception('Aucun identifiant de billet envoyé');
                    }
                } elseif ($_GET['action'] == 'notification') {
                    if (isset($_GET['commentid']) && $_GET['commentid'] > 0) {
                        if (!empty($_POST['reason']) && !empty($_POST['email']) && !empty($_POST['content'])) {
                            $this->ctrlNotification->notification();
                        }else {
                            throw new Exception('Tous les champs ne sont pas remplis');
                        }
                    }
                }
            } else {
                $this->ctrlPost->listPosts();
            }
        } catch (Exception $e) {

            echo 'Erreur : ' . $e->getMessage();
        }
    }
}