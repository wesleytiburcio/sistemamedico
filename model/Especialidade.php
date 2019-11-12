<?php 
require_once("Conexao.php");

class Especialidade extends Conexao {

	private $nome;
	private $situacao;

  public function getNome() { return $this->nome; }
  public function setNome($nome) { $this->nome = $nome; return $this; }

  public function getSituacao() { return $this->situacao; }
  public function setSituacao($situacao) { $this->situacao = $situacao; return $this; }

   public function selectAll() {
  	$sql = "SELECT * FROM especialidades ORDER BY nome_especialidades ASC";
  	$res = Conexao::prepare($sql);
  	$res->execute();
  	$result = $res->fetchAll();
    return $result;
  }

  public function selectUnit($id) {
  	$sql = "SELECT * FROM especialidades WHERE id_especialidades = :id";
  	$res = Conexao::prepare($sql);
  	$res->bindParam(':id', $id, PDO::PARAM_INT);
  	$res->execute();
  	return $res->fetch();
  }

  public function inserir() {
  	$sql = "INSERT INTO especialidades(nome_especialidades, situacao_especialidades) VALUES(:n, :s)";
  	$res = Conexao::prepare($sql);

  	$res->bindParam(':n', $this->nome);
  	$res->bindParam(':s', $this->situacao);

  	$res->execute();
  	return $res;
  }

  public function update($id, $nome, $situacao) {
    $sql  = "UPDATE especialidades SET nome_especialidades = :n, situacao_especialidades = :s WHERE id_especialidades = :id";
    $res = Conexao::prepare($sql);
    
    $res->bindParam(':id', $id, PDO::PARAM_INT);
    $res->bindParam(':n', $this->nome);
    $res->bindParam(':s', $this->situacao);    
    
    $res->execute();
    return $res;
  }

  public function delete($id) {
    $sql = "DELETE FROM especialidades WHERE id_especialidades = :id";
    $res = Conexao::prepare($sql);
    $res->bindParam(':id', $id, PDO::PARAM_INT);
    $res->execute();
    return $res;
  }

  public function pesquisar($pesqnome) {
    $pqe = $pesqnome;
    $sql = "SELECT * FROM especialidades WHERE nome_especialidades LIKE '%$pqe%' ORDER BY nome_especialidades ASC";
    $res = Conexao::prepare($sql);
    //$res->bindParam(':n', $this->nome);
    $res->execute();
    return $res->fetchAll();
  } 

  public function inserirME($especialidade1) {
    $sql = "INSERT INTO medicos_especialidades(id_esp) VALUES(:idmed, :idesp)";
    $res = Conexao::prepare($sql);

    $res->bindParam(':idmed', $id, PDO::PARAM_INT);
    $res->bindParam(':idesp', $especialidade1, PDO::PARAM_INT);

    $res->execute();
    return $res;
  }

}
?>