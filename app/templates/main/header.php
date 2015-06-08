<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
    <script src="js/jquery.js"></script> 
    <script src="../js/jquery.js"></script> 
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/loja.js"></script>
    <script src="../bootstrap/js/loja.js"></script>
    <script src="js/jquery.maskedinput.js"></script>
    <script src="../js/jquery.maskedinput.js"></script>
    <script src="js/mask.js"></script>
    <script src="../js/mask.js"></script>
    <script src="js/plus.js"></script>
    <script src="../js/plus.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$template_title?></title>
</head>
<body>

<?php
$template->loads('main/menu', array(
    'menu' => array(
        'Home' => 'index/welcome',
        'Produtos' => 'produtos',
        'Clientes' => 'clientes',
        'Categorias' => 'categorias',
        'Tamanhos' => 'tamanho',
        'Vendas' => 'vendas'
    )
));
?>
