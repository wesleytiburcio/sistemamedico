<?php require_once("layout/head.php"); ?>
<?php require_once("layout/menu.php"); ?>
<?php require_once("layout/nav.php"); ?>
<?php require_once("layout/EspecialidadeMenu.php"); ?>

<?php
require_once '../model/Medico.php';
require_once '../model/Especialidade.php';
require_once '../model/MedicoEspecialidade.php';
$medicoespecialidade = new MedicoEspecialidade();
$especialidade = new Especialidade();
?>

<div class="container">
	

	<hr>
	<form action="" method="post" style="width:300px;">
		<div>
			<input class="form-control" type="text" name="pesqnome" placeholder="Nome Especialidade">
		</div>
		<br>

		<input type="submit" value="Pesquisar Especialidade"  class="btn btn-outline-secondary" name="especialidadepesquisar">
		
		<a href="EspecialidadePesquisar.php"  class="btn btn-outline-secondary">Limpar</a>
		<br>	
	</form>


	<?php
	if (isset($_POST['especialidadepesquisar'])):
		
	$pesqnome = $_POST['pesqnome'];	
	//$especialidade->setNome($nome);

	$dado = $especialidade->pesquisar($pesqnome);
	?>
	<hr>
	<div class="table-responsive">
	<table class="table table-hover">	
		<thead class="thead light">
			<tr>
				<th style="display: none">Id</th>
				<th>Nome</th>
				<th>Situação<th>
				<th colspan="2">Médico</th>
			</tr>
		</thead>

		<?php foreach ($dado as $key => $value): ?>		
		<tbody>
			<tr>
				<td style="display: none"><?php echo $value->id; ?></td>
				<td><?php echo $value->nome_especialidades; ?></td>
				<td><?php echo $value->situacao_especialidades = ($value->situacao_especialidades == "0") ? "Inativo":"Ativo" ?> 
				</td>
				<td>
					<?php foreach ($medicoespecialidade->pesquisarNomeEsp($value->nome_especialidades) as $k => $v): ?>
						<td style="display: none;"><?php echo $v->id_med; ?></td>
						<td ><?php echo $v->nome_medicos; ?></td>										
					<?php endforeach ?>
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
	
	<?php 
	endif;
	?>
</div>
<?php require_once("layout/footer.php"); ?>