<?php
session_start();
include 'config/config_1.php';
        


if(!isset($_POST[Submit])) die("N&atilde;o recebi nenhum par&acitc;metro. Por favor volte ao formulario.html antes");
/* Medida preventiva para evitar que outros dom?nios sejam remetente da sua mensagem. */
if (eregi('tempsite.ws$|locaweb.com.br$|hospedagemdesites.ws$|websiteseguro.com$', $_SERVER[HTTP_HOST])) {
        $emailsender='fernando@brasindoor.com.br';
} else {
        $emailsender = "fernando@" . $_SERVER[HTTP_HOST];
        //    Na linha acima estamos for?ando que o remetente seja 'webmaster@seudominio',
        // voc? pode alterar para que o remetente seja, por exemplo, 'contato@seudominio'.
}
 
/* Verifica qual ? o sistema operacional do servidor para ajustar o cabe?alho de forma correta. N?o alterar */
if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
 
// Passando os dados obtidos pelo formul?rio para as vari?veis abaixo
$emaildestinatario  = "brasindoor@brasindoor.com.br"; 
$emailremetente 	= trim($_POST['email']);
$assunto 			= "Inscrição para o seminário ".utf8_decode($_POST['nome']);

$mensagem = "Inscrição para o seminário - Dados Do Cliente $quebra_linha $quebra_linha  <br /><br />";
$mensagem = $mensagem . "Nome: ". utf8_decode($_POST['nome']). "$quebra_linha <br /><br />";
$mensagem = $mensagem . "Empresa: ". utf8_decode($_POST['empresa']). "$quebra_linha <br />";
$mensagem = $mensagem . "Endereço: ". $_POST['endereco']. "$quebra_linha <br />";
$mensagem = $mensagem . "Bairro:". utf8_decode($_POST['bairro']). "$quebra_linha <br /><br />";
$mensagem = $mensagem . "CEP:".utf8_decode($_POST['cep']). "$quebra_linha <br />";
$mensagem = $mensagem . "Cidade:".utf8_decode($_POST['cidade']). "$quebra_linha <br />";
$mensagem = $mensagem . "UF: ".$_POST['uf']. "$quebra_linha <br />";
$mensagem = $mensagem . "Telefone: ".$_POST['telefone']. "$quebra_linha <br /><br />";
$mensagem = $mensagem . "Fax: ".$_POST['fax']. "$quebra_linha <br /><br />";
$mensagem = $mensagem . "Email: ".utf8_decode($_POST['email']). "$quebra_linha <br /><br />";
$mensagem = $mensagem . "Recibo em nome da empresa: ".$_POST["recibo"]." <br />";
$mensagem = $mensagem . "<br /><br />";





$mensagem = $mensagem . "$quebra_linha";
$mensagem = $mensagem . "$quebra_linha";
 
 
/* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML = '<p><b><i>'.$mensagem.'</i></b></p>
<hr>';
 
 
/* Montando o cabe?alho da mensagem */
$headers = "MIME-Version: 1.1".$quebra_linha;
$headers .= "Content-type: text/html; charset=iso-8859-1".$quebra_linha;
// Perceba que a linha acima cont?m "text/html", sem essa linha, a mensagem n?o chegar? formatada.
$headers .= "From: ".$emailsender.$quebra_linha;
$headers .= "Return-Path: " . $emailsender . $quebra_linha;
// Esses dois "if's" abaixo s?o porque o Postfix obriga que se um cabe?alho for especificado, dever? haver um valor.
// Se n?o houver um valor, o item n?o dever? ser especificado.
if(strlen($comcopia) > 0) $headers .= "Cc: ".$comcopia.$quebra_linha;
if(strlen($comcopiaoculta) > 0) $headers .= "Bcc: ".$comcopiaoculta.$quebra_linha;
$headers .= "Reply-To: ".$emailremetente.$quebra_linha;
// Note que o e-mail do remetente ser? usado no campo Reply-To (Responder Para)
 

mail($emaildestinatario, $assunto, $mensagemHTML, $headers, "-r". $emailsender);



include"topo.php"; 
?>

<div id="content">

	<?php include"colunaEsquerda.php"; ?>
    
<div id="columnB">

 <div class="mioloTitulo">Cadastro enviado</div>
 
 <div class="conteudo" >
  
  
        <br />
	Seus dados foram arquivados com sucesso!<br />
<br />
	Aguarde, nossos administradores irão conferir todos os dados e fazer a verificação do seu pagamento.<br />
    
     <p>Caso <strong>ainda não</strong> tenha feito o seu pagamento:</p>
     
	<p>Faça o pagamento em nossa conta e envie o comprovante de depósito para o fax (11) 3816-4013 ou e-mail: brasindoor@brasindoor.com.br, identificando com o mesmo nome de cadastro cadastrado. </p>
    <br />
    <br />
    <strong>Dados para pagamento: </strong>
    <br />Banco Itaú (AG. 8463 C/C. 07463-6).<br />Favorecido: Sociedade Brasileira de Meio Ambiente e Controle de Qualidade do Ar de Interiores. <strong>
    <br />
    <br />
    <font color="#FF0000">ATENÇÃO</font></strong>: Não será devolvido o valor da inscrição em caso de desistência ou não comparecimento.</p>
    
    
	Após este processo vocô receberá um email confirmando a sua entrada no seminário.
<br />

    <a href="index.php">Clique aqui</a> para voltar ao site<br />
<br />
	Obrigado por ultilizar nossos servi&ccedil;os.
  
  	
    </div>
	</div>
    
    <div style=" clear:both;">&nbsp;</div>
</div>
<?php include"rodape.php"; ?>
