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



include"topo.php"; ?>
<div id="content">
	<div class="columnA">
    	<?php include'colunaEsquerda.php';?>
    </div>
	
	<div class="columnB" >
    <form name="acoes_em_massa" id="acoes_em_massa" method="post" action=""> 
		<div class="mioloTitulo">Admin</div>
        <div class="acoes_em_massa">
        	<p>Pesquisar por nome:</p>
        	<input type="text" name="search" id="search"  />
        	
            <div class="list-assoc-btn">
                <button id="check-all" class="btn btn-info">marcar todos</button>
                <button id="uncheck-all" class="btn btn-info" >desmarcar todos</button>
            </div>
            <select name="acao_select" id="acao_select">
            	<option value="0" selected="selected">*** Selecione ***</option>
            	<option value="ativar">Ativar</option>
                <option value="inativar">Inativar</option>
                <option value="excluir">Excluir</option>
            </select>
        </div>
       
		<div class="conteudo lista-assoc" >
        
		<table width="814" border="0" id="check_list">
          <tr>
            <td class="titulo-assoc" width="50%">Nome</td>
            <td class="titulo-assoc center" width="28%">Tipo</td>
            <td class="titulo-assoc center" width="6%">Status</td>
            <td class="titulo-assoc center" width="8%">Alterar</td>
            <td class="titulo-assoc center" width="8%">Excluir</td>
          </tr>
         <?php
		$obj = new Banco;
		$oque = "id, nome, tipo, id_status";
		$tabela = "socios";
		$id_tabela = "id";
                $limit = "";
		$dados = $obj->listarStatements($oque, $tabela, $id_tabela, $limit);
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
		if($linha['tipo'] == "MH"){
			$tipo = "Membro Honorário";
		}
		if($linha['tipo'] == "BCD"){
			$tipo = "Bíblioteca e C. de Doc.";
		}
		if($linha['id_status'] == 0 || $linha['id_status'] == "" || $linha['id_status'] == NULL){
			$class = "alerta";
		}	
		if($linha['id_status'] == 1){
			$class = "ativo";
		}
		if($linha['id_status'] == 2){
			$class = "inativo";
		}	
		?>
          <tr bgcolor='<?php echo $cor; ?>'>
            <td><?php echo utf8_encode($linha['nome']); ?></td>
            <td class="center"><?php echo $tipo; ?></td>
            <td class="<?php echo $class; ?>" id="color_status<?php echo $linha['id']; ?>" >
            
            	<input type="checkbox" class="checkbox" name="id_status<?php echo $linha['id']; ?>" id="id_status<?php echo $linha['id']; ?>"   value="<?php echo $linha['id']; ?>" />
            </form>    
            </td>
            <td class="center">
            	<a href="alterar_assoc.php?id_assoc=<?php echo $linha['id']; ?>"><img src="images/editar.png"  /></a>
            </td>
            <td class="center"><img src="images/excluir.png"  /></td>
          </tr>
          
         <?php
		 }
		 ?>
          <script type="text/javascript">
			$(document).ready(function(){
				/*
				$("#search").keyup(function(){
					var t3;
					<?php
					$dados = "";
					?>
					function timeMsg(str){
						stremail = str;
						clearTimeout(t3);
						t3 = setTimeout("consulta(stremail)",2000);
					}
					function consulta(){
						var str = $("#search");
						var strPost = str.val();
						$.post("sdgdfgsdf.php", { 
						str: strPost},
						function(data){
						});
					}
				});
				*/
				
				/* select function */
				<?php
				$objUser = new User;
		  		$ultimoId = $objUser->ultimo_id($tabela); 
		  		?>
				
				$("select").change(function(){
				
					var acao = $("#acao_select");
					var acaoPost = acao.val();
						
						var n = 0;
						for(e = 1; e<= <?php echo $ultimoId[0]; ?>; e++){
							if($("#id_status"+e).attr('checked')){
								var n = n + 1;
							}
						}
						
						if(n > 0){
                                                    
                                                        if(acaoPost == "excluir"){
                                                            var answer = confirm("Deseja realmente EXCLUIR os seguintes itens?");    
                                                            if(answer){
                                                                alert("chupetex");
                                                            }   
                                                        }
							if(acaoPost == "ativar"){
								var answer = confirm("Deseja realmente ATIVAR os seguintes itens?");
								if(answer){
									for(i = 1; i<= <?php echo $ultimoId[0]; ?>; i++){
										if($("#id_status"+i).attr('checked')){
											
											var assoc = $("#id_status"+i);
											var assocPost = assoc.val();
											
											$.post("funcao_massa.php", { 
											acao: acaoPost, assoc: assocPost
											},
											function(data){
												var idAssoc = data.substring(1);
												$("#color_status"+idAssoc).removeClass("inativo");
												$("#color_status"+idAssoc).addClass("ativo");
												if($("#id_status"+idAssoc).attr('checked')){
													$("#id_status"+idAssoc).attr('checked', false);
												}
											});
										}
									}		
								}
							}
							if(acaoPost == "inativar"){
								var answer = confirm("Deseja realmente INATIVAR os seguintes itens?");
								if(answer){
									for(i = 1; i<= <?php echo $ultimoId[0]; ?>; i++){
										if($("#id_status"+i).attr('checked')){
											
											var assoc = $("#id_status"+i);
											var assocPost = assoc.val();
											
											$.post("funcao_massa.php", { 
											acao: acaoPost, assoc: assocPost
											},
											function(data){
												var idAssoc = data.substring(1);
												$("#color_status"+idAssoc).removeClass("ativo");
												$("#color_status"+idAssoc).addClass("inativo");
												if($("#id_status"+idAssoc).attr('checked')){
													$("#id_status"+idAssoc).attr('checked', false);
												}
											});
										}
									}
								}
							}
							$("select").val(0);
						}
					if(n == 0){
						alert("Selecione algum item antes de escolher uma opção");
						$("select").val(0);
					}	
				});
			});
		</script>
        
        </table>
		</div>                          
	</div>
</div>

<?php include'../rodape.php'; ?>