<?php require_once("layout/head.php"); ?>
<?php require_once("layout/menu.php"); ?>
<?php require_once("layout/nav.php"); ?>
<?php require_once("layout/ListaMEMenu.php"); ?>

<?php 
require_once '../model/Especialidade.php';
$especialidade = new Especialidade();

require_once("../model/Funcoes.php");
$funcoes = new Funcoes();

require_once '../model/Medico.php';
$medico = new Medico();

include_once '../model/MedicoEspecialidade.php';
$medicoespecialidade = new MedicoEspecialidade();

$id_medesp = (int) $_GET['id_medesp'];

$dado = $medicoespecialidade->selectUnit($id_medesp);
$espec = $especialidade->selectAll();
$medic = $medico->selectAll();
?>

<?php 
if (isset($_POST['medicoespecialidadeatualizar'])) {
	$id_esp = $_POST['especialidade'];
	$id_med = $_POST['medico'];

	$medicoespecialidade->setIdEsp($id_esp);
	$medicoespecialidade->setIdMed($id_med);

	if ($medicoespecialidade->update($id_medesp, $id_esp,  $id_med)) {	
		echo "Atualizado com sucesso!";
	}
}
?>

<div class="container">
	<hr>
	<form action="" method="POST" style="width: 300px;">
		<br>	
		<label for="">Médico</label>
		<select name="medico" class="form-control">
			<option>selecione</option>
			<?php foreach ($medic as $key => $value): ?>
				<option value="<?php echo $value->id_medicos;?>"><?php echo $value->nome_medicos; ?></option>		
			<?php endforeach ?>
		</select>
		<br>
		<label for="">Especialidade</label>
		<select name="especialidade" class="form-control">
			<option>selecione</option>
			<?php foreach ($espec as $key => $value): ?>
				<option value="<?php echo $value->id_especialidades; ?>"><?php echo $value->nome_especialidades; ?></option>		
			<?php endforeach ?>
		</select>
		<br>
		<br>
		<input type="submit" name="medicoespecialidadeatualizar" value="ATUALIZAR MÉDICO_ESPECIALIDADE" class="btn btn-outline-secondary">
		
	</form>	

</div>
<?php require_once("layout/footer.php"); ?>