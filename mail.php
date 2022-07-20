<?php
	$message = "Line 1";
	$s = mail("brasindoor@brasindoor.com.br", "My Subject", $message,"From: brasindoor@brasindoor.com.br");
    if($s) echo "<br>Sucesso<br>";
	else echo "<br>Falhou<br>";

?>