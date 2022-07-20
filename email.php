<?php
include('PHPMailer/class.phpmailer.php');

if (isset($_POST['mensagem_contato'])) {//validacao reCAPTCHA START
	if (!empty($_POST['g-recaptcha-response'])) {
		$url = "https://www.google.com/recaptcha/api/siteverify";
		$secret = "6LfcOlsfAAAAANSRW14eRpmL8kpFOxUQYDfEmN-K";
		$response = $_POST['g-recaptcha-response'];
		$variaveis = "secret=" . $secret . "&response=" . $response;

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $variaveis);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$resposta = curl_exec($ch);
		$resultado = json_decode($resposta);

		if ($resultado->success == 1) { //validacao reCAPTCHA END
			//Variaveis do formulário e de config de email
			$email_cliente 				= 'brasindoor@brasindoor.com.br';
			$senha_email 				= '#Brasindoor1';
			$nome 						= $_POST['nome'];
			$email_visitante 			= $_POST['email'];
			$telefone 					= $_POST['telefone'];
			$observacoes 				= $_POST['observacoes'];

			//Tipo de email
			if ($_POST['tipo'] == 1) {
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
			$mail->FromName = 'Contato Site Brasindoor';              // Nome no remetente

			$mail->addAddress("$email_cliente 	");      	  // Acrescente um destinatário

			$mail->isHTML(true);                                  // Configura o formato do email como HTML

			$mail->Subject = 'Contato pelo site - Brasindoor';
			
			$mail->Body    = "<b>Nome</b>: $nome <br> <b>Email</b>: $email_visitante <br>
			<b>Telefone:</b> $telefone <br><br> <b>Mensagem:</b> $observacoes<br>";

			//$mail->AltBody = 'Esse é o corpo da mensagem em formato "plain text" para clientes de email não-HTML';

			if (!$mail->send()) {
?>

				<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml">

				<head>
					<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
					<title>Untitled Document</title>
					<link href="css/default.css" rel="stylesheet" type="text/css" />
				</head>

				<body>
					<?php include "topo.php"; ?>

					<div id="content">
						<?php include "colunaEsquerda.php"; ?>
						<div id="columnB">
							<br />
							<div class="conteudo">
								Houve falha no envio do email, se possível entre em contato por telefone.
							</div>
						</div>
						<div style=" clear:both;">&nbsp;</div>
					</div>
					<?php include "rodape.php"; ?>
				</body>

				</html>

			<?php
			} else {
			?>

				<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml">

				<head>
					<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
					<title>Untitled Document</title>
					<link href="css/default.css" rel="stylesheet" type="text/css" />
				</head>

				<body>
					<?php include "topo.php"; ?>

					<div id="content">
						<?php include "colunaEsquerda.php"; ?>
						<div id="columnB">
							<br />
							<div class="conteudo">
								Estaremos avaliando, obrigado por enviar o seu E-mail.
							</div>
						</div>
						<div style=" clear:both;">&nbsp;</div>
					</div>
					<?php include "rodape.php"; ?>
				</body>

				</html>
<?php 		}
		}
	}
}
?>