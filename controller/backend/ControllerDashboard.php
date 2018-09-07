<?php


class ControllerDashboard
{
    private $ctrlConnect;

    public function __construct(){

        $this->ctrlConnect = New ControllerConnect();
    }

    public function adminAccess()
    {
        session_start();
        if ( $this->ctrlConnect->isUserConnected()) {
        $view = new View("backend/admin");
        $view->generate(array());

        } else {

            throw new Exception('Vous n avez pas acces à cette page!');
        }
    }





}