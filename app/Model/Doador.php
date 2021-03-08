<?php 

class Doador{
    public static function selecionarTodos(){
        $con = Connection::getConn();
        $query = $con->prepare('SELECT d.id, d.nome, d.data_cadastro, i.nome AS intervalo, d.valor_doacao, p.nome AS pagamento, e.estado AS uf FROM doador d INNER JOIN endereco e ON d.endereco=e.id INNER JOIN forma_pagamento p ON p.id=d.forma_pagamento INNER JOIN intervalo_doacao i ON d.intervalo_doacao=i.id');
        $res = $query->execute();

        if($res){
            $result = array();
            while($row = $query->fetchObject('Doador')){
                $result[] = $row;
            }
            return $result;
        }else{
            throw new Exception("Falha ao executar consulta!");
        }
    }
    public static function selecionarPorId($id){
                
        $con = Connection::getConn();
        $query = $con->prepare("SELECT  FROM doador d WHERE id=:id");
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $res = $query->execute();

        if($res){
            if($doador = $query->fetchObject('Doador')){
                return $doador;
            }else{
                throw new Exception("Doador não encontrado!");
            }            
        }else{
            throw new Exception("Erro ao localizar doador!");
        }
    }
    public static function insert($doador){
        
        try{
            $con = Connection::getConn();
            $query = $con->prepare("INSERT INTO doador (nome,email,cpf,telefone,data_nascimento,intervalo_doacao,valor_doacao,forma_pagamento,endereco) VALUES (:nome,:email,:cpf,:telefone,:nascimento,:intervalo,:valor,:forma,:endereco)");
            $query->bindValue(':nome',$doador->nome);
            $query->bindValue(':email',$doador->email);
            $query->bindValue(':cpf',$doador->cpf);
            $query->bindValue(':telefone',$doador->telefone);
            $query->bindValue(':nascimento',$doador->nascimento);
            $query->bindValue(':intervalo',$doador->intervalo);
            $query->bindValue(':valor',$doador->valor);
            $query->bindValue(':forma',$doador->forma);
            $query->bindValue(':endereco',$doador->id_endereco);
            $res = $query->execute();
            if($res == false){
                throw new Exception("Falha ao cadastrar doador!");
            }
        }catch(PDOException $e){
            throw new Exception("erro: ".$e->getMessage());
        }

    }
    public static function delete($id){
        $con = Connection::getConn();
        $query = $con->prepare("DELETE doador,endereco FROM doador INNER JOIN endereco ON endereco.id=doador.endereco WHERE doador.id=:id");
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $res = $query->execute();

        if($res == false){
            throw new Exception("Erro ao deletar doador");
        }
    }
}