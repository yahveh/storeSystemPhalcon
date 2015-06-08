<?php

use Phalcon\Mvc\Controller;

class VendasController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $sales =  new Sales();
    	$vendas = $sales->getSales($this->db);
    	
    	//$this->view->disable();
    	if(!is_array($vendas) && count($vendas) < 1){
    		$vendas = array();
		}
    		$this->view->setVar("vendas", $vendas);

	
	}

    public function cadastraAction()
    {
        
    }

}

?>