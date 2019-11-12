<?php require_once("layout/head.php"); ?>
<?php require_once("layout/menu.php"); ?>
<?php require_once("layout/nav.php"); ?>
<?php require_once("layout/ListaMEMenu.php"); ?>

<?php 
require_once('../model/Especialidade.php');
$especialidade = new Especialidade();

require_once("../model/Funcoes.php");
$funcoes = new Funcoes();

require_once('../model/Medico.php');
$medico = new Medico();

require_once('../model/MedicoEspecialidade.php');
$medicoespecialidade = new MedicoEspecialidade();

$id = (int) $_GET['id_medicos'];
$dado = $medicoespecialidade->selectUnit($id);

foreach ($dado as $key => $value) {
	$id = $value->id_medicos;
	$nome = $value->nome_medicos;
}

$result = $especialidade->selectAll();
?>

<div class="container">
	<hr>
	<form action="" method="POST" id="inserirform" style="width: 300px;">
		<br>	
		<label for="">Médico</label>
		<input type="hidden" name="idmedico" id="idmedico" value="<?php echo $id; ?>" class="form-control" readonly>
		<input type="text" name="nomemedico" id="nomemedico" value="<?php echo $nome; ?>" class="form-control" readonly>

		<br>
		<label for="">Especialidades</label>
		<br>
		<select name="lista_espec[]" id="lista_espec" class="form-control" multiple>
			<?php foreach ($result as $key => $value): ?>
				<option value="<?php echo $value->id_especialidades; ?>"><?php echo $value->nome_especialidades; ?></option>		
			<?php endforeach ?>
		</select>
		
		<br>
		<br>
		<input type="submit" name="medicoespecialidadeatualizar" id="medicoespecialidadeatualizar" value="ATUALIZAR MÉDICO_ESPECIALIDADE" class="btn btn-outline-secondary">

	</form>	
<br>
</div>
<?php require_once("layout/footer.php"); ?>

<script>
	$(document).ready(function(){
		$('#lista_espec').multiselect({
			nonSelectedText: 'Selecione Especialidade',
			enableFiltering: true,
			enableCaseInsensitiveFiltering: true,
			buttonWidth: '300px',
		});

	$('#inserirform').on('submit', function(event){
		event.preventDefault();
	
		var formdata = $('#inserirform').serialize();

		$.ajax({
			url:'ListaMEPost.php', 
			method:'POST', 
			data:formdata,
			success:function(data)
			{
				//alert(data);
				$('#inserirform').html(data);
			}
		});
	});
});

</script>