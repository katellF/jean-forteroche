<?php

class ControllerConnect
{
    private $UserConnect;

    public function __construct()
    {
        $this->UserConnect = new UserManager();

    }

    function registration(){
//
        if ( isset ($_POST) && !empty($_POST)) {

            $post_pseudo = htmlspecialchars($_POST['pseudo']);

            $user = $this->UserConnect->getUser($post_pseudo);

            $errorCounter = 0;

            if ($user->rowCount() === 0) {
                echo 'on peut ajouter pseudo';
            } else {

                echo 'On a deja ce pseudo';
                $errorCounter++;

            }


            if( strlen( htmlspecialchars($_POST['password'] )) < 6 ){

                echo 'Mdp trop court,  il faut au moins 6 chars...';
                $errorCounter++;
            }

            if($_POST['password'] !== $_POST['confirmPassword']){

            echo 'Vos 2 mots de passe doivent etre identiques';
            $errorCounter++;
        }
//
//////    if(1 !== preg_match("#^[a-z]||[0-9]@*\.#", $_POST['email'])){
            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)=== false) {

                echo 'ecriture email fausse';
                $errorCounter++;
            }

            if ( $errorCounter === 0) {

                echo 'Insert User';

                $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $this->UserConnect->registerUser();

            }

        }else {
            $view = new View("connection");
            $view->generate(array());

        }
    //}
}
    function connection(){

//        if ( isset($_COOKIE['pseudo']) && isset($_COOKIE['pass']) ){
//
//            echo $_COOKIE['pseudo'] .'     '. $_COOKIE['pass'].'<br><br>';
//
//
//            if( $this->UserConnect->connectionAuto() == true){
//
//                echo"Vous etes connectés";
//                exit;
//            }
//        }

        if ( isset ($_POST) && !empty($_POST)) {

//
            $errorCounter = 0;

            if (!isset($_POST['pseudoConnect']) || empty($_POST['pseudoConnect'])){
                echo 'Pseudo manquant!';
                $errorCounter++;
            }
//
            if (!isset($_POST['passwordConnect']) || empty($_POST['passwordConnect'])){
                echo 'Pwd manquant!';
                $errorCounter++;
            }
//
            if ($errorCounter === 0){

                $res = $this->UserConnect->userConnect();

                $isPasswordCorrect = password_verify($_POST['passwordConnect'], $res['password']);
                if (!$res) {
                    echo 'Mauvais identifiant ou mot de passe 1!';
                } else {
                    if ($isPasswordCorrect) {
////                        session_start();
////                        $_SESSION['id'] = $res['id'];
////                        $_SESSION['pseudo'] = $_POST['pseudo'];
////                        if ( isset( $_POST['check'] ) && $_POST['check'] === "on" ) {
////                            setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
////                            setcookie('pass', $res['pass'], time() + 365*24*3600, null, null, false, true);
////                        }
//
                        echo 'Vous êtes connecté !';
                    } else {
                        echo 'Mauvais identifiant ou mot de passe !2';
                    }
                }
         }}else{
      // }

        $view = new View("connection");
        $view->generate(array());}


    }
}