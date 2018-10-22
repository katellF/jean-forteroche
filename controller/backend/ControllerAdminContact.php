<?php

class ControllerAdminContact
{
    private $contactManager;

    public function __construct()
    {
        $this->contactManager = new ContactManager();
        $this->ctrlConnect = new ControllerConnect();


    }

    public function contactList()
    {
        session_start();

        if ($this->ctrlConnect->isUserConnected()) {


            $this->statusContact();

            if ( isset($_GET['status']) && $_GET['status'] === 'archived'){

                $contacts = $this->contactManager->getContactByStatus('archived');

            }elseif ( isset($_GET['status']) && $_GET['status'] === 'all'){
                $contacts = $this->contactManager->getContact();

            }elseif ( isset($_GET['status']) && $_GET['status'] === 'trash'){

                $contacts= $this->contactManager->getContactByStatus('trash');

            }else {
                $contacts = $this->contactManager->getContactByStatus('unread');
            }

            $view = new View("backend/contactList");
            $view->generate(array('contacts' => $contacts ),'template_backend');

        }
        else {
            throw new Exception('Vous n avez pas acces à cette page!');
        }

    }

    public function statusContact()
    {

        if ( $_POST["operation"] === "archived" ){

            $this ->contactManager->setStatus($_GET['contactid'] , 'archived');

        }

        if ( $_POST["operation"] === "trash" ){

            $this ->contactManager->setStatus($_GET['contactid'] , 'trash');

        }

        if ( $_POST["operation"] === "unread" ){

            $this ->contactManager->setStatus($_GET['contactid'] , 'unread');

        }

        if ( $_POST["operation"] === "delete" ){

            $this ->contactManager->delete($_GET['contactid']);
        }
    }




}
