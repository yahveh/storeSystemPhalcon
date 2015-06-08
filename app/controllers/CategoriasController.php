<?php

use Phalcon\Mvc\Controller;

class CategoriasController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

        $categories = new Category();
        $categorias = $categories->getCategories($this->db);
        
        $this->view->setVar('categorias', $categorias);

    	//$this->view->disable();
        
    }

    public function welcomeAction()
    {

        $this->view->setVar("session", $_SESSION);

        //$this->view->disable();
    }


}