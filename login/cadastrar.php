<?php 
	require_once 'usuarios.php';
	$u = new Usuarios;
 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Projeto Login - Cadastrar</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div id="corpo-form" >

	<h1>Cadastrar</h1>
	<form method="POST">
		<input type="text" name="nome" placeholder="Nome" maxlength="50">
		
		<input type="text" name="telefone" placeholder="Telefone" maxlength="30">
		
		<input type="email" name="email" placeholder="Email" maxlength="40">
		
		<input type="password" name="senha" placeholder="Senha(máximo 8 letras)" maxlength="8">
		
		<input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="8">
		
		<input type="submit" value="Cadastrar">
		
		<a href="../index.php" ><strong>Voltar</strong></a>
	</form>
	</div>

	<?php 
	//verificar se clicou no botao
	if(isset($_POST['nome'])) {
		$nome = addslashes($_POST['nome']);
		$telefone = addslashes($_POST['telefone']);
		$email = addslashes($_POST['email']);
		$senha = addslashes($_POST['senha']);
		$confSenha = addslashes($_POST['confSenha']);

		//verificar se está preenchido
		if (!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confSenha)) {
			$u->conectar("localhost", "sistemamedico", "root", "");

			if ($u->msgErro == "") {

				if ($senha == $confSenha) {
					if ($u->cadastrar($nome, $telefone, $email, $senha)) {
						?>
						<div class="msg-success">
							Cadastrado com sucesso! Acesse para entrar!
						</div>
						<?php
						
					}
					else {
						?>
						<div id="msg-erro">
							Email já cadastrado!
						</div>
						<?php
					}
				}
				else {
					?>
						<div id="msg-erro">
							Senha e Confirmar Senha não correspondem!
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