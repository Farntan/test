<?php

namespace controller;

use classes\Controller;



class Test1Controller extends Controller
{
    
    public function getView (){
        require_once('./view/header.php');
        extract( ['name'=>'Test №2']);

        // Start output buffering
        ob_start();
        require_once('./view/body.php');
        $output = ob_get_clean();
        if (!$print) {
            return $output;
        }
        echo $output;



        require_once('./view/footer.php');


    }



}