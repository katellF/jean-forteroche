<?php

class ControllerAdminPassWord
{

    private $ctrlConnect;
    private $userManager;

    public function __construct()
    {

        $this->ctrlConnect = New ControllerConnect();
        $this->userManager = new userManager();
    }

    public function modifyPassword()
    {
        session_start();

        if ($this->ctrlConnect->isuserconnected()) {

            if (isset($_POST) && !empty($_POST)) {

                $pass_hache = password_hash($_POST['passwordConnect'], PASSWORD_DEFAULT);
                $modifyPassword = $this->userManager->setPassword($_SESSION['pseudo'], $pass_hache);

                $errorCounter = 0;

                if (strlen(htmlspecialchars($_POST['passwordConnect'])) < 6) {

                    echo 'Mdp trop court,  il faut au moins 6 chars...';
                    $errorCounter++;
                }

                if ($_POST['passwordConnect'] !== $_POST['passwordConfirm']) {

                    echo 'Vos 2 mots de passe doivent etre identiques';
                    $errorCounter++;
                }

                if ($errorCounter === 0) {

                    $view = new View("backend/modifyPass");
                    $view->generate(array('password' => $modifyPassword), 'template_backend');


            }
            }else {

                $view = new View("backend/modifyPass");
                $view->generate(array(), 'template_backend');

            }


        } else {
            throw new Exception('Vous n avez pas acces à cette page!');
        }
    }
}

