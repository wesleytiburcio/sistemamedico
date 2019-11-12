<?php require_once("layout/head.php"); ?>
<?php require_once("layout/menu.php"); ?>
<?php require_once("layout/nav.php"); ?>
<?php require_once("layout/PacienteMenu.php"); ?>

<?php 
require_once("../model/Paciente.php");
$paciente = new Paciente();

require_once("../model/Funcoes.php");
$funcoes = new Funcoes();
?>

<div class="container">
	<hr>
	
	<form action="" id="insert_form" method="POST" style="width: 300px;">

		<div>
			<input class="form-control" type="text" id="nome" name="nome" placeholder="nome do paciente" required>
		</div>
		<br>
		<div>
			<input class="form-control" type="text" id="cpf" name="cpf" placeholder="cpf do paciente" required>
		</div>
		<br>
		<div>
			<input class="form-control" type="email" id="email" name="email" placeholder="email do paciente" required>	
		</div>
		<br>
		<div>
			<input class="form-control" type="text" id="telefone" name="telefone" placeholder="telefone do paciente" required>	
		</div>
		<br>
		<label for="">Data de Cadastro</label>
		<div>
			<input class="form-control" type="date" id="datacadastro" name="datacadastro" placeholder="data de cadastro" required>
		</div>
		<br>
		<label for="">Data de Nascimento</label>
		<div>
			<input class="form-control" type="date" id="dataaniversario" name="dataaniversario" placeholder="data de aniversario" required>	
		</div>
		<br>
		<br>
		<input type="submit" name="pacientecadastrar" value="CADASTRAR PACIENTE" class="btn btn-outline-secondary">
	</form>	

<?php 

if (isset($_POST['pacientecadastrar'])) {
	$nome = ucwords(strtolower($_POST['nome']));
	$cpf = $_POST['cpf'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$datacadastro = $_POST['datacadastro'];
	$dataaniversario = $_POST['dataaniversario'];

	$idade = $funcoes->calculo_idade($dataaniversario);

	$situacao = '1';

	$paciente->setNome($nome);
	$paciente->setCpf($cpf);
	$paciente->setEmail($email);
	$paciente->setTelefone($telefone);
	$paciente->setDatacadastro($datacadastro);
	$paciente->setDataaniversario($dataaniversario);
	$paciente->setIdade($idade);
	$paciente->setSituacao($situacao);

	if ($paciente->inserir()) {
		echo "Cadastrado especialidade com sucesso!";
	}
}
?>

</div>
<?php require_once("layout/footer.php"); ?>