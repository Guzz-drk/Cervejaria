<?php

session_start();
$user = unserialize($_SESSION['usuario']);
if (!$user){
  header("location../../index.php");}
include_once '../percistencia/connectionDB.php';


Class MalteLevaDAO{

    private $connection = null;
    public function __construct()
    {
        $this->connection = connectionDB::getInstance();        
    }
    public function create($malte_leva){
        try {
            echo('<script>alert("aqui chegou");</script>');
            $stmt = $this->connection->prepare(
                
                "INSERT INTO malte_levas (id_leva,id_malte,quant) VALUES(?,?,?)");
            $stmt->bindValue(1,$malte_leva->id_leva);
            $stmt->bindValue(2,$malte_leva->id_malte);
            $stmt->bindValue(3,$malte_leva->quant);            
            $stmt->execute();
            $this->connection=null;
        } catch(PDOException $erros){
            echo "erro ao inserir malteleva!";
            echo $erros;

        }
    }

    public function search(){
        try{
            $statement = $this->connection->prepare("SELECT * FROM malte_levas");
            $statement->execute();
            $dados = $statement->fetchAll();
            $this->connection = null;

            return $dados;
            
        } catch (PDOException $e){
            echo "Ocorreram erros ao consultar malte_leva!";
            echo $e;
        }
    }

    public function delete($id){
        try{
            $statement = $this->connection->prepare("DELETE FROM malte_levas WHERE id = ?");
            $statement->bindValue(1, $id);
            $statement->execute();

            $this->connection = null;
        } catch (PDOException $e){
            echo "Erro ao deletar malte_leva!";
            echo $e;
        }
    }

    public function localiza($id_leva){
        try{
            $statement = $this->connection->prepare("select maltes.id,maltes.nome, maltes.tipo_malte, malte_levas.* from malte_levas 
            inner join maltes on malte_levas.id_malte = maltes.id
            where malte_levas.id_leva = ?");
            $statement->bindValue(1, $id_leva);
            $statement->execute();
            $dados = $statement->fetchAll();
            $this->connection = null;

            return $dados;
            
        } catch (PDOException $e){
            echo "Ocorreram erros ao consultar malte_leva!";
            echo $e;
        }
    }
    public function atualizar($id,$nome,$tipo,$marca)
    {
        $statement = $this->connection->prepare("UPDATE fermento SET nome= ? ,tipo= ? ,marca= ? where id = $id ");
        $statement->bindvalue(1,$nome);
        $statement->bindvalue(2,$tipo);
        $statement->bindvalue(3,$marca);
        $statement->execute();
    }
    public function veratt($id)
    {
        try {

            $statement = $this->connection->prepare("SELECT * FROM fermento where id = $id");
            $statement->execute();
            $fermento = $statement->fetchAll();
            $this->connection = null;

            return $fermento;
        } catch (PDOException $e) {
            echo 'erro ao tentar verificar lupulo, provavelmente já foi apagado!';
        };
    }
}