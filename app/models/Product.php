<?php

class Product extends \Phalcon\Mvc\Model
{	

	public function getProducts($db)
	{
    	
    	$produtos = $db->fetchAll("select * from produtos", Phalcon\Db::FETCH_ASSOC);

    	return $produtos;

    	//printr($users);

	}

	public function getCustomerByName($db, $login, $senha)
	{
		$users = $db->fetchOne("SELECT * FROM usuario where usuario = '{$login}' and senha = '{$senha}' ", Phalcon\Db::FETCH_ASSOC);

		return $users;
	}

}