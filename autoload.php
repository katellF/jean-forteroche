<?php


 class autoload{

    public static function register($class){

        $directories = array('controller','model', 'view', 'controller/frontend');

        foreach ($directories as $directory){

            if (file_exists(dirname(__FILE__) . '/'.$directory.'/' . $class . '.php')) {
                require_once dirname(__FILE__) . '/'.$directory.'/' . $class . '.php';

                return;
            }
        }
    }

    public static function load(){

       spl_autoload_register(array('autoload', 'register'));
   }
}

