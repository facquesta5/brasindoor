<?php
require("../../config/config_3.php");
$obj = new Banco;
if($_POST['id'])
{
$id=mysql_escape_String($_POST['id']);
$sql = "delete from socios where id='$id'";
mysql_query($sql);

}
?>