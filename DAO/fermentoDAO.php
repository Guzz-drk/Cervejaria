<?php
include '../percistencia/connectionDB.php';


Class fermentoDAO{

    private $connection = null;
    public function __construct()
    {
        $this->connection = connectionDB::getInstance();        
    }
    public function create($fermento){
        try {
            $stmt = $this->connection->prepare(
                "INSERT INTO leva (nome,tipo,origem) VALUES(?,?,?)");
            $stmt->bindValue(1,$fermento->nome);
            $stmt->bindValue(2,$fermento->tipo);
            $stmt->bindValue(3,$fermento->marca);
            $stmt->execute();
            $this->connection=null;
        } catch(PDOException $erros){
            echo "erro ao inserir fermento!";
            echo $erros;

        }
    }

    public function search(){
        try{
            $statement = $this->connection->prepare("SELECT * FROM fermento");
            $statement->execute();
            $fermentos = $statement->fetchAll();
            $this->connection = null;

            return $fermentos;
            
        } catch (PDOException $e){
            echo "Ocorreram erros ao consultar leva!";
            echo $e;
        }
    }

    public function delete($id){
        try{
            $statement = $this->connection->prepare("DELETE FROM leva WHERE id = ?");
            $statement->bindValue(1, $id);
            $statement->execute();

            $this->connection = null;
        } catch (PDOException $e){
            echo "Erro ao deletar leva!";
            echo $e;
        }
    }

}






?>