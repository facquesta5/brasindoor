<?php
require("../../config/config_3.php");
$obj = new Banco;
if($_POST['id'])
{
$id=mysql_escape_String($_POST['id']);

$nome=mysql_escape_String($_POST['nome']);

$sql = "update socios set nome='$nome' where id='$id'";
mysql_query($sql);

}
?>