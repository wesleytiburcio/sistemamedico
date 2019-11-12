<?php require_once("layout/head.php"); ?>
<?php require_once("layout/menu.php"); ?>
<?php require_once("layout/nav.php"); ?>
<?php require_once("layout/MedicoMenu.php"); ?>

<?php 
require_once '../model/Medico.php';
$medico = new Medico();

$id = (int) $_GET['id_medicos'];
$dados = $medico->selectUnit($id);


?>

<?php 
if (isset($_POST['medicoatualizar'])) {
	$nome = ucwords(strtolower($_POST['nome_medicos']));
	$crm = $_POST['crm_medicos'];
	$email = $_POST['email_medicos'];
	$telefone = $_POST['telefone_medicos'];
	$datacadastro = $_POST['datacadastro_medicos'];
	$situacao = $_POST['situacao_medicos'];
	
	$medico->setNome($nome);
	$medico->setCrm($crm);
	$medico->setEmail($email);
	$medico->setTelefone($telefone);
	$medico->setDatacadastro($datacadastro);
	$medico->setSituacao($situacao);

	if ($medico->update($id, $nome, $crm, $email, $telefone, $datacadastro, $situacao)) {	
		echo "Médico atualizado com sucesso!";
		header('Location: ../view/MedicoListar.php');
	}
}
?>

<div class="container">
	<hr>
	<form action="" method="POST" style="width: 300px;">

		<div>
			<input class="form-control" type="text" id="nome_medicos" name="nome_medicos" value="<?php echo $dados->nome_medicos; ?>">
		</div>
		<br>
		<div>
			<input class="form-control" type="text" id="crm_medicos" name="crm_medicos" value="<?php echo $dados->crm_medicos; ?>" >
		</div>
		<br>
		<div>
			<input class="form-control" type="email" id="email_medicos" name="email_medicos" value="<?php echo $dados->email_medicos; ?>" >	
		</div>
		<br>
		<div>
			<input class="form-control" type="text" id="telefone_medicos" name="telefone_medicos" value="<?php echo $dados->telefone_medicos; ?>">	
		</div>
		<br>
		<div>
			<input class="form-control" type="date" id="datacadastro_medicos" name="datacadastro_medicos" value="<?php echo $dados->datacadastro_medicos; ?>" >	
		</div>
		<br>
		<?php $st = $dados->situacao_medicos; ?>
		
		<div>
			<?php if ($st == '0'): ?>
				<select name="situacao_medicos" class="form-control">
				<option value="0">Inativo</option>
				<option value="1">Ativo</option>				
			</select>
			<?php 
			endif;
			?>
			<?php if ($st == '1'): ?>
				<select name="situacao_medicos" class="form-control">
				<option value="1">Ativo</option>
				<option value="0">Inativo</option>						
			</select>
			<?php 
			endif;
			?>		
		</div>	
		
		<br>
		<input type="submit" name="medicoatualizar" value="ATUALIZAR MÉDICO" class="btn btn-outline-secondary">	
	</form>

</div>
<?php require_once("layout/footer.php"); ?>