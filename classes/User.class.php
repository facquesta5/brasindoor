<?php


class User extends Banco
{
	public function ultimo_id($tabela){
		$sql = "SELECT * FROM $tabela ORDER by id DESC";
		$row = $this->pdo->query($sql)->fetch();
		// $row = $statement->rowCount($sql);
		return $row;
	}

	public function register_user($nome, $senha, $email, $id_nivel)	{
		$senha = md5($senha);

		$sql = mysql_query("SELECT id from socios WHERE email = '$email'");
		$no_rows = mysql_num_rows($sql);

		if ($no_rows == 0) {
			$result = mysql_query("INSERT INTO socios(
        	 senha, nome, email, id_nivel
        	) values (
        	'$senha','$nome','$email', '$id_nivel'
        	)") or die(mysql_error());
			return $result;
		} else {
			return FALSE;
		}
	}

	public function check_email($email){
		$sql = "SELECT email from socios WHERE email = '$email'";
		$statement = $this->pdo->prepare($sql);
		$statement->execute();
		$no_rows = $statement->rowCount();
		
		if ($no_rows > 0) {
			$resultado = 1;
		} else {
			$resultado = 0;
		}
		echo $resultado;
	}

	public function getMailing(){
		$data = $this->pdo->query("SELECT email FROM socios WHERE id_status = 1 ORDER BY id desc");
        return $data;
	}

	public function limpaCnpj($cnpj){
		$cnpj = str_replace('.', '', $cnpj);
		$cnpj = str_replace('/', '', $cnpj);
		$cnpj = str_replace('-', '', $cnpj);
		return $cnpj;
	}
	
	public function separaTelefone($telefone)	{
		$quebraTel = explode(' ', $telefone);
		$quebraTel[0] = str_replace('(', '', $quebraTel[0]);
		$quebraTel[0] = str_replace(')', '', $quebraTel[0]);
		$ddd = $quebraTel[0];
		$quebraTel[] = "";
		$quebraTel[1] = str_replace('-', '', $quebraTel[1]);
		$tel = $quebraTel[1];
		return array($ddd, $tel);
	}
	public function separaCep($cep)	{
		$cep = str_replace('-', '', $cep);
		return $cep;
	}


	public function check_login($emailusuario, $senha)	{
		$senha = md5($senha);

		$result = mysql_query("SELECT * from socios WHERE email = '$emailusuario' and senha = '$senha'");

		$user_data = mysql_fetch_array($result);
		$no_rows = mysql_num_rows($result);

		if ($no_rows == 1) {
			$_SESSION['login'] = true;
			$_SESSION['nome'] = $user_data['nome'];
			$_SESSION['id'] = $user_data['id'];
			$_SESSION['data_registro'] = $user_data['data_registro'];
			$_SESSION['id_nivel'] = $user_data['id_nivel'];
			return TRUE;
		} else {
			return FALSE;
		}
	}

	
	public function check_login_admin($emailusuario, $senha){
		$senha = md5($senha);
		$sql = "SELECT id, nome, email, senha, id_nivel from socios WHERE 
	        		email = '$emailusuario' and 
	        		senha = '$senha'";
		$statement = $this->pdo->prepare($sql);
		$statement->execute();
		$user_data = $statement->fetch(PDO::FETCH_ASSOC);
		$no_rows = $statement->rowCount();

		if ($no_rows == 1) {

			$_SESSION['login'] = true;
			$_SESSION['nome'] = $user_data['nome'];
			$_SESSION['id'] = $user_data['id'];
			$_SESSION['id_nivel'] = $user_data['id_nivel'];
			$_SESSION['msg_done'] = $msg_done = "<p class='msg done'>acesso permitido</p>";
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_fullname($uid){
		$result = mysql_query("SELECT name FROM usuario WHERE id_usuario = $uid");
		$user_data = mysql_fetch_array($result);
		echo $user_data['name'];
	}


	public function get_session(){
		return $_SESSION['login'];
	}

	public function user_logout(){
		$_SESSION['login'] = FALSE;
		session_destroy();
	}

	// This function will take $_SERVER['REQUEST_URI'] and build a breadcrumb based on the user's current path
	public function breadcrumbs($separator = ' &raquo; ', $home = 'Home'){
		// This gets the REQUEST_URI (/path/to/file.php), splits the string (using '/') into an array, and then filters out any empty values
		$path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
		
		// This will build our "base URL" ... Also accounts for HTTPS :)
		$base = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

		// Initialize a temporary array with our breadcrumbs. (starting with our home page, which I'm assuming will be the base URL)
		$breadcrumbs = array("<li class=\"breadcrumb-item\"><a href=\"$base\">$home</a>&#160;</li>");
		
		// Find out the index for the last value in our path array
		$last = end(array_keys($path));
		$last_value = end(array_values($path));
		
		// Build the rest of the breadcrumbs
		foreach ($path as $x => $crumb) {
			// Our "title" is the text that will be displayed (strip out .php and turn '_' into a space)
			$title = ucwords(str_replace(array('.php', '_'), array('', ' '), $crumb));
			if($last_value != 'index_copy.php'){
			// If we are not on the last index, then display an <a> tag
			if ($x != $last)
				$breadcrumbs[] = "<li class=\"breadcrumb-item\"><a href=\"$base$crumb\">$title</a></li>";
			// Otherwise, just display the title (minus)
			else
				$breadcrumbs[] = $title;
			}
		}

		// Build our temporary array (pieces of bread) into one big string :)
		return implode($separator, $breadcrumbs);
	}

	

}
