<?php

use Phalcon\Mvc\Controller;

class ProdutosController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	$products =  new Product();
    	$produtos = $products->getProducts($this->db);
    	
    	//$this->view->disable();
    	if(!is_array($produtos) && count($produtos) < 1){
    		$produtos = array();
		}
    		$this->view->setVar("produtos", $produtos);

	
	}

    public function cadastraAction()
    {
        
    }

}

?>