<?php
session_start();
include_once '../percistencia/connectionDB.php';


Class MalteDAO{

    private $connection = null;
    public function __construct()
    {
        $this->connection = connectionDB::getInstance();        
    }
    public function create($malte){
        try {
            $stmt = $this->connection->prepare(
                "INSERT INTO maltes (nome,tipo_malte) VALUES(?,?)");
            $stmt->bindValue(1,$malte->nome);
            $stmt->bindValue(2,$malte->tipo_malte);
            
            $stmt->execute();
            $this->connection=null;
        } catch(PDOException $erros){
            echo "erro ao inserir Malte!";
            echo $erros;

        }
    }

    public function search(){
        try{
            $statement = $this->connection->prepare("SELECT * FROM maltes");
            $statement->execute();
            $dados = $statement->fetchAll();
            $this->connection = null;

            return $dados;
            
        } catch (PDOException $e){
            echo "Ocorreram erros ao consultar malte!";
            echo $e;
        }
    }

    public function delete($id){
        try{
            $statement = $this->connection->prepare("DELETE FROM maltes WHERE id = ?");
            $statement->bindValue(1, $id);
            $statement->execute();

            $this->connection = null;
        } catch (PDOException $e){
            echo "Erro ao deletar Leva!";
            echo $e;
        }
    }
    public function localiza($id_malte){
        try{
            $statement = $this->connection->prepare("SELECT * FROM maltes where id = ?");
            $statement->bindValue(1, $id_malte);
            $statement->execute();
            $dados = $statement->fetchAll();
            $this->connection = null;

            return $dados;
            
        } catch (PDOException $e){
            echo "Ocorreram erros ao consultar malte!";
            echo $e;
        }
    }
    public function atualizar($id,$nome,$tipo)
    {
        $statement = $this->connection->prepare("UPDATE maltes SET nome= ? ,tipo_malte= ? where id = $id ");
        $statement->bindvalue(1,$nome);
        $statement->bindvalue(2,$tipo);
        $statement->execute();
    }
    public function veratt($id)
    {
        try {

            $statement = $this->connection->prepare("SELECT * FROM maltes where id = $id");
            $statement->execute();
            $malte = $statement->fetchAll();
            $this->connection = null;

            return $malte;
        } catch (PDOException $e) {
            echo 'erro ao tentar verificar lupulo, provavelmente j?? foi apagado!';
        };
    }
}
