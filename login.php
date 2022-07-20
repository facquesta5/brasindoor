<?php
session_start();
require("config/config_1.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Brasindoor</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".tab").click(function(){
	var X=$(this).attr('id');
		if(X=='signup'){
			$("#login").removeClass('select');
			$("#signup").addClass('select');
			$("#loginbox").slideUp();
			$("#signupbox").slideDown();
		}
		else{
			$("#signup").removeClass('select');
			$("#login").addClass('select');
			$("#signupbox").slideUp();
			$("#loginbox").slideDown();
		}
	});
});
		
 function submitregistration() {
 var form = document.login;
	if(form.usuario.value == ""){
		alert( "Digite seu usuário corretamente" );
		return false;
	}
	else if(form.password.value == ""){
		alert( "Digite sua senha corretamente" );
		return false;
	}
}
</script>
</head>
<body>
<?php include"topo.php"; ?>
<div id="content">
	<?php include"colunaEsquerda.php"; ?>
	<div id="columnB" >
		<div class="conteudo" style="margin-left:0px; padding-left:0px;">
		<div id="container">
		<div id="tabbox">
			<a href="#" id="signup" class="tab signup">Associe-se</a>
			<a href="#" id="login" class="tab select">Login</a>
		</div>
		<div id="panel">
		<?php                          
		//registro
		if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registro'])){
		    $register = $user->register_user($_POST['nome'], $_POST['usuario'], $_POST['senha'], $_POST['email'], $_POST['id_nivel']);
		    if ($register){
		        // Registration Success
		        echo 'Registrado com sucesso!';
		    } else{
		        // Registration Failed
		        echo 'Falha ao registrar-se. Email or usuario já existem por favor, tente novamente.';
		    }
		}
		?>             
		<div id="loginbox">
		<h1>Login</h1>
		<form method="post" action=""  id="login_form" name="login">
			<label>Email ou Usuário</label><br/>
			<input type="text" name="emailusuario"  required="true"/><br/>         <br/>
			<label>Senha</label><br/>
			<input type="password" name="senha" id="senha" required="true"/><br/><br/>
			<input type="hidden" name="entrada" value="1"/>
			<input type="hidden" name="flag" value="login"/>
			<input type="submit" name="login_btn" onClick="return(submitregistration());" value="Login"/>																			<br/><br/>
			<label><!-- <a href="register.php">Ainda não registrado?</a>--></label>
		</form>
		<?php 
		//login
		if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['entrada'])){ 
		   
		    $login = $user->check_login($_POST['emailusuario'], $_POST['senha']);
			
		    if ($login){
		        // Registration Success
		       header('location:area_assoc.php');
		    } else{
		        // Registration Failed
		        $erro_msg = '<p class="msg error">Usuário ou Senha inválida</p>';
		    }
		}
		if(!empty($erro_msg)){
			echo $erro_msg;
		}
		?>
		
		</div>
			<div id="signupbox">
					<div class="mioloTitulo"><h1>&Eacute; f&aacute;cil se associar &agrave; Brasindoor! Siga os passos abaixo.</h1></div>
					<div class="conteudo">
					    <strong>1&deg;  Verifique em que categoria voc&ecirc; se enquadra</strong>.<br />
					    <br />
					    <strong>a)  Estudante</strong> - S&atilde;o os estudantes universit&aacute;rios at&eacute; o n&iacute;vel de doutorado. Al&eacute;m do  preenchimento da proposta de associa&ccedil;&atilde;o, voc&ecirc; deve enviar, via fax ou pelo  correio, uma c&oacute;pia do seu comprovante de matr&iacute;cula, para validar sua  associa&ccedil;&atilde;o.<br />
					    <strong>b)  Prof. Universit&aacute;rio</strong> - Apenas para professores universit&aacute;rios (n&atilde;o se  incluem os professores de 1&ordm; e 2&deg; graus). Al&eacute;m do preenchimento da proposta, &eacute;  necess&aacute;ria uma carta do departamento ou institui&ccedil;&atilde;o ao qual o professor &eacute;  vinculado, atestando o seu v&iacute;nculo ou outros documentos que comprovem sua  fun&ccedil;&atilde;o profissional. Voc&ecirc; deve envi&aacute;-lo, via fax ou pelo correio, para validar  sua associa&ccedil;&atilde;o.<br />
					    <strong>c)  Profissional</strong> - Aplica-se a todo profissional, de qualquer &aacute;rea, aut&ocirc;nomo ou  vinculado &agrave; empresa. Basta o preenchimento da proposta de associa&ccedil;&atilde;o.<br />
					    <strong>d)  Empresas</strong> - Toda e qualquer empresa pode se associar &agrave; BRASINDOOR. Basta preencher a  proposta de associa&ccedil;&atilde;o.<br />
					    <strong>e)  Bibliotecas e Centros de Documenta&ccedil;&atilde;o</strong> - Esta categoria permite &agrave;s bibliotecas e centros de  documenta&ccedil;&atilde;o receberem apenas a Revista Brasindoor para coloca-la &agrave; disposi&ccedil;&atilde;o  de seus usu&aacute;rios.<br />
						Todas as  solicita&ccedil;&otilde;es ser&atilde;o analisadas pela diretoria da entidade para aprova&ccedil;&atilde;o.<br />
						<br />
						<strong>2&deg; Preencha a  proposta de associa&ccedil;&atilde;o e remeta &agrave; BRASINDOOR, 
						atrav&eacute;s dos links abaixo.</strong><br />
						<br />
						<strong>3&deg; Envie os  documentos exigidos, de acordo com a categoria em que voc&ecirc; se 
						enquadra.</strong><br />
						<br />
						<strong>4&deg; Pague a  anuidade (vide tabela abaixo) em qualquer banco, ap&oacute;s o recebimento 
						de seu  boleto.<br />
						<br />
						</strong>
						 <table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
						   <th>Categoria</th>
						   <th>Anuidade</th>
						  </tr>
						  <tr>
						   <td>Estudante</td>
						   <td>R$ 60,00 ou 2x R$ 30,00</td>
						  </tr>
						  <tr>
						   <td>Professores</td>
						   <td>R$ 80,00 ou 2x R$ 40,00</td>
						  </tr>
						  <tr>
						   <td>Profissionais</td>
						   <td>R$ 120,00 ou 2x R$ 60,00</td>
						  </tr>
						  <tr>
						   <td>Empresas</td>
						   <td>R$ 1140,00 em 12x R$ 95,00 (condi&ccedil;&atilde;o &Uacute;nica)</td>
						  </tr>
						  <tr>
						   <td>Bibliotecas</td>
						   <td>Isento</td>
						  </tr>
						 </table>
						 <br />
						 Ao se associar &agrave; BRASINDOOR, voc&ecirc; ganha 20% de   descontos em qualquer evento 
						 (simp&oacute;sio, curso e congresso) ou produtos   oferecidos pela Sociedade. Far&aacute; 
						 parte da lista de associados no site. Dispomos ainda para os associados na   categoria "Empresa", 
						 de um guia de produtos e servi&ccedil;os, no site o qual sua   empresa far&aacute; parte.<br />
						  <br />
						 Voc&ecirc; tamb&eacute;m estar&aacute; colaborando no desenvolvimento de   projetos de 
						 pesquisa e ajudando a manter a entidade que tem representado os   pesquisadores, diante 
						 das solicita&ccedil;&otilde;es dos &oacute;rg&atilde;os governamentais, no   estabelecimento 
						 de pol&iacute;ticas p&uacute;blicas, normas par&acirc;metros para a qualidade de ar   de 
						 interiores.<br />
						 <br />
						
						<input class="botao" type="submit" name="Submit" value="Pessoa Jurídica" onClick="location='cadPessoaJuridica.php'" />
						<input class="botao" name="" type="button" value="Pessoa F&iacute;sica" onClick="location='cadPessoaFisica.php'" />
					 
				</div>
			</div>                             
		</div>                 
		</div>     
		</div>  
		</div>  
	<div style=" clear:both;">&nbsp;</div>
</div>
<?php include"rodape.php"; ?>
</body>
</html>
