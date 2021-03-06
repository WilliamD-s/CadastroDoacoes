<?php

class IntervaloDoacao{
    public static function selecionarTodos(){
        $con = Connection::getConn();
        $query = $con->prepare("SELECT * FROM intervalo_doacao");
        $res = $query->execute();

        if($res){
            $result = array();
            while($row = $query->fetchObject('IntervaloDoacao')){
                $result[] = $row;
            }
            return $result;
        }else{
            throw new Exception("Erro ao buscar intervalo de doações!");
        }
    }
    public static function selecionarPorId($id){
        $con = Connection::getConn();
        $query = $con->prepare("SELECT * FROM intevalo_doacao WHERE id=:id");
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $res = $query->execute();

        if($res){
            $result = $query->fetchObject('IntervaloDoacao');
            return $result;
        }else{
            throw new Exception("Erro ao buscar intervalo de doação!");
        }

    }
}