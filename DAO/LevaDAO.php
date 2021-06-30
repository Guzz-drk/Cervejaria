<?php
session_start();
$user = unserialize($_SESSION['usuario']);
if (!$user){
  header("location:../../index.php");}
include_once '../percistencia/connectionDB.php';



Class LevaDAO{

    private $connection = null;
    public function __construct()
    {
        $this->connection = connectionDB::getInstance();        
    }
    public function create($leva){
        try {
            $stmt = $this->connection->prepare(
                "INSERT INTO leva (data_leva,tipo,primeira_rampa,temp_primeira_rampa,fermento,fermentog,agua,lupulo) VALUES(?,?,?,?,?,?,?,?)");
            $stmt->bindValue(1,$leva->data);
            $stmt->bindValue(2,$leva->tipoLeva);
            $stmt->bindValue(3,$leva->primeira_rampa);
            $stmt->bindValue(4,$leva->temp_primeira_rampa);
            $stmt->bindValue(5,$leva->fermento);
            $stmt->bindValue(6,$leva->fermentog);
            $stmt->bindValue(7,$leva->agua);
            $stmt->bindValue(8,$leva->lupulo);

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
    public function localiza($id_leva){
        try{
            $statement = $this->connection->prepare('select fermento.nome as "nome_fermento",fermento.tipo as "tipo_fermento",
            fermento.marca as "marca_fermento", leva.*, lupulo.nome as "nome_lupulo",
            lupulo.tipo as "tipo_lupulo", lupulo.origem as "origem_lupulo"
            from leva inner join fermento on leva.fermento = fermento.id inner join lupulo as lupulo on leva.lupulo = lupulo.id
            where leva.id = ?');
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
    public function receitas($query){
        
        $malte= $query['malte'];
        $maltequant= $query['quantmalte'];
        $lupulo=$query['lupulo'];
        $fermento=$query['fermento'];
        $quantfermento=$query['quantfermento'];
        $statement = $this->connection->prepare('select ml.id_leva
        from leva as l right join malte_levas as ml on ml.id_leva=l.id
        where ml.id_malte = ? and ml.quant < ? and l.lupulo=? and l.fermento=? and l.fermentog < ?
        group by ml.id_leva;');
        $statement->bindValue(1, $malte);
        $statement->bindValue(2, $maltequant);
        $statement->bindValue(3, $lupulo);
        $statement->bindValue(4, $fermento);
        $statement->bindValue(5, $quantfermento);
        $statement->execute();
        $dados = $statement->fetchAll();
        $this->connection = null;

        return $dados;
    



    } 




}






?>