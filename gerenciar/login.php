<?php
session_start();
require("../config/config_2.php");
include 'config/db.php';
//login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['entrada'])) { 
   
    $login = $user->check_login_admin($_POST['emailusuario'], $_POST['senha']);
	
    if ($login) {
        // Registration Success
       header('location:index.php');
    } else {
        // Registration Failed
        $msg_error = "<p class='msg error'>acesso negado</p>";
    }
}  
?>

<script language="javascript" type="text/javascript"> 
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

<body>

<?php include 'topo.php'; ?>
<div class="column-1 col-lg-8 col-md-12">
    <h4 class="list-group-item list-group-item-action py-3 lh-tight">
	Login
    </h4>
    <div class="conteudo">
		<form method="post" action=""  id="login_form" name="login">
			<label>Email ou Usuário</label><br/>
			<input type="text" name="emailusuario"  required="true"/><br/>         <br/>
			<label>Senha</label><br/>
			<input type="password" name="senha" id="senha" required="true"/><br/><br/>
			<input type="hidden" name="entrada" value="1"/>
			<input type="hidden" name="flag" value="login"/>
			<input type="submit" name="login_btn" onClick="return(submitregistration());" value="Login"/>																			  									
		</form>
		<?php 
			if(isset($msg_error)){
				echo $msg_error;
			}
		?>
    </div>
</div>
<?php include 'footer.php';
?>