<?php

class ControllerContact
{
    private $contactManager;

    public function __construct()
    {
        $this->contactManager = new ContactManager();

    }
    public function contactForm()
    {
        if (isset ($_POST) && !empty($_POST)) {

            $contact=$this->contactManager->insertContact();
        }
       // $contact=$this->contactManager->insertContact();
        $view = new View("frontend/contact");
        $view->generate(array());
    }


//    public function contact()
//    {
//        if (isset ($_POST) && !empty($_POST)) {
//
//            $contact=$this->contactManager->insertContact();
//        }
//    }
}