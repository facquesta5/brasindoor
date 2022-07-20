<?php

class Banco
{
	public $pdo;
	private $bd;

	public function __construct()
	{
		try {
			$this->pdo = new PDO('mysql:host=191.252.115.89; dbname=brasindoor1', 'brasindoor1', 'hocpoc@01');
			$this->bd = new PDO('mysql:host=191.252.115.89; dbname=brasindoor1', 'brasindoor1', 'hocpoc@01');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}
	/*		
		public function __construct(){
			global $config;
		
		$this->pdo = new PDO("mysql:host={$config['servidor']};dbname={$config['banco']}","{$config['usuario']}","{$config['senha']}");
		
		$bd = mysql_connect($config['servidor'], $config['usuario'], $config['senha']) or die("Opps some thing went wrong");
mysql_select_db($config['banco'], $bd) or die("Opps some thing went wrong");
		}
*/

	public function inserirStatments($oque, $onde){
		foreach ($oque as $coluna => $dado) {
			$colunas[] = "`$coluna`"; // Criando o array $colunas[] e preparando os valores com aspas " e crases`
			$dados[] = "?"; // Criando o array $dados[] e preparando os valores ? para preparar e fazer o prepare statements
			$exec[] = $dado; // Criando o array $exec[] que sera substituido nos statements preparados
		}
		$colunas = implode(', ', $colunas); // Separando o array $colunas por virgula
		$dados = implode(', ', $dados);  //Separando o array dados por virgula
		$sql = "INSERT INTO `$onde` ($colunas) VALUE ($dados)";
		$statement = $this->pdo->prepare($sql);
		$statement->execute($exec);
	}

	public function inserirSociosStatments($oque, $onde, $email){
		$sql = "SELECT id from $onde WHERE email = '$email'";
		$statement = $this->pdo->prepare($sql);
		$statement->execute();
		$no_rows = $statement->rowCount();
		if ($no_rows == 0) {
			foreach ($oque as $coluna => $dado) {
				$colunas[] = "`$coluna`"; // Criando o array $colunas[] e preparando os valores com aspas " e crases`
				$dados[] = "?"; // Criando o array $dados[] e preparando os valores ? para preparar e fazer o prepare statements
				$exec[] = $dado; // Criando o array $exec[] que sera substituido nos statements preparados
			}
			$colunas = implode(', ', $colunas); // Separando o array $colunas por virgula
			$dados = implode(', ', $dados);  //Separando o array dados por virgula
			$sql = "INSERT INTO `$onde` ($colunas) VALUE ($dados)";
			$statement = $this->pdo->prepare($sql);
			$statement->execute($exec);
		}
	}

	public function inserirSociosGerenciaStatments($oque, $onde, $nome){
		$sql = mysql_query("SELECT id from $onde WHERE nome = '$nome'");
		$no_rows = mysql_num_rows($sql);
		if ($no_rows == 0) {
			foreach ($oque as $coluna => $dado) {
				$colunas[] = "`$coluna`"; // Criando o array $colunas[] e preparando os valores com aspas " e crases`
				$dados[] = "?"; // Criando o array $dados[] e preparando os valores ? para preparar e fazer o prepare statements
				$exec[] = $dado; // Criando o array $exec[] que sera substituido nos statements preparados
			}
			$colunas = implode(', ', $colunas); // Separando o array $colunas por virgula
			$dados = implode(', ', $dados);  //Separando o array dados por virgula
			$sql = "INSERT INTO `$onde` ($colunas) VALUE ($dados)";
			$statement = $this->pdo->prepare($sql);
			$statement->execute($exec);
		}
	}

	public function listarStatements($oque, $tabela, $id_tabela, $limit)
	{
		if ($limit != "") {
			$sql = "SELECT $oque FROM `$tabela` ORDER BY $id_tabela DESC LIMIT $limit";
		} else {
			$sql = "SELECT $oque FROM `$tabela` ORDER BY $id_tabela DESC";
		}

		$statement = $this->pdo->prepare($sql);
		$statement->execute();
		$resultados = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $resultados;
	}


	public function verStatements($tabela, $oque, $id, $id_tabela, $status)
	{
		$exec[] = $id;
		$sql = "SELECT $oque FROM `$tabela` WHERE $id_tabela = ? limit 1";
		if($status != ""){
			$sql = "SELECT $oque FROM `$tabela` WHERE $id_tabela = ? AND id_status = 1 ORDER BY NOME";
		}
		
		$statement = $this->pdo->prepare($sql);
		$statement->execute($exec);
		$resultados = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $resultados;
	}


	public function alterarStatements($oque, $onde, $id, $id_tabela)
	{
		foreach ($oque as $coluna => $dado) {
			$dados[] = "`$coluna` = ?"; //Cria o array de colunas = valores preparando uma string com valores para statement 
			$exec[] = $dado; // Criando o array $exec[] que sera substituido nos statements preparados
		}
		$dados = implode(', ', $dados);
		$exec[] = $id;
		$sql = "UPDATE `$onde` SET $dados WHERE $id_tabela = ?";
		$statement = $this->pdo->prepare($sql);
		$statement->execute($exec);
	}


	public function removerStatements($onde, $id, $id_tabela)
	{
		$exec[] = $id;
		$sql = "DELETE FROM $onde WHERE $id_tabela = ? ";
		$statement = $this->pdo->prepare($sql);
		$statement->execute($exec);
	}


	public function redirectTo($redirect)
	{
		echo "<script>location.href=\"$redirect\"</script>";
	}


	public function validaEmail($email)
	{
		$variavel = strpos($email, "@");
		if ($variavel > 2 && $variavel != false) {
			$variavel2 = strpos($email, ".");
			if ($variavel2 > 2) {
				$separa1 = explode('@', $email);
				$usuario = $separa1[0];
				$separa2 = explode('.', $separa1[1]);
				$dominio = $separa2[0];
				$extensao = $separa2[1];
				if (trim($usuario) != '' && trim($dominio) != '' && trim($extensao) != '') {
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}
