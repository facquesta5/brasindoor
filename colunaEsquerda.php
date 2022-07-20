


<script>
 $(document).ready(function(){
 	
	$('#slideshowHolder').jqFancyTransitions({ 
			width: 624, 
			height: 210,
			navigation: true, 
			effect: 'zipper', 
			links:'true',
			delay: 15000,

 		});
	var host = "<?php echo $_SESSION['host1']; ?>";
	if(
		location == host +"historico.php" || 
		location == host +"estatuto.php" ||
		location == host +"diretoria.php"
	){
		$('#institucional').addClass("disponivel");
	}
	if(
		location == host +"inscrevase.php" ||
		location == host +"cadPessoaJuridica.php" ||
		location == host + "cadPessoaFisica.php" ||
		location == host +"lista.php"
	){
		$('#associacao').addClass("disponivel");
	}	
	if(
		location == host +"eventos.php" ||
		location == host +"publicacoes.php" ||
		location == host +"livros.php" ||
		location == host +"revistas.php" ||
		location == host +"outrasPublic.php" ||
		location == host +"pesquisas.php" ||
		location == host +"artigos.php" ||
		location == host +"legislacao.php"
	){
		$('#programacao-cientifica').addClass("disponivel");
	}
	if(
		location == host +"certificado.php" ||
		location == host +"certificado_produto.php" ||
		location == host +"certificado_servico.php" ||
		location == host +"certificado_ambiente.php"
	){
		$('#selo-de-qualidade').addClass("disponivel");
	}
		var servicos = host +"servicos.php";
		var produtos = host +"produtos.php";
		var tipo = host + "tipo.php?tipo=t";
		var i = 1;
		var f = 0;
	
	for(i=1;i<=20;i++){
		if(location == tipo + i.toString()){
				f = 1;
				break;
		}
	}	
	if(location == produtos || location == servicos)  
		f = 1;
	
	if(f == 1) 
		$('#empresas-associadas').addClass("disponivel");

	if(
		location == host +"noticias.php"
	){
		$('#resenha').addClass("disponivel");
	}

	
	var index = 'div.menu_body';
	$("#firstpane p.menu_head").click(function(){
	    $(this).css({backgroundImage:""})
	        .next(index)
	        .slideToggle(300)
	        .siblings(index)
	        .slideUp("slow");
	    $(this).siblings().css({backgroundImage:""})
	});	    
	
	
	
	
 });
  </script>
 

	     
	<div id="columnA">
          <div id="firstpane" class="menu_list">
              <p class="menu_head">Institucional</p>
                    <div class="menu_body" id="institucional">
                        <a href="<?php echo $_SESSION['host1']; ?>historico.php" class="historico" >Hist&oacute;rico</a>
                        <a href="<?php echo $_SESSION['host1']; ?>estatuto.php" class="estatuto">Estatuto</a>
                        <a href="<?php echo $_SESSION['host1']; ?>diretoria.php" class="diretoria">Diretoria</a>
                        <!-- <a href="#">Conv&ecirc;nios</a>  -->
                    </div>
              <p class="menu_head">Associa&ccedil;&atilde;o</p>
                    <div class="menu_body" id="associacao">
                        <a href="<?php echo $_SESSION['host1']; ?>inscrevase.php" class="inscrevase">Inscreva-se</a>
                        <a href="<?php echo $_SESSION['host1']; ?>lista.php" class="lista">Associados</a>
                    </div>
              <p class="menu_head">Programa&ccedil;&atilde;o Cient&iacute;fica</p>
                    <div class="menu_body" id="programacao-cientifica">
                        <!--  <a href="#">Eventos</a>  -->
                        <a href="<?php echo $_SESSION['host1']; ?>publicacoes.php" class="publicacoes">Publica&ccedil;&otilde;es</a>
                        <!--  <a href="#">Pesquisas</a> -->
                        <a href="<?php echo $_SESSION['host1']; ?>artigos.php" class="artigos">Artigos</a>
                        <a href="<?php echo $_SESSION['host1']; ?>legislacao.php" class="legislacao">Legisla&ccedil;&atilde;o</a>
                    </div>
              <p class="menu_head">Selo de Qualidade</p>
                    <div class="menu_body" id="selo-de-qualidade">
                        <!--  <a href="#">Como Obter</a> -->
                        <a href="<?php echo $_SESSION['host1']; ?>certificado.php" class="certificado">Certificado</a>
                    </div>
               <p class="menu_head">Empresas Associadas</p>
                    <div class="menu_body" id="empresas-associadas">
                        <a href="<?php echo $_SESSION['host1']; ?>servicos.php" class="servicos">Servi&ccedil;os</a> 
                        <a href="<?php echo $_SESSION['host1']; ?>produtos.php" class="produtos">Produtos</a>
                    </div>
               <p class="menu_head">Resenha</p>
                    <div class="menu_body" id="resenha">
                    <a href="<?php echo $_SESSION['host1']; ?>noticias.php" class="noticias">Not&iacute;cias</a>
                    <!--  <a href="#" >Informa&ccedil;&otilde;es</a> -->
                    </div>  
          </div>
          
          <div class="publicidade">
          	<div class="boxPublicidade"><a href="http://www.controlbio.com.br/" target="_blank"><img src="<?php echo $_SESSION['host1']; ?>images/publicidade/publi01.gif"  /></a></div>
          	<div class="boxPublicidade"><a href="#" target="_blank"><!--<img src="<?php echo $_SESSION['host1']; ?>images/publicidade/publi02.gif"  />--></a></div>
            <div style="clear:both"></div>
          </div>
          
         
	</div>
    