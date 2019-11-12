<?php require_once("layout/head.php"); ?>
<?php require_once("layout/menu.php"); ?>
<?php require_once("layout/nav.php"); ?>
<?php include_once 'layout/ConsultaMenu.php'; ?>

<?php 
require_once '../model/Consulta.php';
$consulta = new Consulta();
require_once '../model/Paciente.php';
$paciente = new Paciente();
require_once("../model/Funcoes.php");
$funcoes = new Funcoes();

?>

<div class="container">

	<hr>
	<form action="" method="post" style="width:300px;">
		<div>
			<input type="text" name="nome_pacientes" placeholder="nome do paciente" class="form-control">
		<br>
			<input type="text" name="cpf_pacientes" placeholder="cpf do paciente" class="form-control">
		</div>
		<br>
		<div>
			<input type="submit" value="Pesquisar Consulta" class="btn btn-outline-secondary" name="consultapesquisar">
			<a href="ConsultaPesquisar.php" class="btn btn-outline-secondary">Limpar</a>
		</div>
		<br>
		
	</form>


	<?php
	if (isset($_POST['consultapesquisar'])):		
		$nome = $_POST['nome_pacientes'];
		$cpf = $_POST['cpf_pacientes'];
		$dados_pacientes = $paciente->pesquisar($nome, $cpf);
		$dados_consultas = $consulta->selectAll();
		$nome_paciente_consultas = array_column($dados_consultas, 'paciente_consultas');
		?>
		<hr>
		<div class="table-responsive">
		<table class="table table-hover" >	
		<thead>
			<tr>			
				<th style="display: none;">Id</th>				
				<th>Paciente</th>
				<th>Médico</th>
				<th>Especialidade</th>
				<th>Data Consulta</th>
				<th>Hora Consulta</th>
				<th>Situação</th>
				<th colspan="2">Observação</th>
			</tr>
		</thead>
		<tbody>

			<?php foreach ($dados_pacientes as $key => $value): ?>

				<?php $value->nome_pacientes; $res = $value->nome_pacientes; ?>

				<?php $dados = $consulta->pesquisarNome($res); ?>
				<?php foreach ($dados as $key => $value): ?>

			
				<tr>
					<td style="display: none;"><?php echo $value->id_consultas; ?></td>
					<td><?php echo $value->paciente_consultas; ?></td>
					<td><?php echo $value->medico_consultas; ?></td>
					<td><?php echo $value->especialidade_consultas; ?></td>
					<td><?php echo $value->dataconsulta_consultas; ?></td>
					<td><?php echo $value->horaconsulta_consultas; ?></td>
					<td><?php echo $value->situacao_consultas = ($value->situacao_consultas == "0") ? "Inativo":"Ativo" ?> </td>
					<td><?php echo $value->observacao_consultas; ?></td>
					<td>
						<a href="ConsultaEditar.php?id_consultas=<?php echo $value->id_consultas; ?>" class="btn btn-outline-secondary btn-sm" >Editar</a>
						
						<a href="ConsultaListar.php?acao=deletar&id_consultas=<?php echo $value->id_consultas; ?>" class="btn btn-outline-secondary btn-sm" >Excluir</a>
					</td>
				</tr>
				
				<?php endforeach ?>

			<?php endforeach ?>
			</tbody>
		</table>
		
  	</div>

	<?php endif; ?>
</div>
<?php require_once("layout/footer.php"); ?>
