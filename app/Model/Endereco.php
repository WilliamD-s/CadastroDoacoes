<?php

class Endereco{
    public static function selecionarPorId($id){
        $con = Connection::getConn();
        $query = $con->prepare("SELECT end.id, end.rua, end.bairro, e.nome, e.sigla, c.nome, end.cep FROM endereco end INNER JOIN estado e ON end.estado=e.id INNER JOIN cidade c ON c.id=end.cidade WHERE end.id=:id");
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

        $estado = Estado::merge($endereco->estado);
        $cidade = Cidade::merge($endereco->cidade);

        $con = Connection::getConn();
        $query = $con->prepare("INSERT INTO endereco(rua,bairro,estado,cidade,cep) VALUES (:rua, :bairro, :estado, :cidade, :cep)");
        $query->bindValue(':rua',$endereco->rua,PDO::PARAM_STR);
        $query->bindValue(':bairro',$endereco->bairro,PDO::PARAM_STR);
        $query->bindValue(':estado',$estado,PDO::PARAM_INT);
        $query->bindValue(':cidade',$cidade,PDO::PARAM_INT);
        $query->bindValue(':cep',$endereco->cep,PDO::PARAM_STR);
        $res = $query->execute();

        if($res == false){
            throw new Exception("Erro ao registrar endereco!");
        }
    }
}