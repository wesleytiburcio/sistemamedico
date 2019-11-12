<?php
require_once("Conexao.php");
//require_once("Especialidade.php");

class Medico extends Conexao {

	private $nome;
	private $crm;
	private $email;
	private $telefone;
	private $datacadastro;
	private $situacao = 1;

  public function getNome() { return $this->nome; }
  public function setNome($nome) { $this->nome = $nome; return $this; }

  public function getCrm() { return $this->crm; }
  public function setCrm($crm) { $this->crm = $crm; return $this; }

  public function getEmail() { return $this->email; }
  public function setEmail($email) { $this->email = $email; return $this; }

  public function getTelefone() { return $this->telefone; }
  public function setTelefone($telefone) { $this->telefone = $telefone; return $this; }

  public function getDatacadastro() { return $this->datacadastro; }
  public function setDatacadastro($datacadastro) { $this->datacadastro = $datacadastro; return $this; }

  public function getSituacao() { return $this->situacao; }
  public function setSituacao($situacao) { $this->situacao = $situacao; return $this; }


  public function selectAll() {
  	$sql = "SELECT * FROM medicos ORDER BY nome_medicos";
  	$res = Conexao::prepare($sql);
  	$res->execute();
  	return $res->fetchAll();
  }

  public function selectUnit($id) {
  	$sql = "SELECT * FROM medicos WHERE id_medicos = :id";
  	$res = Conexao::prepare($sql);
  	$res->bindParam(':id', $id, PDO::PARAM_INT);
  	$res->execute();
  	return $res->fetch();
  }

  public function inserir() {
  	$sql = "INSERT INTO medicos(nome_medicos, crm_medicos, email_medicos, telefone_medicos, datacadastro_medicos, situacao_medicos) VALUES(:n, :c, :e, :t, :d, :s)";
  	$res = Conexao::prepare($sql);

  	$res->bindParam(':n', $this->nome);
  	$res->bindParam(':c', $this->crm);
  	$res->bindParam(':e', $this->email);
  	$res->bindParam(':t', $this->telefone);
  	$res->bindParam(':d', $this->datacadastro);
  	$res->bindParam(':s', $this->situacao);

  	$res->execute();
  	return $res;
  }

  public function update($id, $nome, $crm, $email, $telefone, $datacadastro, $situacao) {
    $sql  = "UPDATE medicos SET nome_medicos = :n, crm_medicos = :c, email_medicos = :e, telefone_medicos = :t, datacadastro_medicos = :d, situacao_medicos = :s WHERE id_medicos = :id";
    
    $res = Conexao::prepare($sql);
    
    $res->bindParam(':id', $id, PDO::PARAM_INT);
    $res->bindParam(':n', $this->nome);
  	$res->bindParam(':c', $this->crm);
  	$res->bindParam(':e', $this->email);
  	$res->bindParam(':t', $this->telefone);
  	$res->bindParam(':d', $this->datacadastro);
  	$res->bindParam(':s', $this->situacao);    
    
    $res->execute();
    return $res;
  }

  public function delete($id) {
    $sql = "DELETE FROM medicos WHERE id_medicos = :id";
    $res = Conexao::prepare($sql);
    $res->bindParam(':id', $id, PDO::PARAM_INT);
    $res->execute();
    return $res;
  }

  public function pesquisar($nome, $crm) {
    $sql = "SELECT * FROM medicos WHERE nome_medicos LIKE '%$nome%' AND crm_medicos LIKE '%$crm%' ";    
    $res = Conexao::prepare($sql);

    $res->bindParam(':n', $nome, PDO::PARAM_STR);
    $res->bindParam(':c', $crm, PDO::PARAM_STR);   

    $res->execute();
    return $res->fetchAll();
  } 

   public function pesquisarNome($nome) {
    $sql = "SELECT * FROM medicos WHERE nome_medicos = :n";    
    $res = Conexao::prepare($sql);

    $res->bindParam(':n', $nome, PDO::PARAM_STR);
    $res->execute();
    return $res->fetchAll();
  }

  public function inserirME($id, $especialidade1) {
    $sql = "INSERT INTO medicos_especialidades(id_med, id_esp) VALUES(:idmed, :idesp)";
    $res = Conexao::prepare($sql);

    $res->bindParam(':idmed', $id, PDO::PARAM_INT);
    $res->bindParam(':idesp', $especialidade1, PDO::PARAM_INT);

    $res->execute();
    return $res;
  }

}

?>