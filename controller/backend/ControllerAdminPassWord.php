<?php

class ControllerAdminPassWord
{
    public function __construct()
    {

        $this->ctrlConnect = New ControllerConnect();
        $this->userManager = new userManager();
    }

    public function modifyFormPassword()
    {
        session_start();

        if ($this->ctrlConnect->isuserconnected()) {

            $view = new View("backend/modifyPass");
            $view->generate(array(), 'template_backend');

        }else {
            throw new Exception('Vous n avez pas acces à cette page!');
        }



//            $view = new View("backend/modifyPass");
//            $view->generate(array(), 'template_backend');



    }

}