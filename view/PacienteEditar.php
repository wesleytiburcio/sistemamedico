<?php require_once("layout/head.php"); ?>
<?php require_once("layout/menu.php"); ?>
<?php require_once("layout/nav.php"); ?>
<?php require_once("layout/PacienteMenu.php"); ?>

<?php 
require_once '../model/Paciente.php';
$paciente = new Paciente();

require_once("../model/Funcoes.php");
$funcoes = new Funcoes();

$id = (int) $_GET['id_pacientes'];
$dados = $paciente->selectUnit($id);
?>

<?php 
if (isset($_POST['pacienteatualizar'])) {
	$nome = ucwords(strtolower($_POST['nome_pacientes']));
	$cpf = $_POST['cpf_pacientes'];
	$email = $_POST['email_pacientes'];
	$telefone = $_POST['telefone_pacientes'];
	$datacadastro = $_POST['datacadastro_pacientes'];
	$dataaniversario = $_POST['dataaniversario_pacientes'];
	$idade = $funcoes->calculo_idade($dataaniversario);
	$situacao = $_POST['situacao_pacientes'];
	
	$paciente->setNome($nome);
	$paciente->setCpf($cpf);
	$paciente->setEmail($email);
	$paciente->setTelefone($telefone);
	$paciente->setDatacadastro($datacadastro);
	$paciente->setDataaniversario($dataaniversario);
	$paciente->setIdade($idade);
	$paciente->setSituacao($situacao);

	if ($paciente->update($id, $nome, $cpf, $email, $telefone, $datacadastro, $dataaniversario, $idade, $situacao)) {	
		echo "Paciente atualizado com sucesso!";
		//header('Location: ../view/PacienteListar.php');
	}
}
?>

<div class="container">
	<hr>
	<form action="" method="POST" style="width: 300px;">

		<div>
			<input class="form-control" type="text" id="nome_pacientes" name="nome_pacientes" value="<?php echo $dados->nome_pacientes; ?>">
		</div>
		<br>
		<div>
			<input class="form-control" type="text" id="cpf_pacientes" name="cpf_pacientes" value="<?php echo $dados->cpf_pacientes; ?>" >
		</div>
		<br>
		<div>
			<input class="form-control" type="email" id="email_pacientes" name="email_pacientes" value="<?php echo $dados->email_pacientes; ?>" >	
		</div>
		<br>
		<div>
			<input class="form-control" type="text" id="telefone_pacientes" name="telefone_pacientes" value="<?php echo $dados->telefone_pacientes; ?>">	
		</div>
		<br>
		<div>
			<input class="form-control" type="date" id="datacadastro_pacientes" name="datacadastro_pacientes" value="<?php echo $dados->datacadastro_pacientes; ?>" >
		</div>
		<br>
		<div>
			<input class="form-control" type="date" id="dataaniversario_pacientes" name="dataaniversario_pacientes" value="<?php echo $dados->dataaniversario_pacientes; ?>" >	
		</div>
		<br>
		<?php $st = $dados->situacao_pacientes; ?>
		<div>
			<?php if ($st == '0'): ?>
				<select class="form-control" name="situacao_pacientes">
				<option value="0">Inativo</option>
				<option value="1">Ativo</option>				
			</select>
			<?php 
			endif;
			?>
			<?php if ($st == '1'): ?>
				<select class="form-control" name="situacao_pacientes">
				<option value="1">Ativo</option>
				<option value="0">Inativo</option>						
			</select>
			<?php 
			endif;
			?>		
		</div>	
		
		<br>
		<input type="submit" name="pacienteatualizar" value="ATUALIZAR PACIENTE" class="btn btn-outline-secondary">	
	</form>

</div>
<?php require_once("layout/footer.php"); ?>