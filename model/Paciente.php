<?php
require_once("Conexao.php");

class Paciente extends Conexao {

  private $nome;
  private $cpf;
  private $email;
  private $telefone;
  private $datacadastro;
  private $dataaniversario;
  private $idade;
  private $situacao;

  public function getNome() { return $this->nome; }
  public function setNome($nome) { $this->nome = $nome; return $this; }
  public function getCpf() { return $this->cpf; }

  public function setCpf($cpf) { $this->cpf = $cpf; return $this; }

  public function getEmail() { return $this->email; }
  public function setEmail($email) { $this->email = $email; return $this; }

  public function getTelefone() { return $this->telefone; }
  public function setTelefone($telefone) { $this->telefone = $telefone; return $this; }

  public function getDatacadastro() { return $this->datacadastro; }
  public function setDatacadastro($datacadastro) { $this->datacadastro = $datacadastro; return $this; }

  public function getDataaniversario() { return $this->dataaniversario; }
  public function setDataaniversario($dataaniversario) { $this->dataaniversario = $dataaniversario; return $this; }

  public function getIdade() { return $this->idade; }
  public function setIdade($idade) { $this->idade = $idade; return $this; }

  public function getSituacao() { return $this->situacao; }
  public function setSituacao($situacao) { $this->situacao = $situacao; return $this; }

  public function selectAll() {
    $sql = "SELECT * FROM pacientes ORDER BY nome_pacientes ASC";
    $res = Conexao::prepare($sql);
    $res->execute();
    return $res->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectUnit($id) {
    $sql = "SELECT * FROM pacientes WHERE id_pacientes = :id";
    $res = Conexao::prepare($sql);
    $res->bindParam(':id', $id, PDO::PARAM_INT);
    $res->execute();
    return $res->fetch();
  }

  public function inserir() {
    $sql = "INSERT INTO pacientes(nome_pacientes, cpf_pacientes, email_pacientes, telefone_pacientes, datacadastro_pacientes, dataaniversario_pacientes, idade_pacientes, situacao_pacientes) VALUES(:n, :c, :e, :t, :dc, :da, :i, :s)";

    $res = Conexao::prepare($sql);

    $res->bindParam(':n', $this->nome);
    $res->bindParam(':c', $this->cpf);
    $res->bindParam(':e', $this->email);
    $res->bindParam(':t', $this->telefone);
    $res->bindParam(':dc', $this->datacadastro);
    $res->bindParam(':da', $this->dataaniversario);
    $res->bindParam(':i', $this->idade);
    $res->bindParam(':s', $this->situacao);
   
    $res->execute();
    return $res;
  }

  public function update($id, $nome, $cpf, $email, $telefone, $datacadastro, $dataaniversario, $idade, $situacao) {
    $sql  = "UPDATE pacientes SET nome_pacientes = :n, cpf_pacientes = :c, email_pacientes = :e, telefone_pacientes = :t, datacadastro_pacientes = :dc, dataaniversario_pacientes = :da, idade_pacientes = :i, situacao_pacientes = :s WHERE id_pacientes = :id";
    $res = Conexao::prepare($sql);
    
    $res->bindParam(':id', $id, PDO::PARAM_INT);
    $res->bindParam(':n', $this->nome);
    $res->bindParam(':c', $this->cpf);
    $res->bindParam(':e', $this->email);
    $res->bindParam(':t', $this->telefone);
    $res->bindParam(':dc', $this->datacadastro);
    $res->bindParam(':da', $this->dataaniversario);
    $res->bindParam(':i', $this->idade);
    $res->bindParam(':s', $this->situacao);    
    
    $res->execute();
    return $res;
  }

  public function delete($id) {
    $sql = "DELETE FROM pacientes WHERE id_pacientes = :id";
    $res = Conexao::prepare($sql);
    $res->bindParam(':id', $id, PDO::PARAM_INT);
    $res->execute();
    return $res;
  }

  public function pesquisar($nome, $cpf) {
    $sql = "SELECT * FROM pacientes WHERE nome_pacientes LIKE '%$nome%' AND cpf_pacientes LIKE '%$cpf%' ";    
    $res = Conexao::prepare($sql);

    $res->bindParam(':n', $nome, PDO::PARAM_STR);
    $res->bindParam(':c', $cpf, PDO::PARAM_STR);   

    $res->execute();
    return $res->fetchAll();
  } 

   public function pesquisarNome($nome) {
    $sql = "SELECT * FROM pacientes WHERE nome_pacientes = :n";    
    $res = Conexao::prepare($sql);

    $res->bindParam(':n', $nome, PDO::PARAM_STR);
    $res->execute();
    return $res->fetchAll();
  }    
}

?>