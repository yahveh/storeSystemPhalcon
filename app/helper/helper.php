<?php

require_once('../app/system/Template.php');

$template = new Template(
    '../app/templates',
    'template_',
    '../lojaPhalcon/'
);

function getIndex(){
    $var = explode('/',$_SERVER['SCRIPT_NAME']);
    if(count($var) == 4)
        return 'home';
    $file = $var[count($var)-1];
    unset($var);
    if($file == 'index.php')
        return 'index';
    else
        return 'submenu';
}



function printr($val){
	if (is_object($val) || is_array($val)) {
		echo '<pre>';
		print_r($val);
		echo '</pre>';
	} elseif (empty($val) || is_resource($val)) {
		echo '<pre>';
		var_dump($val);
		echo '</pre>';
	} else
		echo $val;
}

function printrx($str){
	die(printr($str));
}

function vardump($string){
	echo '<pre>';
	var_dump($string);
	echo '</pre>';
}

function echobr($string)
{
	echo $string;
	echo '<br>';
}

function toValor($valor, $valor_parcial)
{
	$valor = str_replace(',', '.', str_replace('.', '', $valor));
	$valor_parcial += $valor;

	return $valor_parcial;
}


function normalize($string)
{	
	return ucwords(strtolower($string));
}

function formatData($time)
{
	$explosao = explode(' ', $time);
	$data = explode('-', $explosao[0]); // data
	$hora = explode(':', $explosao[1]); // hora

	return $data[2].'/'.$data[1].'/'.$data[0].' '.$hora[0].':'.$hora[1];
}


function jsonToArray($json)
{		
    $object = (array) json_decode($json);
	$arr = array();	
	foreach($object as $key => $array){
		$arr[$key] = (array) $array;
	}
	return $arr;
}

function getStatusPgto($tipo)
{
    switch($tipo){
        case "1":
            $forma = "Pago";
            break;
        case "2":
            $forma = "Em Pagamento";
            break;
        case "3":
            $forma = "A Pagar";
            break;
        case "4":
            $forma = "Devendo";
            break;
        case "5":
        default:
            $forma = "Outros";
            break;
    }

    return $forma;
}

$status_pagamento = array(1 => "Pago", 2 => "Em Pagamento", 3 => "A Pagar", 4 => "Devendo", 5 =>    "Outros");
/*
$cat = $conexao->query("SELECT * from categorias");
while($ret = $cat->fetch_assoc()){
    extract($ret);
    $categorias[$nome] = $id;
}

$catall = $conexao->query("SELECT * from categorias order by nome ASC");
while($ret = $catall->fetch_assoc()){
    extract($ret);
    $categoriasALL[$nome] = $id;
}

$generos = ['Unissex' => 0, 'Masculino' => 1, 'Feminino' => 2];

$tam = $conexao->query("SELECT * FROM tamanhos");
while($tamanho = $tam->fetch_assoc()){
    extract($tamanho);
    $tamanhos[$tamanho] = $id;
}

if(is_array($tamanhos))
foreach ($tamanhos as $key => $ret){
    $tamanhosr[$ret] = $key;
}

*/

$espaco = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
$espaco0 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
$espaco1 = $espaco0."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
$espaco2 = $espaco1."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
$espaco3 = $espaco2."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";