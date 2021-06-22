<?php
include_once '../percistencia/connectionDB.php';


Class fermentoDAO{

    private $connection = null;
    public function __construct()
    {
        $this->connection = connectionDB::getInstance();        
    }
    public function create($fermento){
        try {
            $stmt = $this->connection->prepare(
                "INSERT INTO fermento (nome,tipo,marca) VALUES(?,?,?)");
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
            echo "Ocorreram erros ao consultar fermentos!";
            echo $e;
        }
    }

    public function delete($id){
        try{
            $statement = $this->connection->prepare("DELETE FROM fermento WHERE id = ?");
            $statement->bindValue(1, $id);
            $statement->execute();

            $this->connection = null;
        } catch (PDOException $e){
            echo "Erro ao deletar fermento!";
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







?>