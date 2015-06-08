<?php

class Users extends \Phalcon\Mvc\Model
{	

	public function getUsuarios($db)
	{
    	
    	$users = $db->fetchAll("select * from usuario", Phalcon\Db::FETCH_ASSOC);

    	return $users;

    	//printr($users);

	}

	public function getUsuarioByLoginSenha($db, $login, $senha)
	{
		$users = $db->fetchOne("SELECT * FROM usuario where usuario = '{$login}' and senha = '{$senha}' ", Phalcon\Db::FETCH_ASSOC);

		return $users;
	}



	public function in()
	{
		echo 'model loaded<hr>';
	}

	public function out()
	{
		echo "<hr>bye<hr>";
	}
}