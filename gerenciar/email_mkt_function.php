<?php
session_start();
include 'config/config_1.php';
$objBanco = new Banco;
$objUser = new User;

if (isset($_POST['email_form']) && $_POST['email_form'] == 1) {

	include('PHPMailer/class.phpmailer.php');

	//Variaveis do formulário e de config de email
	$email_cliente 				= 'brasindoor@brasindoor.com.br';
	$senha_email 				= '#Brasindoor1';

    

    $assunto = $_POST['assunto'];

	//Tipo de email
	if ($_POST['cadastro'] == 1) {
		$tipos = 'email-ssl.com.br';
		$porta = 465;
		$segu  = 'ssl';
	} else {
		$tipos = 'mail.exchangecorp.com.br';
		$porta = 587;
		$segu  = 'tls';
	}

	$mail = new PHPMailer;
	$mail->setLanguage('br');                             // Habilita as saídas de erro em Português
	$mail->CharSet = 'UTF-8';                               // Habilita o envio do email como 'UTF-8'

	//$mail->SMTPDebug = 3;                               // Habilita a saída do tipo "verbose"
	$mail->isSMTP();                                      // Configura o disparo como SMTP
	$mail->Host = 'email-ssl.com.br';                     // Especifica o enderço do servidor SMTP da Locaweb
	$mail->SMTPAuth = true;                               // Habilita a autenticação SMTP
	$mail->Username = "$email_cliente";   		          // Usuário do SMTP
	$mail->Password = "$senha_email";                  	  // Senha do SMTP
	$mail->SMTPSecure = "$segu";                          // Habilita criptografia TLS | 'ssl' também é possível
	$mail->Port = "$porta";                                 // Porta TCP para a conexão

	$mail->From = "$email_cliente";                		  // Endereço previamente verificado no painel do SMTP
	$mail->FromName = 'Site Brasindoor';              // Nome no remetente

	$mail->addAddress("$email_cliente");      	  // Acrescente um destinatário

	$mail->isHTML(true);                                  // Configura o formato do email como HTML

	$mail->Subject = $_POST['assunto'];
	
	$mail->Body  = $conteudo;
    $email_teste = 'facquesta5@gmail.com';
    $mail->to = $email_teste.$_POST['para'];
    $mail->cc = $_POST['cc'];
    $mail->bcc = $_POST['cco'];

	$mail->send();

	include 'topo.php';
?>
	<div class="column-1 col-lg-8 col-md-12">

		<h4 class="list-group-item list-group-item-action py-3 lh-tight">
			Email enviado com sucesso, confira a caixa de email
		</h4>
		<div class="conteudo" id="coluna1">
			<p>Proposta enviada com sucesso</br>
				Estaremos avaliando, obrigado por enviar o seu E-mail.</p>
		</div>
	</div>
<?php
	include 'footer.php';
} else {
	include 'topo.php';
?>
	<div class="column-1 col-lg-8 col-md-12">
		<h4 class="list-group-item list-group-item-action py-3 lh-tight">
			Proposta de associação - Pessoa Física</h4>
		<div class="conteudo" id="coluna1">
			<p>Houve falha no envio do cadastro, se possível entre em contato por telefone.</p>
		</div>
	</div>
	<?php include 'footer.php'; ?>

<?php
}
?>