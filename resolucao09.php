<?php
session_start();
error_reporting(0);
require("config/config_1.php");
include_once 'wall/includes/functions.php';
include_once 'wall/includes/tolink.php';
include_once 'wall/includes/time_stamp.php';
include_once 'wall/session.php';

$Wall = new Wall_Updates();
$updatesarray=$Wall->Updates($uid);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Brasindoor</title>
<link href="<?php echo $_SESSION['wall/host1']; ?>wall/css/wall.css" rel="stylesheet" type="text/css">
<link href="<?php echo $_SESSION['wall/host1']; ?>css/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
 <script type="text/javascript" src="wall/js/jquery.oembed.js"></script>
 <script type="text/javascript" src="wall/js/wall.js"></script>
</head>


<body>

<?php include"topo.php"; ?>

<div id="content">
	<?php include"colunaEsquerda.php"; ?>
 
	<div id="columnB" >
    
  			 <div class="mioloTitulo">Resolução no 09/2003 da ANVISA</div>
<div class="ConteudoTXTInterno"><p>A Resolução no 09/2003 da ANVISA, que trata dos parâmetros utilizados para o controle da Qualidade do Ar de Interiores, tem sido alvo de diversos debates em diferentes fóruns.<br>
<br>
<a href="<?php echo $_SESSION['wall/host1']; ?>pdf/Resolu&ccedil;&atilde;o RE 09-2003 ANVISA - Padr&otilde;es Referenciais.pdf" target="_blank">- <strong>Resolu&ccedil;&atilde;o RE 09-2003 ANVISA - Padr&otilde;es Referenciais</strong></a><strong></strong><br><br>
A BRASINDOOR abre um canal para que você também deixe suas sugestões.</p>
<h2>Deixe seu comentário</h2>
</div>


<div id="wall_container">
<div id="updateboxarea">
<h4>What's up?</h4>
<form method="post" action="">
<textarea cols="30" rows="4" name="update" id="update" maxlength="1200" ></textarea>
<br />
<input type="submit"  value=" Update "  id="update_button"  class="update_button"/>
</form>
</div>
<div id='flashmessage'>
<div id="flash" align="left"  ></div>
</div>
<div id="content">

<?php include('wall/load_messages.php'); ?>

</div>
</div>

  
  
   	</div>
        
    <div style=" clear:both;">&nbsp;</div>
</div>

<?php include"rodape.php"; ?>

</body>
</html>
