<?php require_once("layout/head.php"); ?>
<?php require_once("layout/menu.php"); ?>
<?php require_once("layout/nav.php"); ?>
<?php require_once("layout/ListaMEMenu.php"); ?>
<?php
require_once("../model/MedicoEspecialidade.php");
$medicoespecialidade = new MedicoEspecialidade();
require_once("../model/Medico.php");
$medico = new Medico();
?>

<div class="container">
	<?php 
		if (isset($_GET['acao']) && $_GET['acao'] == 'deletar'):
			$id = (int) $_GET['id_medesp'];
			if ($medicoespecialidade->delete($id)) {
				echo "Deletado com sucesso! <br><br>";
			}
		endif;
	?>

	<hr>
	<div class="table-responsive">
	<table class="table table-hover">	
		<thead class="thead light">
			<tr>
				<th class="hidden">ID Med</th>			
				<th>Médico</th>
				<th class="hidden">ID MedEsp</th>
				<th colspan="2">Especialidade</th>
			</tr>
		</thead>
		
	 	<?php foreach ($medico->selectAll() as $key => $value): ?>
		<tbody>
			<tr>
				<td class="hidden"><?php echo $value->id_medicos; ?></td>				
				<td><?php echo $value->nome_medicos; ?></td>
				<td>
					<?php foreach ($medicoespecialidade->pesquisarNomeMed($value->nome_medicos) as $k => $v): ?>
						<td class="hidden"><?php echo $v->id_medesp; ?></td>
						<td><?php echo $v->nome_especialidades; ?></td>											
					<?php endforeach ?>
				</td>
				<td>
					<a href="ListaMEEditar.php?id_medicos=<?php echo $value->id_medicos; ?>" class="btn btn-outline-secondary btn-sm">Editar</a>					
					<a href="ListarME.php?acao=deletar&id_medicos=<?php echo $value->id_medicos; ?>" class="btn btn-outline-secondary btn-sm">Excluir</a>
				</td>

			</tr>
		</tbody>
		<?php endforeach ?> 

	</table>
</div>
	
</div>

<?php require_once("layout/footer.php"); ?>
