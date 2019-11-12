<?php require_once("layout/head.php"); ?>
<?php require_once("layout/menu.php"); ?>
<?php require_once("layout/nav.php"); ?>
<?php require_once("layout/EspecialidadeMenu.php"); ?>

<?php 
require_once '../model/Especialidade.php';
$especialidade = new Especialidade();

require_once("../model/Funcoes.php");
$funcoes = new Funcoes();

$id = (int) $_GET['id_especialidades'];
$dados = $especialidade->selectUnit($id);

?>
<?php 
if (isset($_POST['especialidadeatualizar'])) {
	$nome = $funcoes->tirarAcentos($_POST['nome_especialidades']);
	$nome = mb_strtoupper($nome);
	$situacao = $_POST['situacao_especialidades'];
	
	$especialidade->setNome($nome);
	$especialidade->setSituacao($situacao);

	if ($especialidade->update($id, $nome, $situacao)) {	
		header('Location: ../view/Especialidade.php');
		echo "Especialidade atualizado com sucesso!";
	}
}
?>

<div class="container">
	
	<hr>
	<form action="" method="POST" style="width:300px;">

		<div>
			<input class="form-control" type="text" id="nome_especialidades" name="nome_especialidades" value="<?php echo $dados->nome_especialidades; ?>">
		</div>
		<br>
		<?php $st = $dados->situacao_especialidades; ?>
		
		<div>
			<?php if ($st == '0'): ?>
				<select name="situacao_especialidades" class="form-control">
				<option value="0">Inativo</option>
				<option value="1">Ativo</option>				
			</select>
			<?php 
			endif;
			?>
			<?php if ($st == '1'): ?>
				<select name="situacao_especialidades" class="form-control">
				<option value="1">Ativo</option>
				<option value="0">Inativo</option>						
			</select>
			<?php 
			endif;
			?>		
		</div>	
		
		<br>
		<input type="submit" name="especialidadeatualizar" value="Atualizar Especialidade" class="btn btn-outline-secondary">	
	</form>

</div>
<?php require_once("layout/footer.php"); ?>