<?php

class ControllerContact
{
    private $contactManager;

    public function __construct()
    {
        $this->contactManager = new ContactManager();
        $this->ctrlConnect = new ControllerConnect();

    }
    public function contactForm()
    {
        session_start();
        if (isset ($_POST) && !empty($_POST)) {

            $contact=$this->contactManager->insertContact();
        }
       // $contact=$this->contactManager->insertContact();


        if ($this->ctrlConnect->isUserConnected()) {

            $view = new View("frontend/contact");
            $view->generate(array(), "template_connect");
        } else{

            $view = new View("frontend/contact");
            $view->generate(array());

        }
    }

}