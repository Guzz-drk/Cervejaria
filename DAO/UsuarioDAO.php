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
    public function criar(){
        $erros = array();

    if(!UsuarioValidate::validaEmail($_POST['emailUsuario'])){
        $erros[] = 'E-mail Inválido!';
    }
    if(!UsuarioValidate::validaIdade($_POST['dataNascimento'])){
        $erros[] = 'Idade abaixo do permitido!';
    }

    if (count($erros) == 0){
        $usuario = new Usuario();

        $usuario->nome = $_POST['nome'];
        $usuario->dataNascimento = $_POST['dataNascimento'];
        $usuario->emailUsuario = $_POST['emailUsuario'];
        $usuario->senhaUsuario = $_POST['senhaUsuario'];
        $usuario->brassagenscont = $_POST['brassagenscont'];
        $usuario->cursoscerv = $_POST['cursoscerv'];

        $userDao = new UsuarioDAO();
        $userDao->create($usuario);
    }
    else {
        echo "Ocorreram erros ao cadastrar um novo Usuário!";
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