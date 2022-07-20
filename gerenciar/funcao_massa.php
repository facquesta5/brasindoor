<?php
require("../config/config_2.php");
$obj = new Banco;
$acao = $_POST['acao'];
$id = $_POST['assoc'];

if ($acao == 'ativar') {

	$oque = array(
		'id_status' => 1
	);
	$onde = 'socios';
	$id = $_POST['assoc'];
	$id_tabela = 'id';
	$dados = $obj->alterarStatements($oque, $onde, $id, $id_tabela);
}
if ($acao == 'inativar') {
	$oque = array(
		'id_status' => 2
	);
	$onde = 'socios';
	$id = $_POST['assoc'];
	$id_tabela = 'id';
	$dados = $obj->alterarStatements($oque, $onde, $id, $id_tabela);
}
if ($acao == 'excluir') {
	$onde = 'socios';
	$id_tabela = 'id';
	$dados = $obj->removerStatements($onde, $id, $id_tabela);
}
echo $id;
