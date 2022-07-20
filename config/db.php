<?php

$url = $_SERVER['REQUEST_URI'];
$barras = explode('/',$url);
$_SESSION["host1"] = '';
$host1 = $_SESSION["host1"];


$config = array (
	'servidor' => '127.0.0.1',
	'banco' => 'brasindoor1',
	'usuario' => 'root',
	'senha' => ''
	);
/*
echo $_SESSION["host1"] ;	

  $config = array (
	'servidor' => '191.252.115.89',
	'banco' => 'brasindoor1',
	'usuario' => 'brasindoor1',
	'senha' => 'hocpoc@01'
	);
*/


?>