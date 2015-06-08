<?php

class SigninController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	//echo 'oi';
    	//$this->view->disable();
    }

    public function getLoginAction()
    {
        if(!$this->request->isPost()){
            return false;
        }

        $login = addslashes($this->request->getPost('login'));
        $senha = md5(addslashes($this->request->getPost('senha')));

        $users = new Users();
        $usuarios = $users->getUsuarioByLoginSenha($this->db, $login, $senha);
        
        if($usuarios && is_array($usuarios)){
            $this->dispatcher->forward(array(
                "controller" => "session",
                "action" => "index",
                "params" => array('login' => $login, 'senha' => $senha)
            ));
            header("Location: /lojaPhalcon/index/welcome");
            
        }else{
            header("Location: /lojaPhalcon/");
        }

        $this->view->disable();
    }


    public function testeAction()
    {
    	echo 'teste';
    	$this->view->disable();
    }

    public function modelsAction()
    {
    	$user =  new Users();
    	$user->oi();
    }

    public function registerAction()
    {
    	$user = new Users();

    	$success = $user->save($this->request->getPost(), array('name', 'email'));

    	if($success){
    		echo "Thanks for register";
    	}else{
    		echo "Sorry,  the following  problems were generated: ";
    		foreach($user->getMessages() as $message){
    			echo $message->getMessage(), "<br>";
    		}
    	}

    	//$this->view->disable();

    }

}