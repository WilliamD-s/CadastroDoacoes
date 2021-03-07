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
        $query = $con->prepare("SELECT id FROM endereco WHERE rua=:rua AND bairro=:bairro AND estado=:estado AND cidade=:cidade AND cep=:cep");
        $query->bindValue(':rua',$endereco->rua,PDO::PARAM_STR);
        $query->bindValue(':bairro',$endereco->bairro,PDO::PARAM_STR);
        $query->bindValue(':estado',$endereco->estado,PDO::PARAM_STR);
        $query->bindValue(':cidade',$endereco->cidade,PDO::PARAM_STR);
        $query->bindValue(':cep',$endereco->cep,PDO::PARAM_INT);
        $res = $query->execute();

        if($res){
            if($id = $query->fetch()){
                return $id;
            }else{
                $res = false;
                $query = $con->prepare("INSERT INTO endereco(rua,bairro,estado,cidade,cep) VALUES (:rua, :bairro, :estado, :cidade, :cep)");
                $query->bindValue(':rua',$endereco->rua,PDO::PARAM_STR);
                $query->bindValue(':bairro',$endereco->bairro,PDO::PARAM_STR);
                $query->bindValue(':estado',$endereco->estado,PDO::PARAM_STR);
                $query->bindValue(':cidade',$endereco->cidade,PDO::PARAM_STR);
                $query->bindValue(':cep',$endereco->cep,PDO::PARAM_INT);
                $res = $query->execute();

                if($res){
                    $id = $con->lastInsertId();
                    return $id;
                }else{
                    throw new Exception("Erro ao registrar novo endereço!");
                }
            }
            
        }else{
            
            throw new Exception("Erro ao registrar endereço!");
        }
    }
}