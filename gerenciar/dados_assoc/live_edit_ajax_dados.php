<?php
require("../../config/config_3.php");
$obj = new Banco;
if($_POST['id'])
{
$id=mysql_escape_String($_POST['id']);
$nome=mysql_escape_String($_POST['nome']);
$tipo=mysql_escape_String($_POST['tipo']);
$endereco=mysql_escape_String($_POST['endereco']);
$bairro=mysql_escape_String($_POST['bairro']);
$cep=mysql_escape_String($_POST['cep']);
$cidade=mysql_escape_String($_POST['cidade']);
$uf=mysql_escape_String($_POST['uf']);
$fone=mysql_escape_String($_POST['fone']);
$fax=mysql_escape_String($_POST['fax']);
$email=mysql_escape_String($_POST['email']);
$site=mysql_escape_String($_POST['site']);



$nome=utf8_decode($nome);
$tipo=utf8_decode($tipo);
$endereco=utf8_decode($endereco);
$bairro=utf8_decode($bairro);
$cep=utf8_decode($cep);
$cidade=utf8_decode($cidade);
$uf=utf8_decode($uf);
$fone=utf8_decode($fone);
$fax=utf8_decode($fax);
$email=utf8_decode($email);
$site=utf8_decode($site);

$sql = "update socios set nome ='$nome', tipo ='$tipo', endereco ='$endereco', bairro='$bairro', cep='$cep', cidade='$cidade', uf='$uf', fone='$fone', fax='$fax', email='$email', site='$site' where id='$id'";
mysql_query($sql);

}
?>