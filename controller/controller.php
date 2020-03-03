<?php

//namespace APE\Site\Controller;

/**
 * Class Controller
 */
class Controller
{
    public function render($view, $data) {
        ob_start();
   extract($data);
   include('../view/'.$view.'.php');
   $contenu = ob_get_clean();
   include('../view/template.php');
    }
        
}