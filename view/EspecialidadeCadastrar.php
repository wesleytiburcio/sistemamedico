<?php require_once("layout/head.php"); ?>
<?php require_once("layout/menu.php"); ?>
<?php require_once("layout/nav.php"); ?>
<?php require_once("layout/EspecialidadeMenu.php"); ?>

<?php 
require_once("../model/Especialidade.php");
require_once("../model/Funcoes.php");
$especialidade = new Especialidade();
$funcoes = new Funcoes();

?>

<div class="container">
	
	<hr>
	
	<form action="" method="POST"   style="width:300px;" >
		<div>
			<input type="text" id="nome" name="nome" placeholder="Nome Especialidade" class="form-control" required>
		</div>
		
		<br>
		<input type="submit" name="especialidadecadastrar" value="Cadastrar Especialidade" class="btn btn-outline-secondary">	
	</form>

	<?php 
	if (isset($_POST['especialidadecadastrar'])) {
		$nome = $funcoes->tirarAcentos($_POST['nome']);
		$nome = mb_strtoupper($nome);
		$situacao = '1';
		
		$especialidade->setNome($nome);
		$especialidade->setSituacao($situacao);;
		
		if ($especialidade->inserir()) {
			echo "Cadastrado especialidade com sucesso!";
		}
	}

	?>
	
</div>
<?php require_once("layout/footer.php"); ?>
