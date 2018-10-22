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
        if ($this->ctrlConnect->isUserConnected()) {
            if (isset ($_POST) && !empty($_POST)) {
                $errorCounter = 0;

                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {

                    throw new Exception('Vous n avez pas ecrit l email correctement');
                    $errorCounter++;
                }

                if ($errorCounter === 0) {
                    $contact = $this->contactManager->insertContact();
                    header('Location: index.php?action=contactsent');


                }
            } else{

                $view = new View("frontend/contact");
                $view->generate(array(), "template_connect");
            }
        } elseif (isset ($_POST) && !empty($_POST)) {
            $errorCounter = 0;

            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {

                throw new Exception('Vous n avez pas ecrit l email correctement');
                $errorCounter++;
            }

            if ($errorCounter === 0) {

                $contact = $this->contactManager->insertContact();
                header('Location: index.php?action=contactsent');
            }


        }else{

            $view = new View("frontend/contact");
            $view->generate(array());
    }
}

    public function contactSent(){

        $view = new View("frontend/contactSent");
        $view->generate(array());
}

}