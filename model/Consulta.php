<?php
require_once("Conexao.php");

class Consulta extends Conexao {
  private $pacientecons;
  private $medicocons;
  private $especialidade;
  private $dataconsulta;
  private $horaconsulta;
  private $situacao;
  private $observacao;


  public function getPacientecons() { return $this->pacientecons; }
  public function setPacientecons($pacientecons) { $this->pacientecons = $pacientecons; return $this; }

  public function getMedicocons() { return $this->medicocons; }
  public function setMedicocons($medicocons) { $this->medicocons = $medicocons; return $this; }

  public function getEspecialidade() { return $this->especialidade; }
  public function setEspecialidade($especialidade) { $this->especialidade = $especialidade; return $this; }

  public function getDataconsulta() { return $this->dataconsulta; }
  public function setDataconsulta($dataconsulta) { $this->dataconsulta = $dataconsulta; return $this; }

  public function getHoraconsulta() { return $this->horaconsulta; }
  public function setHoraconsulta($horaconsulta) { $this->horaconsulta = $horaconsulta; return $this; }

  public function getSituacao() { return $this->situacao; }
  public function setSituacao($situacao) { $this->situacao = $situacao; return $this; }

  public function getObservacao() { return $this->observacao; }
  public function setObservacao($observacao) { $this->observacao = $observacao; return $this; }

  public function selectAll() {
    $sql = "SELECT * FROM consultas ORDER BY paciente_consultas ASC";
    $res = Conexao::prepare($sql);
    $res->execute();
    return $res->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectUnit($id) {
    $sql = "SELECT * FROM consultas WHERE id_consultas = :id";
    $res = Conexao::prepare($sql);
    $res->bindParam(':id', $id, PDO::PARAM_INT);
    $res->execute();
    return $res->fetch();
  }

  public function inserir() {
    $sql = "INSERT INTO consultas(paciente_consultas, medico_consultas, especialidade_consultas, dataconsulta_consultas, horaconsulta_consultas, situacao_consultas, observacao_consultas) VALUES(:p, :m, :e, :dc, :hc, :s, :o)";

    $res = Conexao::prepare($sql);
    $res->bindParam(':p', $this->pacientecons);
    $res->bindParam(':m', $this->medicocons);
    $res->bindParam(':e', $this->especialidade);
    $res->bindParam(':dc', $this->dataconsulta);
    $res->bindParam(':hc', $this->horaconsulta);
    $res->bindParam(':s', $this->situacao);
    $res->bindParam(':o', $this->observacao);

    $res->execute();
    return $res;
    //return ['status' => '1'];
  }

  public function update($id, $pacientecons, $medicocons, $dataconsulta, $horaconsulta, $situacao, $observacao) {
    $sql  = "UPDATE consultas SET paciente_consultas = :p, medico_consultas = :m, especialidade_consultas = :e, dataconsulta_consultas = :dc, horaconsulta_consultas = :hc , situacao_consultas = :s, observacao_consultas = :o WHERE id_consultas = :id";
    
    $res = Conexao::prepare($sql);
    $res->bindParam(':id', $id, PDO::PARAM_INT);
    $res->bindParam(':p', $this->pacientecons);
    $res->bindParam(':m', $this->medicocons);
    $res->bindParam(':e', $this->especialidade);
    $res->bindParam(':dc', $this->dataconsulta);
    $res->bindParam(':hc', $this->horaconsulta);
    $res->bindParam(':s', $this->situacao);
    $res->bindParam(':o', $this->observacao);   
    
    $res->execute();
    return $res;
  }

  public function delete($id) {
    $sql = "DELETE FROM consultas WHERE id_consultas = :id";
    $res = Conexao::prepare($sql);
    $res->bindParam(':id', $id, PDO::PARAM_INT);
    $res->execute();
    return $res;
  }

  // public function pesquisar($nome, $cpf) {
  //   $sql = "SELECT * FROM pacientes WHERE nome_pacientes LIKE '%$nome%' AND cpf_pacientes LIKE '%$cpf%' ";    
  //   $res = Conexao::prepare($sql);

  //   $res->bindParam(':n', $nome, PDO::PARAM_STR);
  //   $res->bindParam(':c', $cpf, PDO::PARAM_STR);   

  //   $res->execute();
  //   return $res->fetchAll();
  // } 

   public function pesquisarNome($nome) {
    $sql = "SELECT * FROM consultas WHERE paciente_consultas = :p";    
    $res = Conexao::prepare($sql);

    $res->bindParam(':p', $nome, PDO::PARAM_STR);
    $res->execute();
    return $res->fetchAll();
  }  
}

?>