<?php


class ContactManager extends Manager
{
    public function getContact(){

        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id, lastname, firstname, email, content, status, DATE_FORMAT(contact_date, \'%d/%m/%Y à %Hh%imin%ss\') AS contact_date_fr FROM contacts ORDER BY contact_date_fr ASC ');
        $req->execute(array());

        return $req;

    }

    public function insertContact(){

        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO contacts(lastname, firstname, email, content,  contact_date) VALUES(:lastname,:firstname,:email,:content, NOW())');

        $res = $req->execute(array(
            'lastname' => $_POST['lastname'],
            'firstname' => $_POST['firstname'],
            'email' => $_POST['email'],
            'content' => $_POST['content']));
        return $res;

    }

    public function getContactByStatus($status)
    {
        $db = $this->dbConnect();
        //$notifications = $db->prepare('SELECT id, lastname, firstname, email, content, status, DATE_FORMAT(contact_date, \'%d/%m/%Y à %Hh%imin%ss\') AS contact_date_fr FROM contacts WHERE status=:status ORDER BY contact_date_fr ASC');
        $notifications = $db->prepare('SELECT id, lastname, firstname, email, content, status, DATE_FORMAT(contact_date, \'%d/%m/%Y à %Hh%imin%ss\') AS contact_date_fr FROM contacts WHERE status=:status ORDER BY contact_date_fr ASC');
        $notifications->execute(array('status' => $status));

        return $notifications;
    }

    public function setStatus($contactId , $status)
    {
        $db = $this->dbConnect();
        $updateStatus = $db->prepare('UPDATE contacts SET status=:status WHERE id=:id ');
        $modifyStatus = $updateStatus->execute(array('id' => $contactId  , 'status' => $status  ));

        return $modifyStatus;
    }

    public function delete($contactId)
    {
        $db = $this->dbConnect();
        $deleteContact = $db->prepare('DELETE FROM contacts WHERE id=:id ');

        return $deleteContact->execute(array('id' => $contactId ));

    }

}