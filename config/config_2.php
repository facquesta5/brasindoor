<?php 

include'db.php';

function __autoload($classe){
require_once("../classes/$classe.class.php");
}

$user = new User();
if (isset($_GET['q']) && $_GET['q'] == 'logout'){
    $user->user_logout();
    header("location:$host1");
}
	
?>
	