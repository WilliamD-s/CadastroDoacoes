<?php

class Cidade
{
    public static function selecionarPorId($id)
    {
        $con = Connection::getConn();
        $query = $con->prepare("SELECT * FROM cidade WHERE id=:id");
        $query->bindValue(":id", $id);
        $res = $query->execute();

        if ($res) {
            $result = $query->fetchObject('Cidade');
            return $result;
        }else{            
            throw new Exception("Erro ao consultar!");
        }
    }
    public static function merge($dados)
    {
        $con = Connection::getConn();

        $query = $con->prepare('SELECT id FROM cidade WHERE nome=:nome AND uf=:uf');
        $query->bindValue(':nome', $dados->nome, PDO::PARAM_STR);
        $query->bindValue(':uf', $dados->uf, PDO::PARAM_INT);
        $res = $query->execute();

        if($res){
            if ($cidade = $query->fetch(PDO::FETCH_ASSOC)) {
                return $cidade['id'];
            } else {
                $query = $con->prepare('INSERT INTO cidade(nome,uf) VALUES(:nome,:uf)');
                $query->bindValue(':nome', $dados->nome, PDO::PARAM_STR);
                $query->bindValue(':uf', $dados->uf, PDO::PARAM_INT);
                $res = $query->execute();

                if($res){
                    $id = $con->lastInsertId();
                    return $id;
                }else{
                    throw new Exception("Erro ao cadastrar nova cidade!");
                }
            }
        }else{
            throw new Exception("Erro ao consultar cidade!");
        }
        
    }
}
