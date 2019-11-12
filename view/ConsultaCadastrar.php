
<?php include_once 'layout/head.php'; ?>
<?php include_once 'layout/menu.php'; ?>
<?php include_once 'layout/nav.php'; ?>
<?php include_once 'layout/ConsultaMenu.php'; ?>

<?php
require_once("../model/Consulta.php");
$consulta = new Consulta();
require_once("../model/Funcoes.php");
$funcoes = new Funcoes();
require_once("../model/Medico.php");
$medico = new Medico();

require_once("../model/Paciente.php");
$paciente = new Paciente();

require_once '../model/Especialidade.php';
$especialidade = new Especialidade();

require_once '../model/MedicoEspecialidade.php';
$medicoEspecialidade = new MedicoEspecialidade();
?>

<div class="container" >
	
	<hr>

	<form action="#" id="ConsultaInserir" method="POST" style="width:300px;" >

		<label for="">Paciente</label>
		<br>
		<select name="pacienteconsulta" id="pacienteconsulta" class="form-control" required>
			<option value="">Selecione o Paciente</option>
			<?php foreach ($paciente->selectAll() as $key => $value): ?>
				<option value="<?php echo $value['nome_pacientes']; ?>"><?php echo $value['nome_pacientes']; ?></option>
			<?php endforeach ?>
		</select>
		<br>

		<label for="">Médico</label>
		<br>
		<select name="medicoconsulta" id="medicoconsulta" class="form-control" required>
			<option value="">Selecione o Médico</option>
			<?php foreach ($medico->selectAll() as $key => $value): ?>
				<option value="<?php echo $value->nome_medicos; ?>"><?php echo $value->nome_medicos; ?></option>
			<?php endforeach ?>
		</select>
		<br>

		<label for="">Especialidade</label>
		<br>
		<select name="especialidadeconsulta" id="especialidadeconsulta" class="form-control" required>
			<option value="">Selecione Especialidade</option>
			
		</select>
		<br>

		<label>Data da Consulta</label>
		<div >
			<input type="date" id="dataconsulta" name="dataconsulta" class="form-control">	
		</div>

		<br>
		<label for="">Hora da Consulta</label>
		<br>
		<select name="horaconsulta" id="horaconsulta" class="form-control"  required>
			<option value="">Selecione a hora da consulta</option>
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
		<label for="">Observação</label>
		<br>
		<textarea id="observacaoconsulta" name="observacaoconsulta" cols="60"></textarea>
		<br>
		<br>
		<input type="submit" name="consultacadastrar" id="consultacadastrar" value="CADASTRAR CONSULTA" class="btn btn-outline-secondary">
	</form>
<br>
  </div>
<?php include_once 'layout/footer.php'; ?>

<script>
  $(document).ready(function(){
    $('#medicoconsulta').change(function(){
      var medicoNome = $('#medicoconsulta').val();

      console.log(medicoNome);

      $.ajax(
      {
        url:'ConsultaCadastrarPost.php',
        method:'POST',
        data:{medicoNome:medicoNome},
        success:function(data)
        {
          //alert(data);
          $('#especialidadeconsulta').html(data);
        }
      });      
    });

    $('#ConsultaInserir').on('submit', function(event){
      event.preventDefault();
      //var form_dados = $(this).serialize();
      var pacientecons = $('#pacienteconsulta').val();
		  var medicocons = $('#medicoconsulta').val();
		  var especialidade = $('#especialidadeconsulta').val();
		  var dataconsulta = $('#dataconsulta').val();
		  var horaconsulta = $('#horaconsulta').val();
		  var observacao = $('#observacaoconsulta').val();
		      
      $.ajax({
        url:'ConsultaCadastrarPost.php',
        method:'POST',
        data:
        {
        	pacientecons:pacientecons,
				  medicocons:medicocons,
				  especialidade:especialidade,
				  dataconsulta:dataconsulta,
				  horaconsulta:horaconsulta,
				  observacao:observacao,
        },
        success:function(data){
          alert(data);
        }
      });
    });

  });  
</script>