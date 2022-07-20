<?php
$objUser = new User;
$tabela = "socios";
$ultimoId = $objUser->ultimo_id($tabela);

$url = $_SERVER['REQUEST_URI'];
$no_id = explode("=", $url);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo $_SESSION["host1"]; ?>css/menuLateral.css" rel="stylesheet" type="text/css" />
<script>
$(document).ready(function() {
  
	var host = "<?php echo $_SESSION['host1']; ?>";
	var alterar_assoc = host + "alterar_assoc.php?id_assoc=";
	var i = 1;
	var f = 0;
	for(i=1;i<=<?php echo $ultimoId[0]; ?>;i++){
		if(location == alterar_assoc + i.toString()){
				f = 1;
				break;
		}
	}
	if(location == host +"lista_assoc.php" || location == host +"cadastrar_assoc.php" || 
	location == host +"cadastro_assoc_gerencia.php"){
		f = 1;
	}
	if(f == 1)	
	{
		$('#associacao').addClass("disponivel");
	}
	
	
	
	$("#firstpane p.menu_head").click(function(){
		$(this).css({backgroundImage:"url(down.png)"})
		.next("div.menu_body")
		.slideToggle(300)
		.siblings("div.menu_body")
		.slideUp("slow");
		$(this).siblings().css({backgroundImage:""});
	 });
 
});
  </script>
</head>

<body>

	<div id="firstpane" class="menu_list">
              <p class="menu_head">Associa&ccedil;&atilde;o</p>
                    <div class="menu_body" id="associacao">
                        <a href="<?php echo $_SESSION["host1"]; ?>lista_assoc.php" class="lista-assoc">Lista de Associados</a>
                        <a href="<?php echo $_SESSION["host1"]; ?>cadastrar_assoc.php" class="lista-assoc">Cadastrar Associado</a>
                    </div>
              <p class="menu_head">Not&iacute;cias</p>
                    <div class="menu_body" id="noticias">
                        <a href="<?php echo $_SESSION["host1"]; ?>noticias.php?type=1" >Adicionar not&iacute;cia</a>
                        <a href="<?php echo $_SESSION["host1"]; ?>noticias.php?type=2" >Listar not&iacute;cias</a>
                    </div>
              <?php if(isset($_SESSION['id'])){	?>
              <p class="menu_head"><a href="?q=logout">Logout</a></p> 
         	  <?php } ?>   
          </div>
          
</body>
</html>
