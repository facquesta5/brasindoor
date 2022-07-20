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
    
    if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
      }
    else{// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
    xmlhttp.onreadystatechange=function(){
      if (xmlhttp.readyState==4 && xmlhttp.status==200){
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
						flagErro = 0;  
                }
        }
      }
    xmlhttp.open("GET","../ajaxConsultaEmail.php?q="+str,true);
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

<?php include"topo.php"; ?>
<script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>
<div id="content">
	<div class="columnA">
    	<?php include'colunaEsquerda.php';?>
    </div>
	
	<div class="columnB" >
		<div class="mioloTitulo">Cadastro Associado</div>
        
       
		<div class="conteudo cadastrar-assoc">
        	<form name="form_mxstudio" class="form-horizontal" id="registerHere" method="post" 
            action="cadastro_assoc_gerencia.php" onsubmit="javascript:return validar();">
            
            <div>Nome completo</div>
            <div class="control-group">
                    <input type="text" class="input-xlarge" id="nome" name="nome" rel="popover" 
                    data-content="Digite seu nome completo." data-original-title="Nome Completo">
            </div>
                    <input type="hidden" class="input" name="resultEmail" id="resultEmail" >
            <div>E-mail</div>
            <div class="control-group" id="boxEmail">
                    <input type="text" class="input" id="email" name="email" rel="popover" onkeyup="timeMsg(this.value)"
                    autocomplete="off"
                    data-content="O email também será usado para logar no sistema." data-original-title="Email">
                    <span id="span_email" class="hidd">Email já cadastrado em nosso sistema</span>
            </div>


            <div>Senha</div>
            <div class="control-group">
                    <input type="password" class="input" id="senha" name="senha" rel="popover" 
                    data-content="Digite sua senha para logar no sistema." data-original-title="Senha">
            </div>

            <div>Confirmação de Senha</div>
            <div class="control-group">
                    <input type="password" class="input" id="csenha" name="csenha" rel="popover" 
                    data-content="Confirme sua senha para segurança." data-original-title="Confirmação de Senha">
            </div>
            
            <div>Tipo</div>
            <div class="control-group">
                    <select class="input" id="tipo" name="tipo">
                    	<option> * * * * * * Selecione * * * * * * </option>
                        <option value="PJ">Pessoa Juridica</option>
                        <option value="PFE">Professor</option>
                        <option value="PFA">Profissional</option>
                        <option value="BCD">Biblioteca e Centro de Documentação</option>
                        <option value="MH">Membros Honorários</option>
                    </select>
            </div>                            

            <h3>Dados de Associação</h3>
            <div>Razão Social</div>
            <div class="control-group">
                    <input type="text" class="input-xlarge" id="razao_social" name="razao_social" rel="popover" 
                    data-content="Digite a razão social." data-original-title="Razão Social">
            </div>

            <div>CNPJ</div>
            <div class="control-group">
                    <input type="text" class="input cnpj" id="cnpj" name="cnpj" rel="popover" 
                    data-content="Digite o CNPJ." data-original-title="CNPJ">
            </div>


            <div><span>Inscrição Estadual</span></div>
            <div class="control-group">
                    <input type="text" class="input" id="inscricao_estadual" name="inscricao_estadual" rel="popover" 
                    data-content="Digite a Incrição Estadual." data-original-title="Incrição Estadual">
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
            <span>CEP</span>
            </div>
            <div class="control-group">
                    <input type="text" class="input" id="cep" name="cep" rel="popover" 
                    data-content="Digite o CEP correspondente." data-original-title="CEP">
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

            <div>
            <span>Site</span>
            </div>
            <div class="control-group">
                    <input type="text" class="input" id="site" name="site" rel="popover" 
                    data-content="Digite o fax correspondente." data-original-title="Telefone">
            </div>

            <h3>Dados Adicionais</h3>

            <div>
            <span>Cargo</span>
            </div>
            <div class="control-group">
                    <input type="text" class="input" id="cargo" name="cargo" rel="popover" 
                    data-content="Digite o fax correspondente." data-original-title="Cargo">
            </div>
            <div>
            <span>Ramo/Atividade</span></div>
            <div class="control-group">
                    <input type="text" class="input" id="ramo_atividade" name="ramo_atividade" rel="popover" 
                    data-content="Digite o ramo de atividade." data-original-title="Ramo / Atividade">
            </div>
            <div>
            <span>Área de atuação</span>
            </div>
            <div class="control-group">
                    <input type="text" class="input" id="area_atuacao" name="area_atuacao" rel="popover" 
                    data-content="Digite a área de atuação." data-original-title="Área de atuação">
            </div>
            <div>
            <span>Contato</span>
            </div>
            <div class="campoTxt">
                    <input type="text" class="input" id="contato" name="contato" rel="popover" 
                    data-content="Deixe um contato." data-original-title="Contato">
            </div>
            <div id="check_list">
            <h3>Serviços Inclusos</h3>
           
            <div class="checkTotal">
                    <input name="t1" id="t1" type="checkbox" value="1" />
                    <div class="checkbox">
                            <span>Analises Laboratoriais</span>
                    </div>
            </div>
            <div class="checkTotal">
                    <input name="t2" id="t2" type="checkbox" value="1" />
                    <div class="checkbox">
                            <span>Consultoria em implantação de sistemas da qualidade ambiental</span>
                    </div>
            </div>
            <div class="checkTotal">        
                    <input name="t3" id="t3" type="checkbox" value="1" />
                    <div class="checkbox">
                            <span>Gerenciamento ambiental interior</span>
                    </div>
            </div>
           
            <div class="checkTotal"> 
                    <input name="t4" id="t4" type="checkbox" value="1" />
                    <div class="checkbox">
                            <span>Higienização de áreas terciárias (ambientes)</span>
                    </div>
            </div>
            <div class="checkTotal"> 
                    <input name="t5" id="t5"type="checkbox" value="1" />
                    <div class="checkbox">
                            <span>Higienização de componentes primários e secundários em centrais de ar condicionado</span>
                    </div>
            </div>
            <div class="checkTotal"> 
                    <input name="t6" id="t6" type="checkbox" value="1" />
                    <div class="checkbox">
                            <span>Higienização de superfícies fixas</span>
                    </div>
            </div>
            <div class="checkTotal"> 
                    <input name="t7" id="t7" type="checkbox" value="1" />
                    <div class="checkbox">
                            <span>Higienização de superfícies forradas</span>
                    </div>
            </div>
            <div class="checkTotal"> 
                    <input name="t8" id="t8" type="checkbox" value="1" />
                    <div class="checkbox">
                            <span>Implantação de programas de qualidade em higienização de áreas terciárias</span>
                    </div>
            </div>
            <div class="checkTotal"> 
                    <input name="t9" id="t9" type="checkbox" value="1" />
                    <div class="checkbox">
                            <span>Limpeza de dutos</span>
                    </div>
            </div>
            <div class="checkTotal"> 
                    <input name="t10" id="t10" type="checkbox" value="1" />
                    <div class="checkbox">
                            <span>Limpeza de sistemas de exaustão e insuflamento (ar forçado)</span>
                    </div>
            </div> 
            <div class="checkTotal"> 
                    <input name="t11" id="t11" type="checkbox" value="1" />
                    <div class="checkbox">
                            <span>Manutenção de sistemas de ar condicionado central</span>
                    </div>
            </div>
            <div class="checkTotal"> 
                    <input name="t12" id="t12" type="checkbox" value="1" />
                    <div class="checkbox">
                            <span>Manutenção de sistemas de ar condicionado compactos ou remotos</span>
                    </div>
            </div>
            <div class="checkTotal"> 
                    <input name="t13" id="t13" type="checkbox" value="1" />
                    <div class="checkbox">
                            <span>Outros Serviços</span>
                    </div>
            </div>
            <div class="checkTotal"> 
                    <input name="t14" id="t14" type="checkbox" value="1" />
                    <div class="checkbox">
                            <span>Serviços de coletas de materiais para análises</span>
                    </div>
            </div>

            <h3>Produtos Inclusos</h3>
            <div class="checkTotal"> 
                    <input name="t15" id="t15" type="checkbox" value="1" />
                    <div class="checkbox">
                            <span>Equipamentos para tratamento do ar ambiental</span>
                    </div>
            </div>
            <div class="checkTotal"> 
                    <input name="t16" id="t16" type="checkbox" value="1" />
                    <div class="checkbox">
                            <span>Produtos para higienização de ambientes climatizados</span>
                    </div>
            </div>
            <div class="checkTotal"> 
                    <input name="t17" id="t17" type="checkbox" value="1" />
                    <div class="checkbox">
                            <span>Produtos para tratamento de sistemas de ar condicionado</span>
                    </div>
            </div>
            <div class="checkTotal"> 
                    <input name="t18" id="t18" type="checkbox" value="1" />
                    <div class="checkbox">
                            <span>Produtos para higienização de superfícies fixas</span>
                    </div>
            </div>
            <div class="checkTotal"> 
                    <input name="t19" id="t19" type="checkbox" value="1" />
                    <div class="checkbox">
                            <span>Equipamentos para testes e avaliações ambientais</span>
                    </div>
            </div>
            <div class="checkTotal"> 
                    <input name="t20" id="t20" type="checkbox" value="1" />
                    <div class="checkbox">
                            <span>Outras áreas</span>
                    </div>
            </div>

            <button id="check-all" class="btn btn-info">marcar todos</button> <button id="uncheck-all" class="btn btn-info" >desmarcar todos</button>
           

            </div>
            <h3>Condição única de Pagamento</h3>
            <input type="hidden" value="parcelado em 12x">
            <p>parcelado em 12x</p>
            <!-- Nível -->
            <input type="hidden" name="id_nivel" value="4"  />
            <input type="hidden" name="id_status" value="2"  />
            <input type="hidden" id="cadastro" name="cadastro" value="1" />
            <div class="control-group">
                    <input type="submit" name="Submit" class="btn btn-success" rel="Enviar Proposta" title="Enviar Proposta" value="Enviar Proposta">
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
</div>

<?php 
include"../rodape.php"; 
include"../js/validateForm_gerente.js"; 
?>