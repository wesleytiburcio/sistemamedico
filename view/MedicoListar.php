<?php require_once("layout/head.php"); ?>
<?php require_once("layout/menu.php"); ?>
<?php require_once("layout/nav.php"); ?>
<?php require_once("layout/MedicoMenu.php"); ?>

<?php 
include_once '../model/Medico.php';
$medico = new Medico();
?>

<div class="container">
	<?php 
		if (isset($_GET['acao']) && $_GET['acao'] == 'deletar'):
			$id = (int) $_GET['id_medicos'];
			if ($medico->delete($id)) {
				echo "Deletado médico com sucesso! <br><br>";
			}
		endif;
	?>
	<hr>
	<div class="table-responsive">
	<table class="table table-hover">	
		<thead>
			<tr>
			
				<th style="display: none;">Id</th>
				<th>Nome</th>
				<th>CRM</th>
				<th>E-mail</th>
				<th>Telefone</th>
				<th>Data de Cadastro</th>
				<th colspan="2">Situação</th>
			</tr>
		</thead>

		<?php foreach ($medico->selectAll() as $key => $value): ?>		
		<tbody>
			<tr>
				<td style="display: none;"><?php echo $value->id_medicos; ?></td>
				<td><?php echo $value->nome_medicos; ?></td>
				<td><?php echo $value->crm_medicos; ?></td>
				<td><?php echo $value->email_medicos; ?></td>
				<td><?php echo $value->telefone_medicos; ?></td>
				<td><?php echo $value->datacadastro_medicos; ?></td>
				<td><?php echo $value->situacao_medicos = ($value->situacao_medicos == "0") ? "Inativo":"Ativo" ?> </td>
				<td>
					<a href="MedicoEditar.php?id_medicos=<?php echo $value->id_medicos; ?>" class="btn btn-outline-secondary btn-sm" >Editar</a>
					
					<a href="MedicoListar.php?acao=deletar&id_medicos=<?php echo $value->id_medicos; ?>" class="btn btn-outline-secondary btn-sm" >Excluir</a>
				</td>
			</tr>
		</tbody>
		<?php endforeach ?>

	</table>
	</div>
</div>

<?php require_once("layout/footer.php"); ?>