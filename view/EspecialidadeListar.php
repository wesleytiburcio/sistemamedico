<?php require_once("layout/head.php"); ?>
<?php require_once("layout/menu.php"); ?>
<?php require_once("layout/nav.php"); ?>
<?php require_once("layout/EspecialidadeMenu.php"); ?>

<?php 
require_once '../model/Especialidade.php';
$especialidade = new Especialidade();
?>

<div class="container">	

	<?php 
	if (isset($_GET['acao']) && $_GET['acao'] == 'deletar'):
		$id = (int) $_GET['id_especialidades'];
		if ($especialidade->delete($id)) {			
			echo "Deletado Especialidade com sucesso! <br><br>";			
		}
	endif;
	?>
	<hr>
	<div class="table-responsive">		 
	<table class="table table-hover">	
		<thead>
			<tr>
				<th style="display: none">Id</th>
				<th>Nome</th>
				<th colspan="2">Situação</th>
			</tr>
		</thead>

		<?php foreach ($especialidade->selectAll() as $key => $value): ?>		
		<tbody>
			<tr>
				<td style="display: none"><?php echo $value->id_especialidades; ?></td>
				<td><?php echo $value->nome_especialidades; ?></td>
				<td><?php echo $value->situacao_especialidades = ($value->situacao_especialidades == "0") ? "Inativo":"Ativo" ?> 
				</td>
				<td>
					<a href="EspecialidadeEditar.php?id_especialidades=<?php echo $value->id_especialidades; ?>" class="btn btn-outline-secondary btn-sm" >Editar</a>
					
					<a href="EspecialidadeListar.php?acao=deletar&id_especialidades=<?php echo $value->id_especialidades; ?>" class="btn btn-outline-secondary btn-sm" >Excluir</a>
				</td>
			</tr>
		</tbody>
		<?php endforeach ?>

	</table>
</div>
</div>

<?php require_once("layout/footer.php"); ?>