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
include 'topo.php';
?>
<div class="column-1 col-lg-8 col-md-12">
    <h4 class="list-group-item list-group-item-action py-3 lh-tight">
    </h4>
    <div class="conteudo">
    </div>
</div>
<?php include 'footer.php'; ?>