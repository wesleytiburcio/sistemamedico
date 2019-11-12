<?php
require_once("../model/Medico.php");
$medico = new Medico();

try {
    $nome = $_POST['nome'];
    $crm = $_POST['crm'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $datacadastro = $_POST['datacadastro'];

    $medico->setNome($nome);
    $medico->setCrm($crm);
    $medico->setEmail($email);
    $medico->setTelefone($telefone);
    $medico->setDatacadastro($datacadastro);
   
    $retorno = $medico->inserir();
    if ($retorno) {
        echo "Cadastrado Médico com sucesso!";
    }

} catch (Exception $e) {
    Erro::trataErro($e);
}

?>