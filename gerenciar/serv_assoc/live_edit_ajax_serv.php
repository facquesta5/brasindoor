<?php
require("../../config/config_3.php");
$obj = new Banco;
if($_POST['id'])
{
$id=mysql_escape_String($_POST['id']);
$t1=mysql_escape_String($_POST['t1']);
$t2=mysql_escape_String($_POST['t2']);
$t3=mysql_escape_String($_POST['t3']);
$t4=mysql_escape_String($_POST['t4']);
$t5=mysql_escape_String($_POST['t5']);
$t6=mysql_escape_String($_POST['t6']);
$t7=mysql_escape_String($_POST['t7']);
$t8=mysql_escape_String($_POST['t8']);
$t9=mysql_escape_String($_POST['t9']);
$t10=mysql_escape_String($_POST['t10']);
$t11=mysql_escape_String($_POST['t11']);
$t12=mysql_escape_String($_POST['t12']);
$t13=mysql_escape_String($_POST['t13']);
$t14=mysql_escape_String($_POST['t14']);
$t15=mysql_escape_String($_POST['t15']);
$t16=mysql_escape_String($_POST['t16']);
$t17=mysql_escape_String($_POST['t17']);
$t18=mysql_escape_String($_POST['t18']);
$t19=mysql_escape_String($_POST['t19']);
$t20=mysql_escape_String($_POST['t20']);


$sql = "update socios set t1 ='$t1', t2 ='$t2', t3 ='$t3', t4='$t4', t5='$t5', t6='$t6',t7='$t7', t8='$t8', t9='$t9', t10='$t10', t11='$t11', t12='$t12', t13='$t13', t14='$t14', t15='$t15', t16='$t16', t17='$t17', t18='$t18', t19='$t19', t20='$t20' where id='$id'";
mysql_query($sql);

}
?>