<?php
include_once '../percistencia/connectionDB.php';


class lupuloDAO
{

    private $connection = null;
    public function __construct()
    {
        $this->connection = connectionDB::getInstance();
    }
    public function create($lupulo)
    {
        try {
            $stmt = $this->connection->prepare(
                "INSERT INTO lupulo (nome,tipo,origem) VALUES(?,?,?)"
            );
            $stmt->bindValue(1, $lupulo->nome);
            $stmt->bindValue(2, $lupulo->tipo);
            $stmt->bindValue(3, $lupulo->origem);
            $stmt->execute();
            $this->connection = null;
        } catch (PDOException $erros) {
            echo "erro ao inserir lupulo!";
            echo $erros;
        }
    }

    public function search()
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM lupulo");
            $statement->execute();
            $lupulo = $statement->fetchAll();
            $this->connection = null;

            return $lupulo;
        } catch (PDOException $e) {
            echo "Ocorreram erros ao consultar lupulos!";
            echo $e;
        }
    }

    public function delete($id)
    {
        try {
            $statement = $this->connection->prepare("DELETE FROM lupulo WHERE id = ?");
            $statement->bindValue(1, $id);
            $statement->execute();

            $this->connection = null;
        } catch (PDOException $e) {
            echo "Erro ao deletar lupulo!";
            echo $e;
        }
    }
    public function veratt($id)
    {
        try {

            $statement = $this->connection->prepare("SELECT * FROM lupulo where id = $id");
            $statement->execute();
            $lupulo = $statement->fetchAll();
            $this->connection = null;

            return $lupulo;
        } catch (PDOException $e) {
            echo 'erro ao tentar verificar lupulo, provavelmente já foi apagado!';
        };
    }
    public function atualizar($id,$nome,$tipo,$origem)
    {
        $statement = $this->connection->prepare("UPDATE lupulo SET nome= ? ,tipo= ? ,origem= ? where id = $id ");
        $statement->bindvalue(1,$nome);
        $statement->bindvalue(2,$tipo);
        $statement->bindvalue(3,$origem);
        $statement->execute();
    }
}
