<?php require_once("layout/head.php"); ?>
<?php require_once("layout/menu.php"); ?>
<?php require_once("layout/nav.php"); ?>
<?php require_once("layout/PacienteMenu.php"); ?>

<?php 
require_once '../model/Paciente.php';
$paciente = new Paciente();

$dados = $paciente->selectAll();
?>

<div class="container">	

	<?php 
	if (isset($_GET['acao']) && $_GET['acao'] == 'deletar'):
		$id = (int) $_GET['id_pacientes'];
		if ($paciente->delete($id)) {			
			echo "Deletado paciente com sucesso! <br><br>";			
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
				<th>CPF</th>
				<th>Email</th>
				<th>Telefone</th>
				<th>Data Cadastro</th>
				<th>Data Aniversário</th>
				<th>Idade</th>
				<th colspan="2">Situação</th>
			</tr>
		</thead>

		<?php foreach ($dados as $key => $value): ?>		
		<tbody>
			<tr>
				
				<td style="display: none;"><?php echo $value['id_pacientes']; ?></td>
				<td><?php echo $value['nome_pacientes']; ?></td>
				<td><?php echo $value['cpf_pacientes']; ?></td>
				<td><?php echo $value['email_pacientes']; ?></td>
				<td><?php echo $value['telefone_pacientes']; ?></td>
				<td><?php echo $value['datacadastro_pacientes']; ?></td>
				<td><?php echo $value['dataaniversario_pacientes']; ?></td>
				<td><?php echo $value['idade_pacientes']; ?></td>
				<td><?php echo $value['situacao__pacientes'] = ($value['situacao_pacientes'] == "0") ? "Inativo":"Ativo" ?> 
				</td>
				<td>
					<a href="PacienteEditar.php?id_pacientes=<?php echo $value['id_pacientes']; ?>" class="btn btn-outline-secondary btn-sm" >Editar</a>
					
					<a href="PacienteListar.php?acao=deletar&id_pacientes=<?php echo $value['id_pacientes']; ?>" class="btn btn-outline-secondary btn-sm" >Excluir</a>
				</td>
			</tr>
		</tbody>
		<?php endforeach ?>

	</table>
	</div>
</div>

<?php require_once("layout/footer.php"); ?>