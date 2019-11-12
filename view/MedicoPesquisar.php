<?php require_once("layout/head.php"); ?>
<?php require_once("layout/menu.php"); ?>
<?php require_once("layout/nav.php"); ?>
<?php require_once("layout/MedicoMenu.php"); ?>

<?php 
require_once '../model/Medico.php';
require_once '../model/MedicoEspecialidade.php';
$medico = new Medico();
$medicoespecialidade = new MedicoEspecialidade();

?>
<div class="container">

	<hr>
	<form action="" method="post" style="width: 300px;">
		<div >
			<input class="form-control" type="text" name="nome_medicos" placeholder="Nome do médico">
			<br>
			<input class="form-control" type="text" name="crm_medicos" placeholder="crm do médico">
		</div>
		<br>
		<div>
			<input type="submit" value="Pesquisar Médico" class="btn btn-outline-secondary" name="medicopesquisar">
			<a href="MedicoPesquisar.php" class="btn btn-outline-secondary">Limpar</a>
		</div>		
	</form>


	<?php
	if (isset($_POST['medicopesquisar'])):
		$crm = $_POST['crm_medicos'];
		$nome = $_POST['nome_medicos'];	

		$dado = $medico->pesquisar($nome, $crm);	
	?>

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
				<th>Situação</th>
				<th colspan="5">Especialidades</th>
							
			</tr>
		</thead>
		<?php foreach ($dado as $key => $value): ?>		
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
					<?php foreach ($medicoespecialidade->pesquisarNomeMed($value->nome_medicos) as $k => $v): ?>
						<td style="display: none;"><?php echo $v->id_esp; ?></td>
						<td ><?php echo $v->nome_especialidades; ?></td>
											
					<?php endforeach ?>
				</td>

				<td>
					<a href="MedicoEditar.php?id_medicos=<?php echo $value->id_medicos; ?>" class="btn btn-outline-secondary btn-sm" >Editar</a>
					
					<a href="MedicoListar.php?acao=deletar&id_medicos=<?php echo $value->id_medicos; ?>" class="btn btn-outline-secondary btn-sm" >Excluir</a>
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
