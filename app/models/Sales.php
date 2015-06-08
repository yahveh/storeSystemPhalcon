<?php

class Sales extends \Phalcon\Mvc\Model
{	

	public function getSales($db)
	{
    	
    	$sales = $db->fetchAll("select * from vendas", Phalcon\Db::FETCH_ASSOC);

    	return $sales;

    	//printr($users);

	}

	public function getCustomerByName($db, $login, $senha)
	{
		$users = $db->fetchOne("SELECT * FROM usuario where usuario = '{$login}' and senha = '{$senha}' ", Phalcon\Db::FETCH_ASSOC);

		return $users;
	}

}