<?php

use Phalcon\Mvc\Controller;

class ClientesController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $clientes = new Cliente();

        $allClientes = $clientes->getCustomers($this->db);

        printr($allClientes);

    	$this->view->setVar("allClientes", $allClientes);

    	//$this->view->disable();
    }

    public function welcomeAction()
    {

        $this->view->setVar("session", $_SESSION);

        //$this->view->disable();
    }

    public function editarAction()
    {
        echo 'oi edit';
        //$this->view->disable();
    }

}