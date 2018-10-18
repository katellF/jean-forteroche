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

    public function modifyFormPassword()
    {
        session_start();

        if ($this->ctrlConnect->isuserconnected()) {

            if ( isset($_POST) && !empty($_POST) ) {

//                echo 'Je change mon MDP';
//
//                echo $_POST['passwordConnect'];

                $pass_hache = password_hash($_POST['passwordConnect'], PASSWORD_DEFAULT);
                $modifyPassword = $this->userManager->setPassword( $_SESSION['pseudo'] ,  $pass_hache) ;

                $view = new View("backend/modifyPass");
                $view->generate(array('password'=> $modifyPassword), 'template_backend');


            } else {

                $view = new View("backend/modifyPass");
                $view->generate(array(), 'template_backend');

            }



        } else {
            throw new Exception('Vous n avez pas acces à cette page!');
        }
    }


        public function ChangePassword()
    {
        session_start();

        if ($this->ctrlConnect->isuserconnected()) {

            if ( isset($_POST) && !empty($_POST) ) {

                echo 'Je change mon MDP';
//                $modifyPassword=$this->userManager->setPassword();
            }


            $view = new View("backend/modifyPass");
            $view->generate(array('modifyPassword' => $modifyPassword), 'template_backend');

        }else {
            throw new Exception('Vous n avez pas acces à cette page!');
        }



    }

}