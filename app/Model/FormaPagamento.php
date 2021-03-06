
<?php

class FormaPagamento{
    public static function selecionarTodas(){
        $con = Connection::getConn();
        $query = $con->prepare("SELECT * FROM forma_pagamento");
        $res = $query->execute();
        
        if($res != false){
            $result = array();
            while($row = $query->fetchObject('FormaPagamento')){
                $result[] = $row; 
            }
            return $result;
        }else{
            throw new Exception("Erro ao consultar formas de pagamento!");
        }
    }
    public static function selecionarPorId($id){
        $con = Connection::getConn();
        $query = $con->prepare("SELECT * FROM forma_pagamento WHERE id=:id");
        $query->bindValue(':id',$id,PDO::PARAM_INT);
        $res = $query->execute();

        if($res != false){
            $result = $query->fetchObject('FormaPagamento');
            return $result;
        }else{
            throw new Exception("Erro ao consultar forma de pagamento!");
        }
    }
}