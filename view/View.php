<?php

class View
{
    private $file;
    private $title;

    public function __construct($action)
    {
        $this->file = "view/" . $action . "View.php";
    }

    public function generate($datas)
    {
        $content = $this->generateFile($this->file, $datas);

        $view = $this->generateFile('view/template.php',
            array('title' => $this->title, 'content' => $content));

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
}