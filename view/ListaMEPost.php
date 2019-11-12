<?php
require_once '../model/Medico.php';
$medico = new Medico();
require_once("../model/MedicoEspecialidade.php");
$medicoespecialidade = new MedicoEspecialidade();

	$idmed = $_POST['idmedico'];
	//$nome = $_POST['nomemedico'];
	$dado = $medicoespecialidade->selectUnit($idmed);
	$cont = count($dado);
	//echo $cont;
	
	$lista_espec1 = -1;

		foreach ($dado as $value) 
		{
		 	$idmedesp = $value->id_medesp;		 	
		 	$idmedico = $value->id_medicos;
		 	$idespecialidade = $value->id_especialidades;

			if (isset($_POST['lista_espec'])) 
			{
				foreach ($_POST["lista_espec"] as $row) {
					$lista_espec = $row;
					
					if ($lista_espec != $lista_espec1) 
					{						
						$idespecialidade = $lista_espec;
						$retorno = $medicoespecialidade->update($idmedesp, $idespecialidade, $idmedico);
						
				 		$lista_espec1 = $lista_espec;
						break;
				 	} 
				 	if ($lista_espec == $lista_espec1) 
				 	{	 				 		
				 		continue;	
				 	}
				}			  
			} 

			echo " - ";
				echo $idmedesp;
				echo " - ";
				echo $idmedico;
				echo " - ";
				echo $idespecialidade;

		}
?>