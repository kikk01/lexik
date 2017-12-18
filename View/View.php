<?php

namespace MyClass\View;

use MyClass\Controler\Router;
class View
{
    private $file;

    public function __construct($action)
    {
        $this->file = "View/view" . $action . ".php";
    }
    public function generate($data)
    {
        $contents = $this->generateFile($this->file, $data);
        $view = $this->generateFile('View/gabarit.php', array('contents' => $contents));
        echo $view;
    }

    private function generateFile($file, $data)
    {   
        if (file_exists($file))
        {
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }
        else
        {
            throw new \Exception("Fichier '$file' introuvable");
        }
    }
}