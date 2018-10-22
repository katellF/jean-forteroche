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
            $errorCounter = 0;

            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {

                echo 'ecriture email fausse';
                $errorCounter++;
            }
            if ($errorCounter === 0) {
                $contact = $this->contactManager->insertContact();
            }
        }
        if ($this->ctrlConnect->isUserConnected()) {


            $view = new View("frontend/contact");
            $view->generate(array(), "template_connect");
        } else {

            $view = new View("frontend/contact");
            $view->generate(array());
        }
    }

}