<?php

class ControllerContact
{
    private $contactManager;
    private $ctrlConnect;

    public function __construct()
    {
        $this->contactManager = new ContactManager();
        $this->ctrlConnect = new ControllerConnect();
    }


    public function contactForm()
    {
        session_start();

        if (isset ($_POST) && !empty($_POST)) {


            if (filter_var(htmlspecialchars($_POST['email']), FILTER_VALIDATE_EMAIL) === false) {

                throw new Exception('Vous n avez pas ecrit l email correctement');

            }

            if (empty ($_POST['content']) || empty ($_POST['lastname']) || empty ($_POST['firstname'])) {

                throw new Exception('Nom, prénom et contenu doivent être remplis');

            }

            $this->contactManager->insertContact();
            $view = new View("frontend/contactSent");
//            $view->generate(array(), 'template_connect');
            $view->generate(array(), $this->ctrlConnect->selectTemplate('frontend'));

        } else {

            $view = new View("frontend/contact");
            $view->generate(array(), $this->ctrlConnect->selectTemplate('frontend'));

        }

//        elseif ($this->ctrlConnect->isUserConnected()) {
//
//            $view = new View("frontend/contact");
//            $view->generate(array(), "template_connect");
//        } else {
//
//            $view = new View("frontend/contact");
//            $view->generate(array());
//        }
    }


//    public function contactSent()
//    {
//        session_start();
//        $view = new View("frontend/contactSent");
//        $view->generate(array());
//    }

}