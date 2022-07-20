<?php
$valor_do_produto = $_POST["valor_do_produto"];
$frete = $_POST["frete"];
$quantidade = $_POST["quantidade"];
$dolar = $_POST["dolar"];
$iof = 6.38;
$alibaba_trade = 2.95;

$imposto_de_importacao = 60;
$icms = 18;

if(empty($quantidade)){
	$valor_do_pedido = $valor_do_produto + $frete;
	$quantidade = 1;
}else{
	$valor_do_pedido = ($valor_do_produto * $quantidade) + $frete;
}

$plus_alibaba_trade = $valor_do_pedido * $alibaba_trade;
$plus_alibaba_trade = $plus_alibaba_trade / 100;
$plus_alibaba_trade = $valor_do_pedido + $plus_alibaba_trade;


$plus_iof = $plus_alibaba_trade * $iof;
$plus_iof = $plus_iof / 100;
$plus_iof = $plus_alibaba_trade + $plus_iof;

$total_em_reais = $plus_iof * $dolar;

$preco_por_unidade = $total_em_reais / $quantidade;

//Imposto de 60%
$valor_dos_produtos = $valor_do_produto * $quantidade;

$plus_imposto = $valor_dos_produtos * $imposto_de_importacao;
$plus_imposto = $plus_imposto / 100;
$plus_imposto = $valor_dos_produtos + $plus_imposto;
$plus_imposto_frete = $plus_imposto + $frete;
$plus_imposto_frete = $plus_imposto_frete * $dolar;

$plus_imposto_unidade = $plus_imposto_frete / $quantidade;


//Mais ICMS de 18%
$plus_icms = $plus_imposto * $icms;
$plus_icms = $plus_icms / 100;
$plus_icms = $plus_imposto + $plus_icms;
$plus_icms = $plus_icms + $frete;
$plus_icms = $plus_icms * $dolar;

$plus_icms_unidade = $plus_icms / $quantidade;

?>

<!doctipe html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<header>
		<nav class="navbar navbar-default">
			<div class="container ">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
					data-target="#collapse-navbar" aria-expanded="true">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				<ul style="list-style: none;">
					<li><a class="navbar-brand" href="index.php">Recalcular</a></li>
					
				</ul>
			</div>
			<div class="collapse navbar-collapse" id="collapse-navbar"> 
				<!--<ul class="nav navbar-nav">
					<li><a href="#sobre-nos">Sobre Nós</a></li>
					<li><a href="#nossos-projetos">Nossos Projetos</a></li>
					<li><a href="#depoimentos">Depoimentos</a></li>
					<li><a href="#video">Vídeo</a></li>
					<li><a href="#contato">Contato</a></li>
				</ul>-->
			</div>
		</div>
	</nav>

	<section id="simulacao"  class="col-sm-6">

	<table class="table">
    <thead>
      <tr>
        <th>Sem taxas</th>
        <th>Total por unidade</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      	<?php 
    	$total_em_reais = number_format($total_em_reais, 2);
      	?>
        <td width="50%"><?php echo "R$ ".$total_em_reais; ?></td>

      	<?php 
    	$preco_por_unidade = number_format($preco_por_unidade, 2);
      	?>
        <td><?php echo "R$ ".$preco_por_unidade; ?></td>
      </tr>            
      
    </tbody>
  </table>

  <table class="table">
    <thead>
      <tr>
        <th>Taxado em 60%</th>
        <th>Total por unidade</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      	<?php 
    	$plus_imposto_frete = number_format($plus_imposto_frete, 2);
      	?>
        <td width="50%"><?php echo "R$ ".$plus_imposto_frete; ?></td>
     
      	<?php 
    	$plus_imposto_unidade = number_format($plus_imposto_unidade, 2);
      	?>
        <td><?php echo "R$ ".$plus_imposto_unidade; ?></td>
      </tr>            
      
    </tbody>
  </table>

  <table class="table">
    <thead>
      <tr>
        <th>+ 18% de ICMS</th>
        <th>Total por unidade</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      	<?php 
    	$plus_icms = number_format($plus_icms, 2);
      	?>
        <td width="50%"><?php echo "R$ ".$plus_icms; ?></td>
     
      	<?php 
    	$plus_icms_unidade = number_format($plus_icms_unidade, 2);
      	?>
        <td><?php echo "R$ ".$plus_icms_unidade; ?></td>
      </tr>            
      
    </tbody>
  </table>

</section>






<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/navbar-animation-fix.js" type="text/javascript"></script>

</body>
</html>