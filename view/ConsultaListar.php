<?php require_once("layout/head.php"); ?>
<?php require_once("layout/menu.php"); ?>
<?php require_once("layout/nav.php"); ?>
<?php include_once 'layout/ConsultaMenu.php'; ?>

<?php 
include_once '../model/Consulta.php';
$consulta = new Consulta();

?>

<div class="container">
	<?php 
		if (isset($_GET['acao']) && $_GET['acao'] == 'deletar'):
			$id = (int) $_GET['id_consultas'];
			if ($consulta->delete($id)) {
				echo "Deletado consulta com sucesso! <br><br>";
			}
		endif;
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

		<?php foreach ($consulta->selectAll() as $key => $value): ?>		
		<tbody>
			<tr>
				<td style="display: none;"><?php echo $value['id_consultas']; ?></td>
				<td><?php echo $value['paciente_consultas']; ?></td>
				<td><?php echo $value['medico_consultas']; ?></td>
				<td><?php echo $value['especialidade_consultas']; ?></td>
				<td><?php echo $value['dataconsulta_consultas']; ?></td>
				<td><?php echo $value['horaconsulta_consultas']; ?></td>
				<td><?php echo $value['situacao_consultas'] = ($value['situacao_consultas'] == "0") ? "Inativo":"Ativo" ?> </td>
				<td><?php echo $value['observacao_consultas']; ?></td>
				<td>
					<a href="ConsultaEditar.php?id_consultas=<?php echo $value['id_consultas']; ?>" class="btn btn-outline-secondary btn-sm" >Editar</a>
					
					<a href="ConsultaListar.php?acao=deletar&id_consultas=<?php echo $value['id_consultas']; ?>" class="btn btn-outline-secondary btn-sm" >Excluir</a>
				</td>
			</tr>
		</tbody>
		<?php endforeach ?>

	</table>
	</div>
</div>

<?php require_once("layout/footer.php"); ?>