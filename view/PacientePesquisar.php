<?php require_once("layout/head.php"); ?>
<?php require_once("layout/menu.php"); ?>
<?php require_once("layout/nav.php"); ?>
<?php require_once("layout/PacienteMenu.php"); ?>

<?php 
require_once '../model/Paciente.php';
$paciente = new Paciente();
?>

<div class="container">
	<hr>
	<form action="" method="post" style="width: 300px;">
		<div>
			<input class="form-control" type="text" name="nome_pacientes" placeholder="Nome do paciente">
			<br>
			<input class="form-control" type="text" name="cpf_pacientes" placeholder="cpf do paciente">
		</div>
		<br>
		<div>
			<input type="submit" value="Pesquisar Paciente" class="btn btn-outline-secondary" name="pacientepesquisar">
			<a href="PacientePesquisar.php" class="btn btn-outline-secondary">Limpar</a>
		</div>		
	</form>


	<?php
	if (isset($_POST['pacientepesquisar'])):
		$cpf = $_POST['cpf_pacientes'];
		$nome = $_POST['nome_pacientes'];	

		$dado = $paciente->pesquisar($nome, $cpf);	
	?>

	<div class="table-responsive">

		<table class="table table-hover">	
		<thead>
			<tr>
				<th style="display: none;">Id</th>
				<th>Nome</th>
				<th>CPF</th>
				<th>E-mail</th>
				<th>Telefone</th>
				<th>Data de Cadastro</th>
				<th>Data de Aniversário</th>
				<th>Idade</th>
				<th colspan="2">Situação</th>
			</tr>
		</thead>
		<?php foreach ($dado as $key => $value): ?>		
		<tbody>
			<tr>
				<td style="display: none;"><?php echo $value->id_pacientes; ?></td>
				<td><?php echo $value->nome_pacientes; ?></td>
				<td><?php echo $value->cpf_pacientes; ?></td>
				<td><?php echo $value->email_pacientes; ?></td>
				<td><?php echo $value->telefone_pacientes; ?></td>
				<td><?php echo $value->datacadastro_pacientes; ?></td>
				<td><?php echo $value->dataaniversario_pacientes; ?></td>
				<td><?php echo $value->idade_pacientes; ?></td>
				<td><?php echo $value->situacao_pacientes = ($value->situacao_pacientes == "0") ? "Inativo":"Ativo" ?> </td>

				<td>
					<a href="PacienteEditar.php?id_pacientes=<?php echo $value->id_pacientes; ?>" class="btn btn-outline-secondary btn-sm" >Editar</a>
					
					<a href="PacienteListar.php?acao=deletar&id_pacientes=<?php echo $value->id_pacientes; ?>" class="btn btn-outline-secondary btn-sm" >Excluir</a>
				</td>
			</tr>
		</tbody>
		<?php endforeach ?>
	</table>
	</div>
	
	<?php 
	endif;
	?>
</div>
<?php require_once("layout/footer.php"); ?>
