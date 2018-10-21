<?php

class ControllerAdminContact
{
    private $contactManager;

    public function __construct()
    {
        $this->contactManager = new ContactManager();
        $this->ctrlConnect = new ControllerConnect();

    }

    public function contact()
    {
        session_start();

        if ($this->ctrlConnect->isUserConnected()) {

            $contacts = $this->contactManager->getContact();
            $view = new View("backend/contactList");
            $view->generate(array("contacts"=>$contacts), "template_backend");


        } else {

            throw new Exception('Vous n avez pas acces à cette page!');
        }

    }

}
