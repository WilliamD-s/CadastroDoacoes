<?php

class Endereco{
    public static function selecionarPorId($id){
        $con = Connection::getConn();
        $query = $con->prepare("SELECT * FROM endereco WHERE id=:id");
        $query->bindValue(':id',$id,PDO::PARAM_INT);
        $res = $query->execute();
        
        if($res != false){
            $result = $query->fetchObject('Endereco');
            return $result;
        }else{
            throw new Exception("Erro ao consultar endereco");
        }
    }
    public static function merge($endereco){

        $con = Connection::getConn();

        if(empty($endereco->id)){
            $query = $con->prepare("INSERT INTO endereco(rua,bairro,estado,cidade,cep) VALUES (:rua, :bairro, :estado, :cidade, :cep)");
        }else{
            $query = $con->prepare("UPDATE endereco SET rua=:rua, bairro=:bairro, estado=:estado, cidade=:cidade, cep=:cep WHERE id=:id");
            $query->bindValue(':id',$endereco->id,PDO::PARAM_INT);
        }
        $query->bindValue(':rua',$endereco->rua,PDO::PARAM_STR);
        $query->bindValue(':bairro',$endereco->bairro,PDO::PARAM_STR);
        $query->bindValue(':estado',$endereco->uf,PDO::PARAM_STR);
        $query->bindValue(':cidade',$endereco->cidade,PDO::PARAM_STR);
        $query->bindValue(':cep',$endereco->cep,PDO::PARAM_STR);
        $res = $query->execute();
        
        if($res == false){
            // throw new Exception("Falha ao registrar endereço!");
            throw new Exception(json_encode($endereco));
        }
        if(empty($endereco->id)){
            $id = $con->lastInsertId();
            return $id;
        }else{
            return $endereco->id;
        }
    }
    public static function delete($id){
        $con = Connection::getConn();
        $query = $con->prepare("DELETE endereco FROM endereco WHERE id=:id");
        $query->bindValue(":id",$id);
        $res = $query->execute();

        if($res == false){
            throw new Exception("Erro ao deletar endereco!");
        }
    }
}