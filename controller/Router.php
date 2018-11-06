<?php

class Router
{
    private $ctrlPost;
    private $ctrlComment;
    private $ctrlNotification;
    private $ctrlConnect;
    private $ctrlAdminPost;
    private $ctrlAdminComment;
    private $ctrlAdminNotification;
    private $ctrlContact;
    private $ctrlAdminPassWord;
    private $ctrlAdminContact;


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

                switch ($_GET['action']) {

                    case 'home':
                        $this->ctrlPost->home();
                        break;

                    case 'writer':
                        $this->ctrlPost->writer();
                        break;

                    case 'listPosts':
                        $this->ctrlPost->listPosts();
                        break;

                    case 'lastpost':
                        $this->ctrlPost->lastPost();
                        break;

                    case 'post':

                        if (isset($_GET['postid']) && $_GET['postid'] > 0) {
                            $this->ctrlPost->post();

                        } else {
                            throw new Exception('Aucun identifiant de billet envoyé');
                        }
                        break;

                    case 'commentsent':
                        $this->ctrlComment->commentSent();
                        break;

                    case 'notification':
                        $this->ctrlNotification->notification();
                        break;

                    case 'addComment':
                        if (isset($_GET['postid']) && $_GET['postid'] > 0) {
                            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                                $status = 'pending';
                                $source = 'frontend';

                                if (isset($_POST['source']) && $_POST['source'] === 'admin') {
                                    $status = 'approved';
                                    $source = 'backend';
                                }

                                $this->ctrlComment->addComment($_GET['postid'], $_POST['author'], $_POST['comment'], $status, $source);

                            } else {
                                throw new Exception('Tous les champs ne sont pas remplis !');
                            }

                        } else {
                            throw new Exception('Aucun identifiant de billet envoyé');
                        }
                        break;

                    case 'contact':
                        $this->ctrlContact->contact();
                        break;

                    case 'register':
                        $this->ctrlConnect->registration();
                        break;

                    case 'connection':
                        $this->ctrlConnect->connection();
                        break;

                    case 'logout':
                        $this->ctrlConnect->logout();
                        break;


                    case 'admin':
                        $this->ctrlAdminPost->postsList();
                        break;

                    case 'previewpost':
                        $this->ctrlAdminPost->previewpost();
                        break;

                    case 'recoverpost':
                        $this->ctrlAdminPost->recoverpost();
                        break;

                    case 'addpost':
                        $this->ctrlAdminPost->addPost();
                        break;

                    case 'moderation':
                        $this->ctrlAdminComment->commentList();
                        break;

                    case 'adminAnswer':
                        $this->ctrlAdminComment->adminAnswer();
                        break;

                    case 'adminNotification':
                        $this->ctrlAdminNotification->notificationList();
                        break;

                    case 'getcomment':
                        $this->ctrlAdminComment->viewComment();
                        break;

                    case 'admincontact':
                        $this->ctrlAdminContact->contactList();
                        break;

                    case 'modifypass':
                        $this->ctrlAdminPassWord->modifyPassword();
                        break;

                    default:
                        $this->ctrlPost->home();
                }

            } else {
                $this->ctrlPost->home();
            }

        } catch (Exception $e) {

            $this->error($e->getMessage());
        }
    }

    private function error($msgError)
    {
        $view = new View("frontend/error");
        $view->generate(array('msgError' => $msgError));
    }
}