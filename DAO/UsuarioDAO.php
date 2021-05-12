<?php
include '../percistencia/connectionDB.php';

class UsuarioDAO{
    private $connection = null;
    public function __construct()
    {
        $this->connection = connectionDB::getInstance();        
    }
    public function create($usuario){
        try {
            $stmt = $this->connection->prepare(
                "INSERT INTO usuarios (nome,dataNasc,email,senha,numbrassagens,cursoscerv) VALUES(?,?,?,?,?,?)");
            $stmt->bindValue(1,$usuario->nome);
            $stmt->bindValue(2,$usuario->dataNascimento);
            $stmt->bindValue(3,$usuario->emailUsuario);
            $stmt->bindValue(4,$usuario->senhaUsuario);
            $stmt->bindValue(5,$usuario->brassagenscont);
            $stmt->bindValue(6,$usuario->cursoscerv);
            $stmt->execute();
            $this->connection=null;
        } catch(PDOException $erros){
            echo "erro ao inserir usuário!";
            echo $erros;

        }
    }

    public function search(){
        try{
            $statement = $this->connection->prepare("SELECT * FROM usuarios");
            $statement->execute();
            $dados = $statement->fetchAll();
            $this->connection = null;

            return $dados;
            
        } catch (PDOException $e){
            echo "Ocorreram erros ao consultar usuários!";
            echo $e;
        }
    }
}





?>