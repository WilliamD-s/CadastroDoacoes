<?php

class Estado{
    public static function selecionarPorId($id){
        $con = Connection::getConn();
        $query = $con->prepare('SELECT * FROM estado WHERE id=:id');
        $query->bindValue(':id',$id,PDO::PARAM_INT);
        $res = $query->execute();

        if($res){
            $result = $query->fetchObject('Estado');
            return $result;
        }else{
            throw new Exception("Erro ao consultar cidade!");
        }
    }
    public static function merge($estado){
        $con = Connection::getConn();
        $query = $con->prepare("SELECT id FROM estado WHERE nome=:nome AND sigla=:sigla");
        $query->bindValue(':nome',$estado->nome,PDO::PARAM_STR);
        $query->bindValue(':sigla',$estado->sigla,PDO::PARAM_STR);
        $res = $query->execute();

        if($res){
            if($id = $query->fetch()){
                return $id;
            }else{
                $query = $con->prepare("INSERT INTO estado(nome,sigla) VALUES(:nome, :sigla)");
                $query->bindValue(':nome',$estado->nome,PDO::PARAM_STR);
                $query->bindValue(':sigla',$estado->sigla,PDO::PARAM_STR);
                $res = $query->execute();

                if($res){
                    $result = $con->lastInsertId();
                    return $result;
                }else{
                    throw new Exception("Erro ao cadastrar estado!");
                }
            }
        }else{
            throw new Exception("Erro ao consultar estado!");
        }
    }
}