<?php 
require_once 'login/usuarios.php';
$u = new Usuarios; 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Clínica Santa Terezinha</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div id="corpo-nome">
		Clínica Santa Terezinha		
	</div>
	
	<div id="corpo-form">

	<h1>Entrar</h1>
	<form method="POST">
		<input type="email" name="email" placeholder="Email">
		<input type="password" name="senha" placeholder="Senha">
		<a href="">Esqueceu sua senha, <strong>clique aqui</strong></a>
		<input type="submit" value="ACESSAR">

		<a href="login/cadastrar.php">Ainda não é inscrito? <strong>Cadastre-se</strong></a>
		<br>
		<br>
		<a>Email: teste@teste.com </a>
		<a>Senha: 123</a>
	</form>
	</div>

	<?php 
	//verificar se clicou no botao
	if(isset($_POST['email'])) {
		$email = addslashes($_POST['email']);
		$senha = addslashes($_POST['senha']);

		//verificar se está preenchido
		if (!empty($email) && !empty($senha)) {
			$u->conectar("localhost", "sistemamedico", "root", "");

			if ($u->msgErro == "") {
				if ($u->logar($email, $senha)) {
					header("Location: view/index.php");
				}
				else {
					?>
					<div id="msg-erro">
						Email e/ou Senha incorretos!
					</div>
					<?php
				}				
			}
			else {
				?>
				<div id="msg-erro">
					<?php echo "Erro: ". $u->msgErro; ?>
				</div>
				<?php
			}
		}
		else {
			?>
			<div id="msg-erro">
				Preencha todos os campos!
			</div>
			<?php
		}
	}

	?>
</body>
</html>