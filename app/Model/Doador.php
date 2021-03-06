<?php 

class Doador{
    public static function selecionarTodos(){
        $con = Connection::getConn();
        $query = $con->prepare('SELECT d.id, e.nome, d.data_cadastro, d.intervalo_doacao, d.valor_doacao, d.forma_pagamento, e.nome as estado, e.sigla as uf FROM doador d INNER JOIN endereco end ON d.endereco=end.id INNER JOIN estado e ON e.id=end.estado');
        $res = $query->execute();

        if($res == false){
            throw new Exception("Falha ao executar consulta!");
        }
        
        $result = array();
        while($row = $query->fetchObject('Doador')){
            $result[] = $row;
        }
        return $result;
    }
    public static function selecionarPorId($id){
                
        $con = Connection::getConn();
        $query = $con->prepare("SELECT * FROM doador WHERE id=:id");
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $res = $query->execute();

        if($res){
            $doador = $query->fetchObject('Doador');
            
        }else{
            throw new Exception("Erro ao localizar doador!");
        }
    }
}