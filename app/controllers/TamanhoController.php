<?php

use Phalcon\Mvc\Controller;

class TamanhoController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

        $sizes = new Size();
        $tamanhos = $sizes->getSizes($this->db);
        
        $this->view->setVar('tamanhos', $tamanhos);

    	//$this->view->disable();
        
    }

    public function welcomeAction()
    {

        $this->view->setVar("session", $_SESSION);

        //$this->view->disable();
    }


}