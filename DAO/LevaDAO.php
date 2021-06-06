<?php
include '../percistencia/connectionDB.php';


Class LevaDAO{

    private $connection = null;
    public function __construct()
    {
        $this->connection = connectionDB::getInstance();        
    }
    public function create($leva){
        try {
            $stmt = $this->connection->prepare(
                "INSERT INTO leva (data_leva,tipo,fervura_inicio,fervura_fim,fermento) VALUES(?,?,?,?,?)");
            $stmt->bindValue(1,$leva->data);
            $stmt->bindValue(2,$leva->tipoLeva);
            $stmt->bindValue(3,$leva->fervuraini);
            $stmt->bindValue(4,$leva->fervurafinal);
            $stmt->bindValue(5,$leva->fermento);
            $stmt->execute();
            $this->connection=null;
        } catch(PDOException $erros){
            echo "erro ao inserir Leva!";
            echo $erros;

        }
    }

    public function search(){
        try{
            $statement = $this->connection->prepare("SELECT * FROM leva");
            $statement->execute();
            $dados = $statement->fetchAll();
            $this->connection = null;

            return $dados;
            
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