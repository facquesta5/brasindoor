<?php
session_start();
require("../config/config_2.php");
include 'config/db.php';
$uid = $_SESSION['id'];
$message = $_SESSION['msg_done'];

if (empty($_SESSION['id']) || $_SESSION['id_nivel'] != 1) {
	header("location:login.php");
}


if (!$user->get_session()) {
	header("location:login.php");
}

if (isset($_GET['q'])) {
	if ($_GET['q'] == 'logout') {
		$user->user_logout();
		header("location:login.php");
	}
}

include 'topo.php'; ?>

<div class="column-1 col-lg-8 col-md-12">
	<h4 class="list-group-item list-group-item-action py-3 lh-tight">
		Lista de associados
	</h4>
	<div class="conteudo-admin">
		<form name="acoes_em_massa" id="acoes_em_massa" method="post" action="">
			
				<select class="form-select" name="acao_select" id="acao_select">
					<option value="0" selected="selected">*** Selecione ***</option>
					<option value="ativar">Ativar</option>
					<option value="inativar">Inativar</option>
					<option value="excluir">Excluir</option>
				</select>

			<table class="table table-admin" id="check_list">
				<thead>
					<tr>
						<td>Nome</td>
						<td>Tipo</td>
						<td>Status</td>
						<td>ação</td>
						<td>Alterar</td>
					</tr>
				</thead>
				<?php
				$obj = new Banco;
				$oque = "id, nome, tipo, id_status";
				$tabela = "socios";
				$id_tabela = "id";
				$limit = "";
				$dados = $obj->listarStatements($oque, $tabela, $id_tabela, $limit);
				$muda = "";

				foreach ($dados as $linha) {
					if ($linha['tipo'] == "PJ") {
						$tipo = "pessoa Juridica";
					}
					if ($linha['tipo'] == "PFE") {
						$tipo = "Professor";
					}
					if ($linha['tipo'] == "PFA") {
						$tipo = "Profissional";
					}
					if ($linha['tipo'] == "MH") {
						$tipo = "Membro Honorário";
					}
					if ($linha['tipo'] == "BCD") {
						$tipo = "Bíblioteca e C. de Doc.";
					}
					if ($linha['tipo'] == "ES") {
						$tipo = "Estudante";
					}
					if ($linha['tipo'] == "PSQ") {
						$tipo = "Pesquisador";
					}
					if ($linha['id_status'] == 0 || $linha['id_status'] == "" || $linha['id_status'] == NULL) {
						$class = "alerta";
					}
					if ($linha['id_status'] == 1) {
						$class = "ativo";
					}
					if ($linha['id_status'] == 2) {
						$class = "inativo";
					}
				?>	
					<?php 
							echo "<tr>";
							if( $linha['id_status'] == 1){
								echo "<tr style='background-color:#ddffb9;'>";
							}
							?>
							<td><?php echo utf8_encode($linha['nome']); ?></td>
							<td><?php echo $tipo; ?></td>
							<td class='text-center'><?php 
							$status = 'INATIVO';
							if( $linha['id_status'] == 1){
								$status = 'ATIVO';
							}
							echo $status; ?></td>

							<td class="text-center" class="<?php echo $class; ?>">

								<input type="checkbox" class="checkbox" name="id_status<?php echo $linha['id']; ?>" id="id_status<?php echo $linha['id']; ?>" value="<?php echo $linha['id']; ?>" />
			
							</form>
			</td>
			
			<td class="center">
				<a href="alterar_assoc.php?id_assoc=<?php echo $linha['id']; ?>"><img src="images/editar.png" /></a>
			</td>
			<!-- <td class="center"><img src="images/excluir.png" id="deletar_associado" /></td> -->
			</tr>
	<?php } ?>

	<script type="text/javascript">
		$(document).ready(function() {
			// /* select function */
			<?php
			$objUser = new User;
			$ultimoId = $objUser->ultimo_id($tabela);
			?>

			$("select").change(function() {

				var acao = $("#acao_select");
				var acaoPost = acao.val();

				var n = 0;
				for (e = 1; e <= <?php echo $ultimoId[0]; ?>; e++) {
					if ($("#id_status" + e).prop('checked')) {
						var n = n + 1;
						
					}
				}
				
				if (n > 0) {
					if (acaoPost === "excluir") {
						var answer = confirm("Deseja realmente EXCLUIR os seguintes itens?");
						if (answer) {
							for (i = 1; i <= <?php echo $ultimoId[0]; ?>; i++) {
								if ($("#id_status" + i).prop('checked')) {

									var assoc = $("#id_status" + i);
									var assocPost = assoc.val();

									$.post("funcao_massa.php", {
											acao: acaoPost,
											assoc: assocPost
										},
										function(data) {
											var idAssoc = data.substring(1);

											// you're not in a frame so you reload the site
											window.setTimeout('location.reload()', 0); //reloads after 3 seconds

											if ($("#id_status" + idAssoc).attr('checked')) {
												$("#id_status" + idAssoc).attr('checked', false);
											}
										});
								}
							}
						}
					}


					if (acaoPost === "ativar") {
						var answer = confirm("Deseja realmente ATIVAR os seguintes itens?");
						if (answer) {
							for (i = 1; i <= <?php echo $ultimoId[0]; ?>; i++) {
								if ($("#id_status" + i).prop('checked')) {

									var assoc = $("#id_status" + i);
									var assocPost = assoc.val();

									$.post("funcao_massa.php", {
											acao: acaoPost,
											assoc: assocPost
										},
										function(data) {
											var idAssoc = data.substring(1);
											$("#color_status" + idAssoc).removeClass("inativo");
											$("#color_status" + idAssoc).addClass("ativo");
											if ($("#id_status" + idAssoc).attr('checked')) {
												$("#id_status" + idAssoc).attr('checked', false);
											}
										});
								}
							}
						}
					}
					if (acaoPost === "inativar") {
						var answer = confirm("Deseja realmente INATIVAR os seguintes itens?");
						if (answer) {
							for (i = 1; i <= <?php echo $ultimoId[0]; ?>; i++) {
								if ($("#id_status" + i).prop('checked')) {

									var assoc = $("#id_status" + i);
									var assocPost = assoc.val();

									$.post("funcao_massa.php", {
											acao: acaoPost,
											assoc: assocPost
										},
										function(data) {
											var idAssoc = data.substring(1);
											$("#color_status" + idAssoc).removeClass("ativo");
											$("#color_status" + idAssoc).addClass("inativo");
											if ($("#id_status" + idAssoc).attr('checked')) {
												$("#id_status" + idAssoc).attr('checked', false);
											}
										});
								}
							}
						}
					}
					$("select").val(0);
				}
				if (n == 0) {
					alert("Selecione algum item antes de escolher uma opção");
					$("select").val(0);
				}
			});
		});
	</script>

	</table>
	</div>
</div>
<?php include 'footer.php'; ?>
