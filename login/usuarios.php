<?php 

class Usuarios {

	private $pdo;
	public $msgErro = "";

	public function conectar($host, $nome, $usuario, $senha) {
		global $pdo;
		global $msgErro;

		try {
			$pdo = new PDO('mysql:host='.$host. ';dbname='. $nome, $usuario, $senha);
		} catch (PDOException $e) {
			$msgErro = $e->getMessage();
			
		}		
	}

	public function cadastrar($nome, $telefone, $email, $senha) {
		global $pdo;
		global $msgErro;

		// verificar se já existe usuario cadastrado
		$sql = $pdo->prepare(" SELECT id_usuario FROM usuarios WHERE email = :e ");
		$sql->bindValue(":e",$email);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return false;
		}
		else {
			//caso não, cadastrar

			$sql = $pdo->prepare(" INSERT INTO usuarios (nome, telefone, email, senha) VALUES (:n, :t, :e, :s) ");
			$sql->bindValue(":n", $nome);
			$sql->bindValue(":t", $telefone);
			$sql->bindValue(":e", $email);
			$sql->bindValue(":s", md5($senha));

			$sql->execute();

			return true;
		}
	}

	public function logar($email, $senha) {
		global $pdo;

		//verificar se o email e senha estão cadastrado
		$sql = $pdo->prepare(" SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s ");
		$sql->bindValue(":e" , $email);
		$sql->bindValue(":s" , md5($senha));

		$sql->execute();

		if ($sql->rowCount() > 0) {
			//entrar no sistema(sessão)
			$dado = $sql->fetch();
			session_start();
			$_SESSION['id_usuario'] = $dado['id_usuario'];

			return true;  //cadastrado com sucesso
		}
		else {
			return false; //não foi possivel logar
		}
	}
}

