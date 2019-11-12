<?php


class inserirConsultaController
{

    public function inseri()
    {

        if (isset($_POST['consultacadastrar'])) {

            $pacientecons = $_POST['pacienteconsulta'];
            $medicocons = $_POST['medicoconsulta'];
            $especialidade = $_POST['especialidadeconsulta'];
            $dataconsult = $_POST['dataconsulta'];
            $dataconsulta = implode('-', array_reverse(explode('/', $dataconsult)));
            $horaconsulta = $_POST['horaconsulta'];
            $observacao = $_POST['observacaoconsulta'];
            $situacao = '1';

            // echo "*****<br>";
            // echo $pacientecons."<br>";
            // echo $medicocons."<br>";
            // echo $especialidade."<br>";
            // echo $dataconsult."<br>";
            // echo $dataconsulta."<br>";
            // echo $horaconsulta."<br>";
            // echo "*****<br>";

            $listaconsulta = $consulta->selectAll();
            foreach ($listaconsulta as $value) {
                $pacient = $value['paciente_consultas'];
                $medic = $value['medico_consultas'];
                $especialidad = $value['especialidade_consultas'];
                $horaconsult = $value['horaconsulta_consultas'];
                $dataconsult = $value['dataconsulta_consultas'];

                if ((($medic == $medicocons) || ($pacient == $pacientecons)) && ($especialidad == $especialidade) && ($horaconsult == $horaconsulta) && ($dataconsult == $dataconsulta)) {
                    echo "Consulta não pode ser cadastrada. !!<br>";
                    //header('Location:ConsultaCadastrar.php');
                    exit();
                }
            }

            $consulta->setPacientecons($pacientecons);
            $consulta->setMedicocons($medicocons);
            $consulta->setEspecialidade($especialidade);
            $consulta->setDataconsulta($dataconsulta);
            $consulta->setHoraconsulta($horaconsulta);
            $consulta->setSituacao($situacao);
            $consulta->setObservacao($observacao);
// echo "======<br>";
// echo $pacientecons."<br>";
// echo $medicocons."<br>";
// echo $especialidade."<br>";
// echo $dataconsult."<br>";
// echo $dataconsulta."<br>";
// echo $horaconsulta."<br>";
// echo "======<br>";

            if ($consulta->inserir()) {
                echo "Cadastrado consulta com sucesso!";
            }
        }
    }

}