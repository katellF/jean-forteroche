<?php


class ContactManager extends Manager
{
    public function getContact(){

        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id, lastname, firstname, email, content, status FROM contacts ');
        $req->execute(array());

        return $req;

    }

    public function insertContact(){

        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO contacts(lastname, firstname, email, content,  contact_date) VALUES(:lastname,:firstname,:email,:content, CURDATE())');

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
        $notifications = $db->prepare('SELECT id, lastname, firstname, email, content, status, DATE_FORMAT(submission_date, \'%d/%m/%Y à %Hh%imin%ss\') AS contact_date_fr FROM contacts WHERE status =:status ORDER BY contact_date_fr DESC');
        $notifications->execute(array('status' => $status));

        return $notifications;
    }

}