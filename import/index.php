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
					<li><a class="navbar-brand" href="index.php">Simulação de importação</a></li>
					
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

	<form action="calcular.php" method="post">

		<!--<div class="form-group">
			<label for="simulacao-produto">Produto: </label>
			<input class="form-control" id="simulacao-produto" type="text" 
			name="produto" placeholder="Produto">
		</div>
		-->
		<div class="form-group">
			<label for="simulacao-valor-do-produto">Valor do Produto: </label>
			<input class="form-control" id="valor-do-produto" type="text" 
			name="valor do produto" placeholder="Valordo produto" style="width: 130px;">
		</div>
		<div class="form-group">
			<label for="simulacao-frete">Valor do Frete: </label>
			<input class="form-control" id="frete" type="text" 
			name="frete" placeholder="Frete" style="width: 130px;">
		</div>
		<div class="form-group">
			<label for="simulacao-quantidade">Quantidade: </label>
			<input class="form-control" id="simulacao-quantidade" type="text" 
			name="quantidade" placeholder="Quantidade" style="width: 130px;">
		</div>
		<div class="form-group">
			<label for="simulacao-dolar">Valor do dólar: </label>
			<input class="form-control" id="simulacao-dolar" type="text" 
			name="dolar" placeholder="Dólar" style="width: 130px;">
		</div>

		

<!--
		<div class="form-group">
			<label for="simulacao-declarado">Valor declarado: </label>
			<input class="form-control" id="simulacao-declarado" type="text" 
			name="declarado" placeholder="Declarado" style="width: 130px;">
		</div>

		<div class="form-group ">
			<label for="simulacao-peso">Peso: </label>
			<input class="form-control" id="simulacao-peso" type="text" 
			name="peso" placeholder="Peso" style="width: 130px;">
		</div>


		<div class="grupo-radio">
			<div class="radio">
				<label>
					<input type="radio" name="tipo-peso" value="onca" checked>
					Onça
				</label>
			</div>

			<div class="radio">
				<label>
					<input type="radio" name="tipo-peso" value="libra">
					Libra
				</label>
			</div>-->
			</div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">Enviar</button>
	</div>
</form>

</section>




<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/navbar-animation-fix.js" type="text/javascript"></script>

</body>
</html>