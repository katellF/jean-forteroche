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
        $this->ctrlAdminPost = new ControllerAdminPost();
        $this->ctrlAdminComment = new ControllerAdminComment();
        $this->ctrlAdminNotification = new ControllerAdminNotification();
        $this->ctrlContact = new ControllerContact();
        $this->ctrlAdminPassWord = new ControllerAdminPassWord();
        $this->ctrlAdminContact = new ControllerAdminContact();

    }

    public function routerRequest()
    {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'register') {
                    $this->ctrlConnect->registration();}
                if ($_GET['action'] == 'connection') {
                    $this->ctrlConnect->connection();}
                if ($_GET['action'] == 'admin') {
                    $this->ctrlConnect->isUserConnected();
                    $this->ctrlAdminPost->postsList();}
                elseif ($_GET['action'] == 'logout') {
                    $this->ctrlConnect->logout();}
                elseif ($_GET['action'] == 'addpost') {
                    $this->ctrlConnect->isUserConnected();
                   $this->ctrlAdminPost->addPost();}
                   elseif ($_GET['action'] == 'recoverpost') {
                    $this->ctrlConnect->isUserConnected();
                   $this->ctrlAdminPost->recoverpost();}
                   elseif ($_GET['action'] == 'adminAnswer') {
                    $this->ctrlConnect->isUserConnected();
                   $this->ctrlAdminComment->adminanswer();}
                elseif ($_GET['action'] == 'editpost') {
                    $this->ctrlConnect->isUserConnected();
                    $this->ctrlAdminPost->editPost();}
                elseif ($_GET['action'] == 'moderation') {
                    $this->ctrlConnect->isUserConnected();
                    $this->ctrlAdminComment->commentList();
                }elseif ($_GET['action'] == 'adminNotification') {
                    $this->ctrlConnect->isUserConnected();
                    $this->ctrlAdminNotification->notificationList();
                }elseif ($_GET['action'] == 'getcomment') {
                    $this->ctrlConnect->isUserConnected();
                    $this->ctrlAdminComment->viewComment();
                }elseif ($_GET['action'] == 'previewpost') {
                    $this->ctrlConnect->isUserConnected();
                    $this->ctrlAdminPost->previewPost();
                }elseif ($_GET['action'] == 'admincontact') {
                    $this->ctrlConnect->isUserConnected();
                    $this->ctrlAdminContact->contact();
                }elseif ($_GET['action'] == 'modifypass') {
                    $this->ctrlConnect->isUserConnected();
                    $this->ctrlAdminPassWord->modifyPassword();
                }if ($_GET['action'] == 'listPosts') {
                    $this->ctrlPost->listPosts();
                } elseif ($_GET['action'] == 'post') {
                    if (isset($_GET['postid']) && $_GET['postid'] > 0) {
                        $this->ctrlPost->post();
                    } else {
                        throw new Exception('Aucun identifiant de billet envoyé');
                    }
                } elseif($_GET['action'] == 'commentSent'){
                    $this->ctrlComment->commentSent();
                } elseif ($_GET['action'] == 'writer') {
                    $this->ctrlPost->writer();
                }  elseif ($_GET['action'] == 'home') {
                    $this->ctrlPost->homePage();
                }elseif ($_GET['action'] == 'lastPost') {
                    $this->ctrlPost->lastPost();
                } elseif ($_GET['action'] == 'contact') {
                    $this->ctrlContact->contactForm();
                }elseif ($_GET['action'] == 'addComment') {
                    if (isset($_GET['postid']) && $_GET['postid'] > 0) {
                        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                            $status = 'pending';
                            if ( isset($_POST['source']) && $_POST['source'] === 'admin' ) {
                                $status = 'approved';
                            }

                            $this->ctrlComment->addComment($_GET['postid'], $_POST['author'], $_POST['comment'] , $status);

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
                $this->ctrlPost->homePage();
            }
        } catch (Exception $e) {

            echo 'Erreur : ' . $e->getMessage();
        }
    }
}