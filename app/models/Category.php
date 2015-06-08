<?php

class Category extends \Phalcon\Mvc\Model
{	

	public function getCategories($db)
	{
    	
    	$categories = $db->fetchAll("select * from categorias", Phalcon\Db::FETCH_ASSOC);

    	return $categories;

    	//printr($users);

	}

	public function getCustomerByName($db, $login, $senha)
	{
		$users = $db->fetchOne("SELECT * FROM usuario where usuario = '{$login}' and senha = '{$senha}' ", Phalcon\Db::FETCH_ASSOC);

		return $users;
	}

}