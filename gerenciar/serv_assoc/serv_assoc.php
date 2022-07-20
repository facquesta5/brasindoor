<?php
session_start(); 
require("../../config/config_3.php");
include '../config/db.php';
$uid = $_SESSION['id'];

if ( $_SESSION['id_nivel'] == 4 ){
	 header("location:../login.php");
}

if (!$user->get_session()){
   header("location:../login.php");
}

if(isset($_GET['q'])){
	if($_GET['q'] == 'logout'){
		$user->user_logout();
		header("location:../login.php");
	}
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Brasindoor</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="../css/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> 
<script type="text/javascript" src="../../js/EditDeletePage_serv.js"></script> 
</head>
<body>

<?php include"../topo.php"; ?>

<div id="content">
	<div class="columnA">
    	<?php include'../colunaEsquerda.php';?>
    </div>
	
	<div class="columnB" >
		<div class="mioloTitulo">Associados</div>
		<div class="conteudo">
			<div id="loading"></div>
    
  			<div id="container"></div>
		</div>               
	</div>

</div>


</body>
</html>
