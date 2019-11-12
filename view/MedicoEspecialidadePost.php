<?php
require_once '../model/MedicoEspecialidade.php';
$medicoespecialidade = new MedicoEspecialidade();

require_once '../model/Medico.php';
$medico = new Medico();

$nome = $_POST['nome'];
$dados = $medico->pesquisarNome($nome);

foreach ($dados as $key => $value) {
	$id_dados = $value->id_medicos;
}

$id_dados = intval($id_dados); 

if (isset($_POST['lista_espec'])) 
{
	$lista_espec = '';

	foreach ($_POST["lista_espec"] as $row) {
		$lista_espec += intval($row);

		//$query = "INSERT INTO medicosespecialidades(id_med, id_esp) VALUES(:id_dados , :lista_espec)";

    //$retorno = $medicoespecialidade->inserir($id_dados, $lista_espec);
		//$statement = $connect->prepare($query);
		
		// $statement->execute(
		// 	array(
		// 		':id_dados' => $id_dados,
		// 		':lista_espec' => $lista_espec,
		// 	)
		// );
	}
	$retorno = $medicoespecialidade->inserir($id_dados, $lista_espec);
	//$lista_espec = substr($lista_espec, 0, -2);

	//$result = $statement->fetchAll();
	
  if ($retorno['status'] == 1) {
		echo "Medico/Especialidade inserido com sucesso";
	}
	
}

?>