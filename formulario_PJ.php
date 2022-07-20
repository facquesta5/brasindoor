<?php
session_start();
include 'config/config_1.php';
$objBanco = new Banco;
$objUser = new User;

if(isset($_POST['cadastro']) && $_POST['cadastro'] == 1) {

	$cnpj = $objUser->limpaCnpj($_POST["cnpj"]);
	$tel = $objUser->separaTelefone($_POST["telefone"]);
	$cep = $objUser->separaCep($_POST["cep"]);
	$data_registro = date("Y-m-d");

	$t = 't';
	for($n = 0;$n<=20;$n++){
		$t = "t".$n;
		if(!empty($_POST["$t"])){
			${'t' . $n} = $_POST["$t"];
		}else{
			${'t' . $n} = 0;
		}
	}

	$onde = "socios";
	$oque = array( //$oque as $coluna => $valor
	'nome' => utf8_decode($_POST["nome"]),
	'razao_social' => utf8_decode($_POST["razao_social"]),
	'cnpj' => $cnpj,
	'inscricao_estadual' => $_POST["inscricao_estadual"],
	'tipo' => $_POST["tipo"],
	'endereco' => utf8_decode($_POST["endereco"]),
	'bairro' => utf8_decode($_POST["bairro"]),
	'cep' => $cep,
	'cidade' => utf8_decode($_POST["cidade"]),
	'uf' => $_POST["uf"],
	'foneddd' => $tel[0],
	'fone' => $tel[1],
	'email' => utf8_decode($_POST["email"]),
	'site' => $_POST["site"],
	'cargo' => utf8_decode($_POST["cargo"]),
	'ramo_atividade' => utf8_decode($_POST["ramo_atividade"]),
	'area_atuacao' => utf8_decode($_POST["area_atuacao"]),
	'contato' => utf8_decode($_POST["contato"]),
	'data_registro'=> $data_registro,
	'id_nivel' => $_POST["id_nivel"],
	'id_status' => $_POST["id_status"],
	't1' => $t1,
	't2' => $t2,
	't3' => $t3,
	't4' => $t4,
	't5' => $t5,
	't6' => $t6,
	't7' => $t7,
	't8' => $t8,
	't9' => $t9,
	't10' => $t10,
	't11' => $t11,
	't12' => $t12,
	't13' => $t13,
	't14' => $t14,
	't15' => $t15,
	't16' => $t16,
	't17' => $t17,
	't18' => $t18,
	't19' => $t19,
	't20' => $t20
	);
	
$dados = $objBanco->inserirSociosStatments($oque, $onde, $_POST['email']);

include('PHPMailer/class.phpmailer.php');

	//Variaveis do formulário e de config de email
	$email_cliente 				= 'brasindoor@brasindoor.com.br';
	$senha_email 				= '#Brasindoor1';
	$nome 						= $_POST['nome'];
	$email_visitante 			= $_POST['email'];
	$telefone 					= $_POST['telefone'];

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

	$mail->addAddress("$email_cliente 	");      	  // Acrescente um destinatário

	$mail->isHTML(true);                                  // Configura o formato do email como HTML

	$mail->Subject = 'Cadastro de pessoa jurídica';

	$tipo = $_POST['tipo'];
	$razao_social = $_POST['razao_social'];
	$endereco = $_POST['endereco'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$uf = $_POST['uf'];
	$cep = $_POST['cep'];
	$site = $_POST['site'];
	$cargo = $_POST['cargo'];
	$ramo_atividade = $_POST['ramo_atividade'];
	$area_atuacao = $_POST['area_atuacao'];
	$contato = $_POST['contato'];
	$forma_pagamento = $_POST['pagamento'];

	$mail->Body    = "<b>Dados de cadastro: </b> <br><br>
		<b>Nome: </b>$nome <br> 
		<b>Email: </b>$email_visitante <br>
		<b>Tipo: </b>$tipo <br>
		<b>Telefone:</b>$telefone <br> 
		<b>Razão Social: </b>$razao_social <br>
		<b>CNPJ: </b>$$cnpj <br>
		<b>endereco: </b>$endereco <br>
		<b>bairro: </b>$bairro <br>
		<b>cidade: </b>$cidade <br>
		<b>uf: </b>$uf <br>
		<b>cep: </b>$cep <br>
		<b>site: </b>$site <br>
		<b>cargo: </b>$cargo <br>
		<b>ramo_atividade: </b>$ramo_atividade <br>
		<b>area_atuacao: </b>$area_atuacao <br>
		<b>contato: </b>$contato <br>
		<b>forma_pagamento: </b>$forma_pagamento <br>";

	$mail->send();


include 'topo.php';
?>
	<div class="column-1 col-lg-8 col-md-12">

		<h4 class="list-group-item list-group-item-action py-3 lh-tight">
			Proposta de associação - Pessoa jurídica
		</h4>
		<div class="conteudo" id="coluna1">
			<p>Proposta enviada com sucesso</br>
				Estaremos avaliando, obrigado por enviar o seu E-mail.</p>
		</div>
	</div>
<?php
	include 'footer.php';
} else{
	include 'topo.php';
?>
	<div class="column-1 col-lg-8 col-md-12">
		<h4 class="list-group-item list-group-item-action py-3 lh-tight">
			Proposta de associação - Pessoa jurídica</h4>
		<div class="conteudo" id="coluna1">
			<p>Houve falha no envio do cadastro, se possível entre em contato por telefone.</p>
		</div>
	</div>
	<?php include 'footer.php'; 
}

?>