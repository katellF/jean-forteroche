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
        $this->ctrlConnect = new ControllerConnect();
        $this->ctrlDashboard = new ControllerDashboard();
        $this->ctrlAdminPost = new ControllerAdminPost();
        $this->ctrlAdminComment = new ControllerAdminComment();
    }

    public function routerRequest()
    {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'register') {
                    $this->ctrlConnect->registration();}
                    //$this->ctrlConnect->isUserConnected();
                if ($_GET['action'] == 'connection') {
                    $this->ctrlConnect->connection();}
//                //$this->ctrlConnect->isUserConnected();
                if ($_GET['action'] == 'admin') {
                    $this->ctrlConnect->isUserConnected();
                    $this->ctrlDashboard->adminAccess();}
                elseif ($_GET['action'] == 'logout') {
                    $this->ctrlConnect->logout();}
                elseif ($_GET['action'] == 'addpost') {
                    $this->ctrlConnect->isUserConnected();
                   $this->ctrlAdminPost->addPost();}
                elseif ($_GET['action'] == 'moderation') {
                    $this->ctrlConnect->isUserConnected();
                    $this->ctrlAdminComment->commentList();
                }
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

                            $this->ctrlNotification->notification();
                }
            } else {
                $this->ctrlPost->listPosts();
            }
        } catch (Exception $e) {

            echo 'Erreur : ' . $e->getMessage();
        }
    }
}