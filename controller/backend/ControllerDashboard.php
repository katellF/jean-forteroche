<?php


class ControllerDashboard
{
public function adminAccess(){

    $view = new View("backend/admin");
    $view->generate(array());
}
}