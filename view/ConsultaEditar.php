<?php require_once("layout/head.php"); ?>
<?php require_once("layout/menu.php"); ?>
<?php require_once("layout/nav.php"); ?>
<?php include_once 'layout/ConsultaMenu.php'; ?>

<?php 
require_once '../model/Consulta.php';
$consulta = new Consulta();
require_once("../model/Funcoes.php");
$funcoes = new Funcoes();
require_once("../model/Medico.php");
$medico = new Medico();
require_once("../model/Paciente.php");
$paciente = new Paciente();
require_once '../model/Especialidade.php';
$especialidade = new Especialidade();

$id = (int) $_GET['id_consultas'];
$dado = $consulta->selectUnit($id);
?>

<?php
if (isset($_POST['consultaatualizar'])) {
	$pacientecons = $_POST['pacienteconsulta'];
	$medicocons = $_POST['medicoconsulta'];
	$especialidadeconsulta = $_POST['especialidadeconsulta'];
	$dataconsulta = $_POST['dataconsulta_consultas'];
	$horaconsulta = $_POST['horaconsulta_consultas'];
	$situacao = $_POST['situacao_consultas'];
	$observacao = $_POST['observacao_consultas'];

	$consulta->setPacientecons($pacientecons);
	$consulta->setMedicocons($medicocons);
	$consulta->setEspecialidade($especialidadeconsulta);
	$consulta->setDataconsulta($dataconsulta);
	$consulta->setHoraconsulta($horaconsulta);
	$consulta->setSituacao($situacao);
	$consulta->setObservacao($observacao);

	if ($consulta->update($id, $pacientecons, $medicocons, $especialidade, $dataconsulta, $horaconsulta, $situacao, $observacao)) {	
		echo "Consulta atualizado com sucesso!";
		//header('Location: ../view/ConsultaListar.php');
	}
}
?>

<div class="container">
	
	<hr>
	<form action="" method="POST" style="width:300px;" >
		<label for="">Paciente</label><br>
		<input type="text" name="pacienteconsulta" id="pacienteconsulta" value="<?php echo $dado->paciente_consultas; ?>" class="form-control" readonly>

		<!-- <select name="pacienteconsulta" >
			<option><?php echo $dado->paciente_consultas; ?></option>
			<?php foreach ($paciente->selectAll() as $key => $value): ?>
				<option value="<?php echo $value->nome_pacientes; ?>"><?php echo $value->nome_pacientes; ?></option>		
			<?php endforeach ?>
		</select> -->
		<br>
		<label for="">Médico</label><br>
		<select name="medicoconsulta" class="form-control">
			<option><?php echo $dado->medico_consultas; ?></option>
			<?php foreach ($medico->selectAll() as $key => $value): ?>
				<option value="<?php echo $value->nome_medicos; ?>"><?php echo $value->nome_medicos; ?></option>		
			<?php endforeach ?>
		</select>
		<br>
		<label for="">Especialidade</label><br>
		<select name="especialidadeconsulta" class="form-control">
			<option><?php echo $dado->especialidade_consultas; ?></option>
			<?php foreach ($especialidade->selectAll() as $key => $value): ?>
				<option value="<?php echo $value->nome_especialidades; ?>"><?php echo $value->nome_especialidades; ?></option>		
			<?php endforeach ?>
		</select>
		<br>
		<label for="">Data da consulta</label>
		<div>			
			<input type="date" id="dataconsulta_consultas" name="dataconsulta_consultas" value="<?php echo $dado->dataconsulta_consultas; ?>" class="form-control">	
		</div>
		<br>
		<label for="">Hora da consulta</label><br>
		<select name="horaconsulta_consultas" class="form-control">
			<option><?php echo $dado->horaconsulta_consultas; ?></option>
			<option value="09:00-09:30">09:00 - 09:30</option>
			<option value="09:30-10:00">09:30 - 10:00</option>
			<option value="10:00-10:30">10:00 - 10:30</option>
			<option value="10:30-11:00">10:30 - 11:00</option>
			<option value="11:00-11:30">11:00 - 11:30</option>
			<option value="11:30-12:00">11:30 - 12:00</option>
			<option value="14:00-14:30">14:00 - 14:30</option>
			<option value="14:30-15:00">14:30 - 15:00</option>
			<option value="15:00-15:30">15:00 - 15:30</option>
			<option value="15:30-16:00">15:30 - 16:00</option>
			<option value="16:00-16:30">16:00 - 16:30</option>
			<option value="16:30-17:00">16:30 - 17:00</option>
			<option value="17:00-17:30">17:00 - 17:30</option>
			<option value="17:30-18:00">17:30 - 18:00</option>			
		</select>
		<br>
		<label for="">Situção</label> 
		<br>
		<?php $st = $dado->situacao_consultas; ?>
		<div>
			<?php if ($st == '0'): ?>
				<select name="situacao_consultas" class="form-control">
				<option value="0">Inativo</option>
				<option value="1">Ativo</option>				
			</select>
			<?php 
			endif;
			?>
			<?php if ($st == '1'): ?>
				<select name="situacao_consultas" class="form-control">
				<option value="1">Ativo</option>
				<option value="0">Inativo</option>						
			</select>
			<?php 
			endif;
			?>		
		</div>
		<br>
		<label for="">Observação</label>
		<div>
		<textarea id="observacao_consultas" name="observacao_consultas" value="<?php echo $dado->observacao_consultas; ?>" cols="60"><?php echo $dado->observacao_consultas; ?></textarea>
		</div>
		<br>
		<input type="submit" name="consultaatualizar" value="ATUALIZAR CONSULTA" class="btn btn-outline-secondary">
		<br>
		<br>
	</form>	

</div>
<?php require_once("layout/footer.php"); ?>