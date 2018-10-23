<?php

class ControllerConnect
{
    private $UserConnect;

    public function __construct()
    {
        $this->UserConnect = new UserManager();

    }

    public function registration()
    {

        if (isset ($_POST) && !empty($_POST)) {

            $post_pseudo = htmlspecialchars($_POST['pseudo']);

            $user = $this->UserConnect->getUser($post_pseudo);

            $errorCounter = 0;

            if ($user->rowCount() === 0) {
                echo 'on peut ajouter pseudo';
            } else {

                echo 'On a deja ce pseudo';
                $errorCounter++;
            }

            if (strlen(htmlspecialchars($_POST['password'])) < 6) {

                echo 'Mdp trop court,  il faut au moins 6 chars...';
                $errorCounter++;
            }

            if (strlen(htmlspecialchars($_POST['password'])) !== htmlspecialchars($_POST['confirmPassword'])) {

                echo 'Vos 2 mots de passe doivent etre identiques';
                $errorCounter++;
            }
            if (filter_var(htmlspecialchars($_POST['email']), FILTER_VALIDATE_EMAIL) === false) {

                echo 'ecriture email fausse';
                $errorCounter++;
            }

            if ($errorCounter === 0) {
                session_start();

//                $pass_hache = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);

                $res = $this->UserConnect->registerUser($_POST);
                $connect = $this->UserConnect->userConnect($_POST['pseudo']);


                $_SESSION['id'] = $connect['id'];
                $_SESSION['pseudo'] = $connect['pseudo'];

                header('Location: index.php?action=admin');
            }
        }

       $view = new View("backend/registration");
        $view->generate(array());
    }

    public function connection()
    {

        if (isset ($_POST) && !empty($_POST)) {


            $errorCounter = 0;

//            if (!isset($_POST['pseudoConnect']) || empty($_POST['pseudoConnect'])) {
//
//                throw new Exception('Pseudo manquant');
//                $errorCounter++;
//            }
//
//            if (!isset($_POST['passwordConnect']) || empty($_POST['passwordConnect'])) {
//
//                echo 'Pwd manquant!';
//                $errorCounter++;
//            }
            if (empty (htmlspecialchars($_POST['passwordConnect'])) || empty (htmlspecialchars($_POST['pseudoConnect']))){

                throw new Exception('Tous les champs doivent être remplis');
                $errorCounter++;
            }

            if ($errorCounter === 0) {

                $res = $this->UserConnect->userConnect($_POST['pseudoConnect']);

                $isPasswordCorrect = password_verify(htmlspecialchars($_POST['passwordConnect']), $res['password']);
                if (!$res) {
                    //echo 'Mauvais identifiant ou mot de passe 1!';
                    throw new Exception('Mauvais identifiant ou mot de passe');

                } else {
                    if ($isPasswordCorrect) {

                        session_start();
                        $_SESSION['id'] = $res['id'];
                        $_SESSION['pseudo'] = $_POST['pseudoConnect'];

                        header('Location: index.php?action=admin');

                    } else {
                        throw new Exception('Mauvais identifiant ou mot de passe');
                        //echo 'Mauvais identifiant ou mot de passe !2';
                    }
                }
            }
        }

        $view = new View("frontend/connection");
        $view->generate(array());
    }

    public function logout()
    {
        session_start();

        $this->UserConnect->getLogout();

        if (empty($_SESSION)) {
            $view = new View("backend/logout");
            $view->generate(array(), 'template_logout');

        } else {
            header('Location: index.php?action=admin');
        }
    }

    public function isUserConnected()
    {
        if (isset($_SESSION) && isset($_SESSION['pseudo'])) {

            return true;

        } else {
            return false;
        }
    }
}