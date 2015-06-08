<?php

use Phalcon\Mvc\Controller;

class IndexController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

         $this->dispatcher->forward(array(
                "controller" => "signin",
                "action" => "index"/*,
                "params" => array('login' => $login, 'senha' => $senha)*/
        ));

        /*
    	$users = new Users();

    	$users->in();

    	$usuarios = $users->getUsuarios($this->db);

    	$users->out();

    	$this->view->setVar("usuarios", $usuarios);*/
    	//$this->view->disable();
    }

    public function welcomeAction()
    {

        $this->view->setVar("session", $_SESSION);

        //$this->view->disable();
    }

    private function old_loja()
    {


		$login = addslashes($_REQUEST['login']);
		$senha = addslashes($_REQUEST['senha']);

		$procura = $conexao->query("SELECT * FROM usuario where usuario = '$login' and senha = '".md5($senha)."'");

		if($procura->num_rows > 0){

		    session_start();
		    
		    $_SESSION["usuario"]= $login;
		    $_SESSION["senha"]= $senha;
		    $_SESSION["logado"]= true;
		    //$_SESSION["nivel"]=$dados["nivel"];

		    header("Location: ../index.php?i=1");

		}else{
			header("Location: ../login.php?i=f");
		}
    }

}