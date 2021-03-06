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


                if (strlen(htmlspecialchars($_POST['passwordConnect'])) < 6) {

                    throw new Exception('Mot de passe trop court,  il faut au moins 6 caractères...');
                }

                if ($_POST['passwordConnect'] !== $_POST['passwordConfirm']) {

                    throw new Exception('Les 2 mots de passe doivent etre identiques');
                }

                $view = new View("backend/modifyPass");
                $view->generate(array('password' => $modifyPassword), 'template_backend');

            } else {

                $view = new View("backend/modifyPass");
                $view->generate(array(), 'template_backend');

            }

        } else {

            throw new Exception('Vous n avez pas acces à cette page!');
        }
    }
}

