<?php
session_start();
include 'config/config_1.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Brasindoor</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<!-- Le styles -->

<link href="http://twitter.github.com/bootstrap/assets/css/bootstrap.css" rel="stylesheet">
<link href="http://twitter.github.com/bootstrap/assets/css/bootstrap-responsive.css" rel="stylesheet">

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script type="text/javascript">


var t3;
var stremail;

var flagErro = 0;

function timeMsg(str){
        stremail = str;
        clearTimeout(t3);
        t3 = setTimeout("showHint(stremail)",2000);
}

  function showHint(str){
    var xmlhttp;
    
    if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
      }
    else
      {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
    xmlhttp.onreadystatechange=function()
      {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
        document.getElementById("resultEmail").value = xmlhttp.responseText;
        document.getElementById("resultEmail").value = xmlhttp.responseText.substring(1);
        var email = document.getElementById("resultEmail").value;
                if(email == "ZICA!"){
                         $("#span_email").removeClass("show");
                         $("#span_email").addClass("hidd");
						 flagErro = 0;
                }else{
                        $("#boxEmail").removeClass("success");
                        $("#boxEmail").addClass("error");
                        $("#span_email").removeClass("hidd");
                        $("#span_email").addClass("show");
						flagErro = 1;  
                }
        }
      }
    xmlhttp.open("GET","ajaxConsultaEmail.php?q="+str,true);
    xmlhttp.send();
  }
  
  function validar(){
  	if (flagErro == 1){
		alert("Verifique possíveis erros no formulário");
		return false;
	}
	if(flagErro == 0){
		return true;
	}
  }
</script>

</head>
<body>
<?php include"topo.php"; ?>
<script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>
<div id="content">
	<?php include"colunaEsquerda.php"; ?> 
	
	<div id="columnB">	
        	<div class="mioloTitulo">
                        <h1>Formulário de inscrição para o seminário.</h1>
                </div>
        	<div class="conteudo formulario">
                       
                        <?php 
                        if($_POST) { ?>
                        <div class="alert alert-success">
                          Well done! You successfully read this important alert message.
                        </div>
                        <?php } ?>


                        <form name="form_mxstudio" class="form-horizontal" id="registerHere" method="post" 
                        action="formulario_seminario_2012.php" onsubmit="javascript:return validar();">
                        
                        <div>Nome</div>
                        <div class="control-group">
                                <input type="text" class="input-xlarge" id="nome" name="nome" rel="popover" 
                                data-content="Digite seu nome completo." data-original-title="Nome Completo">
                        </div>
                        <div>Empresa</div>
                        <div class="control-group">
                                <input type="text" class="input-xlarge" id="empresa" name="empresa" rel="popover" 
                                data-content="Digite o nome da empresa." data-original-title="Nome da empresa">
                        </div>
                                

                        <div>Endereço</div>
                        <div class="control-group">
                                <input type="text" class="input" id="endereco" name="endereco" rel="popover" 
                                data-content="Digite o endereço correspondete." data-original-title="Endereço">
                        </div>
                        
                        <div>Bairro</div>
                        <div class="control-group">
                                <input type="text" class="input" id="bairro" name="bairro" rel="popover" 
                                data-content="Digite o bairro correspondete." data-original-title="Bairro">
                        </div>
                        <div>
                        <span>CEP</span>
                        </div>
                        <div class="control-group">
                                <input type="text" class="input" id="cep" name="cep" rel="popover" 
                                data-content="Digite o CEP correspondente." data-original-title="CEP">
                        </div>
                        <div>Cidade</div>
                        <div class="control-group">
                                <input type="text" class="input" id="cidade" name="cidade" rel="popover" 
                                data-content="Digite a cidade correspondete." data-original-title="Cidade">
                        </div>
                        <div>UF</div>
                        <div class="control-group">
                                <input type="text" class="span1" id="uf" name="uf" rel="popover" 
                                data-content="Digite a unidade federativa correspondente." data-original-title="UF">
                        </div>
                        
                        <div>
                        <span>Telefone</span>
                        </div>
                        <div class="control-group">
                                <input type="text" class="input telefone" id="telefone" name="telefone" rel="popover" 
                                data-content="Digite o telefone correspondente." data-original-title="Telefone">
                        </div>

                        <div>
                        <span>Fax</span>
                        </div>
                        <div class="control-group">
                                <input type="text" class="input fax" id="fax" name="fax" rel="popover" 
                                data-content="Digite o fax correspondente." data-original-title="Telefone">
                        </div>
						
                  		<input type="hidden" class="input" name="resultEmail" id="resultEmail" >
                        <div>E-mail</div>
                        <div class="control-group" id="boxEmail">
                                <input type="text" class="input" id="email" name="email" rel="popover" onkeyup="timeMsg(this.value)"
                                autocomplete="off"
                                data-content="Digite o seu email" data-original-title="Email">
                                <span id="span_email" class="hidd">Email já cadastrado em nosso sistema</span>
                        </div>
                        <div>Recibo em nome da empresa?</div>            
                        <div class="radio-pf">
                        	<ul>
                            	<li><input type="radio" name="recibo" value="sim"  /><p>Sim </p></li>
                                <li><input type="radio" name="recibo" value="nao"  /><p>Não</p></li>
                            </ul>
                        </div>
                        <!-- Nível -->
                        <input type="hidden" name="id_nivel" value="4"  />
                        <input type="hidden" name="id_status" value="2"  />
                        <input type="hidden" name="tipo" value="PJ" />
                        <input type="hidden" id="cadastro" name="cadastro" value="1" />
                        <div class="control-group">
                                <input type="submit" name="Submit" class="btn btn-success" rel="tooltip" title="first tooltip" value="Enviar">
                                <!-- INICIO FORMULARIO BOTAO PAGSEGURO
                                <form target="pagseguro" action="https://pagseguro.uol.com.br/checkout/v2/cart.html?action=add" method="post">
                                <input type="hidden" name="itemCode" value="76EBBCC23030520004100F9AE46FB15A" />
                                <input type="image" class="pag_seguro" 
                                src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/184x42-pagar-assina.gif" 
                                name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
                                </form>
                                <!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
                        </div>

                        </form>
                        
        	</div>
	</div>
	<div style=" clear:both;">&nbsp;</div>
</div> 




<?php 
include"rodape.php";


include"js/validateFormPJ.js"; 
?>


</body>
</html>
