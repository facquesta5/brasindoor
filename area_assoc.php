<?php 
session_start();
require("config/config_1.php");

$uid = $_SESSION['id_usuario'];

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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Brasindoor</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.5/jquery.min.js"></script>
</head>

<body>



<?php include"topo.php"; ?>

<div id="content">
	<?php include"colunaEsquerda.php"; ?>
 
	<div id="columnB" >
    		<div class="mioloTitulo"><h1>&Aacute;rea de associados</h1></div>

     
            <div class="conteudo" style="margin-left:0px; padding-left:0px;">
             
   				<div id="bem-vindo">
                Bem-vindo <strong><?php echo $_SESSION['nome']; ?></strong>
                </div>
               	
                    
                        
            
            	 
            </div>
        
   	</div>
        
    <div style=" clear:both;">&nbsp;</div>
</div>

<?php include"rodape.php"; ?>

</body>
</html>
