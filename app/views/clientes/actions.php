<?php

include '../bootstrap.php';

$requestgp = $_REQUEST;


if(verificaIssetNotEmptyValue('a')) {
    delete($conexao, $alert, $requestgp);

}elseif(verificaIssetNotEmptyValue('search_cpf')){
    selectFromCpf($conexao, $alert, $requestgp);

}elseif(verificaIssetNotEmptyValue('cc')){
    insert($conexao, $alert, $requestgp);
    
}elseif(verificaIssetNotEmptyValue('up')){
    update($conexao, $alert, $requestgp); 
}

function verificaIssetNotEmptyValue($paramRequest){
    if(isset($_REQUEST[$paramRequest]) && !empty($_REQUEST[$paramRequest]))
        return true;
    else
        return false;
}

function delete($conexao, $alert, $var){
    $id = $var['a'];

    $delete = $conexao->query("DELETE FROM clientes where id ={$id}");

    if ($delete)
        $alert->getResultQuery('delete', 1, 'clientes');
    else
        $alert->getResultQuery('delete', 0, 'clientes');
}

function selectFromCpf($conexao, $alert, $var){

    $cpf = $var['search_cpf'];
    $select_clientes = $conexao->query("SELECT * FROM clientes where cpf = '$cpf' ");
    if($select_clientes->num_rows <= 0) {
        $alert->getResultQuery('encontra', 0, 'clientes');
    } else {
        $var = json_encode($select_clientes->fetch_assoc());
        header("Location: index.php?cliente={$var}");
    }

}

function insert($conexao, $alert, $var){

    $cpf = $var['cpf'];

    $confirm = $conexao->query("SELECT id, cpf FROM clientes where cpf = '{$cpf}' ");

    if($confirm->num_rows > 0){
        $alert->getResultQuery('insert', 2, 'clientes');
    }
    $nome = addslashes($var['nome']);
    $rua = addslashes($var['rua']);
    $numero = addslashes($var['numero']);
    $complemento = addslashes($var['complemento']);
    $bairro = addslashes($var['bairro']);
    $cidade = addslashes($var['cidade']);
    $telefone1 = addslashes($var['telefone1']);
    $telefone2 = addslashes($var['telefone2']);
    $naocadastrado = 'nao cadastrado';

    if(empty($rua))
        $rua = $naocadastrado;
    if(empty($numero))
        $numero = '0000';
    if(empty($complemento))
        $complemento = $naocadastrado;
    if(empty($bairro))
        $bairro = $naocadastrado;
    if(empty($telefone1))
        $telefone1 = '000000000';
        

    $insert_usuario = $conexao->query("INSERT INTO 
                                        clientes(nome, cpf, rua, numero, complemento, bairro, cidade, telefone1, telefone2)
                                        VALUES('$nome', '$cpf', '$rua', '$numero', '$complemento', '$bairro', '$cidade', '$telefone1', '$telefone2')
                                    ");
    if($insert_usuario){
        $alert->getResultQuery('insert', 1, 'clientes');
    }else{
        $alert->getResultQuery('insert', 0, 'clientes');
    }
}


function update($conexao, $alert, $var){
    $id = $var['id'];
    $nome = addslashes($var['new_nome']);
    $rua = addslashes($var['new_rua']);
    $numero = addslashes($var['new_numero']);
    $complemento = addslashes($var['new_complemento']);
    $bairro = addslashes($var['new_bairro']);
    $cidade = addslashes($var['new_cidade']);
    $telefone1 = $var['new_telefone1'];
    $telefone2 = $var['new_telefone2'];

    $atualizar = $conexao->query("UPDATE clientes set 
                                    nome = '$nome',
                                    rua = '$rua',
                                    numero = '$numero',
                                    complemento = '$complemento',
                                    bairro = '$bairro',
                                    cidade = '$cidade',
                                    telefone1 = '$telefone1',
                                    telefone2 = '$telefone2'
                                where id = {$id}");
    if(!$conexao->error){
        $alert->getResultQuery('atualiza', 1, 'clientes');
    } else {
        $alert->getResultQuery('atualiza', 0, 'clientes');
    }
}