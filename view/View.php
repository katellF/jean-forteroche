<?php

class View
{
    private $file;
    private $title;

    public function __construct($action)
    {
            $this->file = "view/" . $action . "View.php";
            $this->notificationManager = new NotificationManager();

    }

    public function generate($datas, $template = 'template')
    {


        $countNotif = $this->countNotification();
        $content = $this->generateFile($this->file, $datas);
        //var_dump($content);

            $view = $this->generateFile('view/'.$template.'.php',
                array('title' => $this->title, 'content' => $content, 'unreadNotif' => $countNotif["num_unreadNotifications"]));

        echo $view;
    }

    private function generateFile($file, $datas)
    {
        if (file_exists($file)) {

            extract($datas);

            ob_start();

            require $file;

            return ob_get_clean();
        } else {
            throw new Exception("Fichier '$file' introuvable");
        }
    }

    public function countNotification()
    {

        $args['status'] = 'unread';

        return $this->notificationManager->getCountNotification($args);


    }
}