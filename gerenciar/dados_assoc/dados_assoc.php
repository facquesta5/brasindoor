<?php
session_start(); 
require("../../config/config_3.php");
include '../config/db.php';
$uid = $_SESSION['id'];

if ($_SESSION['id_nivel'] == 4 ){
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

<?php include"../topo.php"; ?>
<div id="content">
	<div class="columnA">
    	<?php include'../colunaEsquerda.php';?>
    </div>
	
	<div class="columnB" >
		<div class="conteudo">
			<div class="mioloTitulo">Associados</div>
	        <div id="loading"></div>
			<div id="container"></div>
		</div>               
	</div>
</div>

