<?php 
require_once '../model/MedicoEspecialidade.php';
$medicoEspecialidade = new MedicoEspecialidade();

require_once('../model/Consulta.php');
$consulta = new Consulta();

if (isset($_POST['medicoNome']) && !empty($_POST['medicoNome']))
{
	$nome = $_POST['medicoNome'];
	$lista_esp = $medicoEspecialidade->pesquisarNomeMed($nome);

	foreach ($lista_esp as $value) 
	{
		echo '<option value="'.$value->nome_especialidades.'">'.$value->nome_especialidades.'</option>';		
	}

}

if (isset($_POST['pacientecons']))
{
	//echo "teste";
	$pacientecons = $_POST['pacientecons'];
  $medicocons = $_POST['medicocons'];
  $especialidade = $_POST['especialidade'];
  $dataconsulta = $_POST['dataconsulta'];
  $horaconsulta = $_POST['horaconsulta'];
  $situacao = '1';
  $observacao = $_POST['observacao'];

  $consulta->setPacientecons($pacientecons);
	$consulta->setMedicocons($medicocons);
	$consulta->setEspecialidade($especialidade);
	$consulta->setDataconsulta($dataconsulta);
	$consulta->setHoraconsulta($horaconsulta);
	$consulta->setSituacao($situacao);
	$consulta->setObservacao($observacao);

  // as propriedades(variáveis) do Consulta no model tem que ser "public" 
  // $consulta->pacientecons = $pacientecons;
  // $consulta->medicocons = $medicocons;
  // $consulta->especialidade = $especialidade;
  // $consulta->dataconsulta = $dataconsulta;
  // $consulta->horaconsulta = $horaconsulta;
  // $consulta->situacao = $situacao;
  // $consulta->observacao = $observacao;

	if ($consulta->inserir()) {
		echo "Consulta cadastrada com sucesso!"; 	
	}
	// if ($retorno['status'] == 1) {
	// 	echo "Consulta cadastrada com sucesso";
	// }
}

?>