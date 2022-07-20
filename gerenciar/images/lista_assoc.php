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
		<div class="conteudo lista-assoc">
		<table width="814" border="0">
          <tr>
            <td class="titulo-assoc" width="50%">Nome</td>
            <td class="titulo-assoc center" width="22%">Tipo</td>
            <td class="titulo-assoc center" width="12%">Status</td>
            <td class="titulo-assoc center" width="8%">Alterar</td>
            <td class="titulo-assoc center" width="8%">Excluir</td>
          </tr>
         <?php
		$obj = new Banco;
		$oque = "id, nome, tipo, id_status";
		$tabela = "socios";
		$id_tabela = "id";
		$dados = $obj->listarStatements($oque, $tabela, $id_tabela);
		
		$muda = "";    
		
		foreach($dados as $linha) {
		$cores = array('#1b2a3b','#303030');
		$muda = $muda +1;
		$cor = $cores[$muda%2];	
		if($linha['tipo'] == "PJ"){
			$tipo = "pessoa Juridica";
		}
		if($linha['tipo'] == "PFE"){
			$tipo = "Professor";
		}
		if($linha['tipo'] == "PFA"){
			$tipo = "Profissional";
		}
		if($linha['tipo'] == "BCD"){
			$tipo = "Membro Honorário";
		}
		if($linha['id_status'] == 0 || $linha['id_status'] == "" || $linha['id_status'] == NULL){
			$status = "fcd207";
		}	
		if($linha['id_status'] == 1){
			$status = "4ab647";
		}
		if($linha['id_status'] == 2){
			$status = "e43834";
		}	
		?>
          <tr bgcolor='<?php echo $cor; ?>'>
            <td><?php echo utf8_encode($linha['nome']); ?></td>
            <td class="center"><?php echo $tipo; ?></td>
            <td class="center" bgcolor="#<?php echo $status; ?>"></td>
            <td class="center"><a href="alterar_assoc.php?id_assoc=<?php echo $linha['id']; ?>"><img src="images/editar.png"  /></a></td>
            <td class="center"><img src="images/excluir.png"  /></td>
          </tr>
         <?php
		 }
		 ?> 
        </table>
		</div>
		                             
	</div>
</div>


</body>
</html>