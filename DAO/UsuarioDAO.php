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
                "INSERT INTO usuarios (nome,dataNasc,email,senha,numbrassagens,cursoscerv) VALUES(?,?,?,md5(?),?,?)");
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

    public function delete($id){
        try{
            $statement = $this->connection->prepare("DELETE FROM usuarios WHERE id = ?");
            $statement->bindValue(1, $id);
            $statement->execute();

            $this->connection = null;
        } catch (PDOException $e){
            echo "Erro ao deletar usuário!";
            echo $e;
        }
    }

    public function find($email, $senha){
        try{
            $statement = $this->connection->prepare("SELECT * FROM usuarios WHERE email = ? and senha = md5(?)");
            $statement->bindValue(1, $email);
            $statement->bindValue(2, $senha);
            $statement->execute();
            $user = $statement->fetchAll();

            $this->connection = null;

            return $user;
        } catch (PDOException $e){
            echo"Erro ao procurar Usuários!";
            echo $e;
        }
    }
}





?>