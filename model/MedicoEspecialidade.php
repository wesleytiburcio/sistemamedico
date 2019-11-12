<?php
require_once("Conexao.php");

Class MedicoEspecialidade extends Conexao
{
    private $id_med;
    private $id_esp;
   
    public function getIdMed()
    {
        return $this->id_med;
    }

    public function setIdMed($id_med)
    {
        $this->id_med = $id_med;
        return $this;
    }

    public function getIdEsp()
    {
        return $this->id_esp;
    }

    public function setIdEsp($id_esp)
    {
        $this->id_esp = $id_esp;
        return $this;
    }

    
    public function selectAll()
    {
        $sql = "SELECT me.id_medesp, m.nome_medicos, e.nome_especialidades 
        FROM medicos as m INNER JOIN medicosespecialidades as me ON m.id_medicos = me.id_med INNER JOIN especialidades as e ON me.id_esp = e.id_especialidades ORDER BY m.nome_medicos ";

        $res = Conexao::prepare($sql);
        //$res->bindParam(':n', $nome, PDO::PARAM_STR);
        $res->execute();
        return $res->fetchAll();
    }

    public function selectEspAll()
    {
        $sql = "SELECT me.id_medesp, e.nome_especialidades, m.nome_medicos
        FROM especialidades as e INNER JOIN medicosespecialidades as me 
        ON e.id_especialidades = me.id_esp INNER JOIN medicos as m ON me.id_med = m.id_medicos ORDER BY e.nome_especialidades ";

        $res = Conexao::prepare($sql);
        //$res->bindParam(':n', $nome, PDO::PARAM_STR);
        $res->execute();
        return $res->fetchAll();
    }

    public function selectUnit($id)
    {
        $sql = "SELECT me.id_medesp, e.id_especialidades, e.nome_especialidades, m.nome_medicos, m.id_medicos, me.id_esp, me.id_med  FROM medicos as m 
                INNER JOIN medicosespecialidades as me ON m.id_medicos = me.id_med INNER JOIN especialidades as e ON me.id_esp = e.id_especialidades WHERE me.id_med = :id  ";

        $res = Conexao::prepare($sql);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->execute();
        return $res->fetchAll();
    }

    public function inserir($id_med, $id_esp)
    {
        $sql = "INSERT INTO medicosespecialidades(id_med, id_esp) VALUES(:idm, :ide)";
        $res = Conexao::prepare($sql);

        $res->bindParam(':idm', $id_med, PDO::PARAM_INT);
        $res->bindParam(':ide', $id_esp, PDO::PARAM_INT);

        $res->execute();
       
        return ['status' => '1'];
    }    
    
    public function update($id_medesp, $id_esp, $id_med)
    {
        $sql = "UPDATE medicosespecialidades SET id_esp = :e, id_med = :m WHERE id_medesp = :id_medesp";

        $res = Conexao::prepare($sql);

        $res->bindParam(':id_medesp', $id_medesp, PDO::PARAM_INT);
        $res->bindParam(':e', $id_esp, PDO::PARAM_INT);
        $res->bindParam(':m', $id_med, PDO::PARAM_INT);

        $res->execute();
        return $res;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM medicosespecialidades WHERE id_medesp = :id";
        $res = Conexao::prepare($sql);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->execute();
        return $res;
    }

    public function pesquisarNomeMed($nome)
    {
        $sql = "SELECT e.nome_especialidades, me.id_medesp FROM medicos as m INNER JOIN medicosespecialidades as me ON m.id_medicos = me.id_med INNER JOIN especialidades as e ON me.id_esp = e.id_especialidades WHERE m.nome_medicos = :n";
        $res = Conexao::prepare($sql);

        $res->bindParam(':n', $nome, PDO::PARAM_STR);
        $res->execute();
        return $res->fetchAll();
    }

    public function pesquisarNomeEsp($nome)
    {
        $sql = "SELECT m.nome_medicos FROM medicos as m INNER JOIN medicosespecialidades as me ON m.id_medicos = me.id_med INNER JOIN especialidades as e ON me.id_esp = e.id_especialidades WHERE e.nome_especialidades = :n";
        $res = Conexao::prepare($sql);

        $res->bindParam(':n', $nome, PDO::PARAM_STR);
        $res->execute();
        return $res->fetchAll();
    }

    public function pesquisar($nome, $crm)
    {
        $sql = "SELECT * FROM medicos WHERE nome_medicos LIKE '%$nome%' AND crm_medicos LIKE '%$crm%' ";
        $res = Conexao::prepare($sql);

        $res->bindParam(':n', $nome, PDO::PARAM_STR);
        $res->bindParam(':c', $crm, PDO::PARAM_STR);

        $res->execute();
        return $res->fetchAll();
    }


    
}

?>