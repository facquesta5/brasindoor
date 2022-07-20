<?php
session_start();
include 'config/config_1.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<title>Brasindoor</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/default.css" rel="stylesheet" type="text/css" />
</head>

<body>

	<?php include"topo.php"; ?>

<div id="content">
	<?php include"colunaEsquerda.php"; ?>
 
	<div id="columnB" >
    <div class="mioloTitulo"><h1>Lista de Associados</h1></div>
        <div class="conteudo">
    		
<p>A lista de associados est&aacute; dividida de acordo com as seguintes categorias:</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
 <tr>
  <th>PESSOA JUR&Iacute;DICA</th>
  </tr>
  
 
  <?php
include "config/db.php";
$r = mysql_query("SELECT * FROM socios WHERE TIPO = 'PJ' AND id_status = 1 ORDER BY NOME"); 
//PJ = Pessoa Jurídica

while ($linha = mysql_fetch_array($r))//loop
  {
  ?>
  <tr><td>
  <?php echo $linha['nome']; ?>
 
   </td></tr>
 
 
 <?php } ?>
 
 
 </table>
  <br><br>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
  <th>PESSOA F&Iacute;SICA - PROFESSORES </th>
  </tr>
  <?php

$r = mysql_query("SELECT * FROM socios WHERE TIPO = 'PFE' AND id_status = 1 ORDER BY NOME"); 
//PFE = Pessoa Física - Professores
 
while ($linha = mysql_fetch_array($r))//loop
  {
 echo "<tr>
  <td>"; echo $linha['nome']; echo"</td></tr>";
 }
 ?>
 </table>
	<br><br>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
  <th>PESSOA F&Iacute;SICA - <strong>PROFISSIONAIS</strong> </th>
  </tr>
   <?php

$r = mysql_query("SELECT * FROM socios WHERE TIPO = 'PFA' AND id_status = 1 ORDER BY NOME"); 
//PFA = Pessoa física - Profissionais

while ($linha = mysql_fetch_array($r))//loop
  {
 echo "<tr>
  <td>"; echo $linha['nome']; echo"</td></tr>";
 }
 ?>
 </table>
	<br><br>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
  <th><strong>BIBLIOTECA E CENTRO DE DOCUMENTA&Ccedil;&Atilde;O</strong></th>
  </tr>
   <?php

$r = mysql_query("SELECT * FROM socios WHERE TIPO = 'BCD' AND id_status = 1 ORDER BY NOME"); 
//BCD = BIBLIOTECA E CENTRO DE DOCUMENTAÇÃO

while ($linha = mysql_fetch_array($r))//loop
  {
 echo "<tr>
  <td>"; echo $linha['nome']; echo"</td></tr>";
 }
 ?>
 </table>
	<br><br>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
  <th><strong>MEMBROS HONOR&Aacute;RIOS</strong></th>
  </tr>
 <tr>
 <?php
$r = mysql_query("SELECT * FROM socios WHERE TIPO = 'MH' AND id_status = 1 ORDER BY NOME");
//MH = Membros Honorários

while ($linha = mysql_fetch_array($r))//loop
  {
 echo "<tr>
  <td>"; echo $linha['nome']; echo"</td></tr>";
 }
 ?>
 </table>

        
        </div>
	</div>
    <div style=" clear:both;">&nbsp;</div>
</div>

<?php include"rodape.php"; ?>
</body>
</html>
