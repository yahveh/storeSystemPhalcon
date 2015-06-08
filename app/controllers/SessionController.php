<?php

class SessionController extends \Phalcon\Mvc\Controller
{

	public function indexAction()
    {
    	$this->initSession($this->dispatcher->getParams());
    	//$this->view->disable();
    }



	public function initSession($params)
	{
		session_start();
	    
	    $_SESSION["usuario"]= $params['login'];
	    $_SESSION["senha"]= $params['senha'];
	    $_SESSION["logado"]= true;
	}
}