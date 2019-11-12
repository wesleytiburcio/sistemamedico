<?php require_once("layout/head.php"); ?>
<?php require_once("layout/menu.php"); ?>
<?php require_once("layout/nav.php"); ?>
<?php require_once("layout/MedicoMenu.php"); ?>

<?php 
require_once("../model/Medico.php");
require_once("../model/Especialidade.php");
require_once("../model/MedicoEspecialidade.php");
$medicoespecialidade = new MedicoEspecialidade();
$especialidade = new Especialidade();
$medico = new Medico();

$result = $especialidade->selectAll()
?>

<div class="container">
	<hr>
	
	<form action="" id="insert_form" method="POST" style="width: 300px;">
		<label for="">Médico</label>
		<div>
			<input class="form-control" type="text" id="nome" name="nome" placeholder="nome do médico" >
		</div>
		<br>
		<label for="">CRM</label>
		<div>
			<input class="form-control" type="text" id="crm" name="crm" placeholder="crm do médico" >
		</div>
		<br>
		<label for="">Email</label>
		<div>
			<input class="form-control" type="email" id="email" name="email" placeholder="email do médico" >	
		</div>
		<br>
		<label for="">Telefone</label>
		<div>
			<input class="form-control" type="text" id="telefone" name="telefone" placeholder="telefone do médico" >	
		</div>
		<br>
		<label for="">Data de Cadastro</label>
		<div>
			<input class="form-control" type="date" id="datacadastro" name="datacadastro" placeholder="data de cadastro" >	
		</div>
		<br>
		<label for="">Especialidades</label>
		<br>
		<select id="lista_espec" name="lista_espec[]" multiple class="form-control">
			<?php foreach ($result as $key => $value): ?>
				<option value="<?php echo $value->id_especialidades; ?>"><?php echo $value->nome_especialidades; ?></option>		
			<?php endforeach ?>
		</select>
		<br>
		<br>
		<br>	
		<input type="submit" name="medicocadastrar" value="CADASTRAR MÉDICO" class="btn btn-outline-secondary">
		<br><br>
	</form>

</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#lista_espec').multiselect({
			nonSelectedText: 'Selecione Especialidade',
			enableFiltering: true,
			enableCaseInsensitiveFiltering: true,
			buttonWidth: '300px',
		});

		$('#insert_form').on('submit', function(event){
			event.preventDefault();

			var nome = $('#nome').val();
      var crm = $('#crm').val();
      var email = $('#email').val();
      var telefone = $('#telefone').val();
      var datacadastro = $('#datacadastro').val();
      
      $.ajax({
        type: "POST",
        url: "MedicoCadastrarPost.php",
        data: {
        	nome: nome,
          crm: crm,
          email: email,
          telefone: telefone,
          datacadastro: datacadastro,        
        },
        success: function(data)
			 	{
			 		$('#insert_form')[0].reset();
			 		alert(data);
			 	}
      });
		});

		$('#insert_form').on('submit', function(event){
			
			event.preventDefault();
			var form_data = $('#insert_form').serialize();
			
			$.ajax({
				url:'MedicoEspecialidadePost.php',
				method:'POST',
				data:form_data,
				success:function(data)
				{
					$('#lista_espec option:selected').each(function(){
						$(this).prop('selected',false);
					});
					$('#lista_espec').multiselect('refresh');
					alert(data);
				}
			});
		});

		
});

</script>
