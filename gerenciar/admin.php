<?php
session_start(); 
require("../config/config_2.php");
include 'config/db.php';
$uid = $_SESSION['id'];
$message = $_SESSION['msg_done'];

if (empty($_SESSION['id']) || $_SESSION['id_nivel'] != 1 ){
	 header("location:login.php");
}


if (!$user->get_session()){
   header("location:login.php");
}

if(isset($_GET['q'])){
	if($_GET['q'] == 'logout'){
		$user->user_logout();
		header("location:login.php");
	}
}


?>

<?php include"topo.php"; ?>
<div id="content">
	<div class="columnA">
    	<?php include'colunaEsquerda.php';?>
    </div>
	
	<div class="columnB" >
		<div class="mioloTitulo">Admin</div>
		<div class="conteudo" style="min-height:500px;">
		<?php echo $message; ?>
		</div>               
	</div>
</div>


<?php include'../rodape.php'; ?>