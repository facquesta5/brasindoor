<?php
session_start();
include 'config/config_1.php';

$tipo = $_GET['tipo'];

$codigo = array(
	't1' => 'Analises Laboratoriais',
	't2' => 'Consultoria em implantação de sistemas da qualidade ambiental',
	't3' => 'Gerenciamento ambiental interior',
	't4' => 'Higienização de áreas terciárias (ambientes)',
	't5' => 'Higienização de componentes primários e secundários em centrais de ar condicionado',
	't6' => 'Higienização de superfícies fixas',
	't7' => 'Higienização de superfícies forradas',
	't8' => 'Implantação de programas de qualidade em higienização de �reas terciárias',
	't9' => 'Limpeza de dutos',
	't10' => 'Limpeza de sistemas de exaustão e insuflamento (ar forçado)',
	't11' => 'Manutenção de sistemas de ar condicionado central',
	't12' => 'Manutenção de sistemas de ar condicionado compactos ou remotos',
	't13' => 'Outros Serviços',
	't14' => 'Serviços de coletas de materiais para análises',
	't15' => 'Equipamentos para tratamento do ar ambiental',
	't16' => 'Produtos para higienização de ambientes climatizados',
	't17' => 'Produtos para tratamento de sistemas de ar condicionado',
	't18' => 'Produtos para higienização de superf�cies fixas',
	't19' => 'Equipamentos para testes e avaliações ambientais',
	't20' => 'Outras áreas'
);

include 'topo.php';
?>

<div class="column-1 col-lg-8 col-md-12">
	<h4 class="list-group-item list-group-item-action py-3 lh-tight">
		<?php echo $codigo[$tipo]; ?>
	</h4>
	<div class="conteudo">
		<h5>Empresas atuantes:</h5>
		
		<?php 
			$obj = new Banco;
			$tabela = 'socios';
			$oque = '*';
			$id = 1;
			$id_tabela = $tipo;
			$status = 1;
			$variable = $obj->verStatements($tabela, $oque, $id, $id_tabela, $status);

			foreach ($variable as $linha) {
			
            
            echo "<h5 class=\"mt-3\">"; echo htmlentities($linha['razao_social']); echo "</h5>";
            echo "<div>";
			  	if(!empty($linha['endereco'])){
					echo htmlentities($linha['endereco']);
				}
			 	if(!empty($linha['bairro'])){
					echo " - "; 
					echo htmlentities($linha['bairro']);
				}
				if(!empty($linha['cep'])){
					echo "<br>CEP - "; 
					echo $linha['cep'];
				}
            	if(!empty($linha['cidade'])){
					echo " - &nbsp;";
					echo htmlentities($linha['cidade']);
				}
				echo "&nbsp;&nbsp;";
            	if(!empty($linha['UF'])){
					echo $linha['UF'];
				}
				
				if(!empty($linha['foneddd']) && !empty($linha['fone'])){
					echo "<br>";
					echo "Fone:&nbsp;"; echo $linha['foneddd']; echo "&nbsp;"; echo $linha['fone'];
				}
				echo "<br>";
				if(!empty($linha['faxddd']) && !empty($linha['fax'])){
					echo "Fax :&nbsp;"; echo $linha['faxddd']; echo "&nbsp;"; echo $linha['fax']; echo "<br>";
				} 
				if(!empty($linha['email'])){
					echo "E-mail: <a href='mailto:"; echo $linha['email']; echo "'>"; echo $linha['email']; echo "</a>
					<br>";
				} 
				if(!empty($linha['site'])){
					echo "Site: <a href='mailto:"; echo $linha['site']; echo "'>"; echo $linha['site']; echo "</a>
					";
				}
				echo "";
				echo "</div>";
            }
            ?>
	</div>
</div>

<?php include 'footer.php'; ?>