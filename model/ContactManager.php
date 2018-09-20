<?php


class ContactManager extends Manager
{
    public function getContact(){

        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id, lastname, firstname, email, content FROM contacts ');
        $req->execute(array(
            ));

        return $req;

    }

    public function insertContact(){

        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO contacts(lastname, firstname, email, content, contact_date) VALUES(:lastname,:firstname,:email,:content, CURDATE())');

        $res = $req->execute(array(
            'lastname' => $_POST['lastname'],
            'firstname' => $_POST['firstname'],
            'email' => $_POST['email'],
            'content' => $_POST['content']));
        return $res;

    }

}