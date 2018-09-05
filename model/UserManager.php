<?php


class UserManager extends Manager
{
    public function getUser($pseudo){

        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id FROM users WHERE pseudo = :pseudo');
        $req->execute(array(
            'pseudo' => htmlspecialchars($pseudo)));


        return $req;
    }

    public function registerUser(){

        $db = $this->dbConnect();

        // Insertion
        $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $req = $db->prepare('INSERT INTO users(lastname, firstname, pseudo, email, password, registration_date) VALUES(:lastname,:firstname,:pseudo,:email,:password, CURDATE())');


        $res = $req->execute(array(
            'lastname' => $_POST['lastname'],
            'firstname' => $_POST['firstname'],
            'pseudo' => $_POST['pseudo'],
            'email' => $_POST['email'],
            'password' => $pass_hache,));
        return$res;
        echo'enregistrer';
        exit;
    }

    public function userConnect(){

        $db = $this->dbConnect();

        $req = $db->prepare("SELECT id, pseudo, password FROM users WHERE pseudo = :pseudo");
        $res = $req->execute(array(
            'pseudo' => $_POST['pseudoConnect'],
        ));

        $resultat = $req->fetch();
        return $resultat;
    }
//
//    public function connectionAuto(){
//
//        $db = $this->dbConnect();
//
//        // controle pour connexion automatique....
//        $req = $db->prepare("SELECT id, pass FROM members WHERE pseudo = :pseudo AND pass = :pass");
//        $req->execute(array(
//            'pseudo' => $_COOKIE['pseudo'],
//            'pass' => $_COOKIE['pass'],
//        ));
//
//
//        $resultat = $req->fetch();
//        var_dump('asdasdsad ',$resultat);
//
//        return $resultat;
//    }
//
//    public function userConnect(){
//
//        $db = $this->dbConnect();
//
//        $req = $db->prepare("SELECT id, password FROM users WHERE pseudo = :pseudo");
//        $res = $req->execute(array(
//            'pseudo' => $_POST['pseudo'],
//        ));
//
//        $resultat = $req->fetch();
//        return $resultat;
//    }
//
//    public function getLogout(){
//
//        // Suppression des variables de session et de la session
//        $_SESSION = array();
//        session_destroy();
//
//        // Suppression des cookies de connexion automatique
//        setcookie('pseudo', '');
//        setcookie('pass', '');
//    }

}