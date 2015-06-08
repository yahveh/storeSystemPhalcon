<?php

class Size extends \Phalcon\Mvc\Model
{	

	public function getSizes($db)
	{
    	
    	$sizes = $db->fetchAll("select * from tamanhos", Phalcon\Db::FETCH_ASSOC);

    	return $sizes;

    	//printr($users);

	}

	public function getCustomerByName($db, $login, $senha)
	{
		$users = $db->fetchOne("SELECT * FROM usuario where usuario = '{$login}' and senha = '{$senha}' ", Phalcon\Db::FETCH_ASSOC);

		return $users;
	}

}