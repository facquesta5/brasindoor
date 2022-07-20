<?php
header('Content-type: text/html; charset=utf-8');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Untitled Document</title>
	<link href="css/default.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<?php
	print_r($_REQUEST);
	echo "<br>";

	$categoria = $_POST['categoria'];
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$comentario = $_POST['comentario'];

	$message = "Dados Do Cliente \n \n";
	$message = $message  = "Nome:" . $nome . "\n";
	$message = $message  = "Email:" . $email . "\n";
	$message = $message  = "Destinatario:" . $categoria . "\n";
	$message = $message . "\n";
	$message = $message . "Comentário" . "\n";
	$message = $message . $comentario . "\n";
	$message = $message . "\n";
	$message = mb_convert_encoding($message, 'UTF-8');
	$message = wordwrap($message, 70);

	$headers = "MIME-Version: 1.1" . "\r\n";
	// $headers .= date('D, j M Y H:i:s O');
	$headers .= "Content-type:text/plain;charset=utf-8" . "\r\n";
	$headers .= "From: " . $email . "\r\n";
	
	echo "$headers<br>";
	echo "$message<br>";

	echo "mail('brasindoor@brasindoor.com.br', 'Contato Site Brasindoor', $message, $headers);";
	

	$s = mail("facquesta5@gmail.com", 'Contato Site Brasindoor', $message, $headers);
	if($s) echo "<br>Sucesso<br>";
	else echo "<br>Falhou<br>";




	?>

	<?php include "topo.php"; ?>

	<div id="content">
		<?php include "colunaEsquerda.php"; ?>
		<div id="columnB">
			<br />
			Estaremos avaliando, obrigado por enviar o seu E-mail.
		</div>
		<div style=" clear:both;">&nbsp;</div>
	</div>
	<?php include "rodape.php"; ?>
</body>

</html>