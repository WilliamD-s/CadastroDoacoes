<?php 

class Doador{
    public static function selecionarTodos(){
        $con = Connection::getConn();
        $query = $con->prepare('SELECT d.id, d.nome,d.data_cadastro,i.nome AS intervalo, d.valor_doacao, p.nome AS pagamento, e.estado AS uf FROM doador d INNER JOIN endereco e ON d.endereco=e.id INNER JOIN forma_pagamento p ON p.id=d.forma_pagamento INNER JOIN intervalo_doacao i ON d.intervalo_doacao=i.id');
        $res = $query->execute();

        if($res){
            $result = array();
            while($row = $query->fetchObject('Doador')){
                $row->data_cadastro = Tools::timestampParaData($row->data_cadastro);
                $result[] = $row;
            }
            return $result;
        }else{
            throw new Exception("Falha ao executar consulta!");
        }
    }
    public static function selecionarPorId($id){
                
        $con = Connection::getConn();
        $query = $con->prepare("SELECT d.id,d.nome,d.email,d.cpf,d.telefone,d.data_nascimento AS nascimento,i.nome AS intervalo,i.id AS id_intervalo,d.valor_doacao AS valor,p.nome AS pagamento, p.id AS id_pagamento,e.cep,e.rua,e.bairro,e.cidade,e.estado,e.id AS id_endereco FROM doador d INNER JOIN intervalo_doacao i ON i.id=d.intervalo_doacao INNER JOIN endereco e ON e.id=d.endereco INNER JOIN forma_pagamento p ON p.id=d.forma_pagamento  WHERE d.id=:id");
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $res = $query->execute();

        if($res){
            if($doador = $query->fetchObject('Doador')){
                $doador->data = Tools::timestampParaHtml($doador->nascimento);
                $doador->nascimento = Tools::timestampParaData($doador->nascimento);
                return $doador;
            }else{
                throw new Exception("Doador não encontrado!");
            }            
        }else{
            throw new Exception("Erro ao consultar doadores!");
        }
    }
    public static function merge($doador){
        try{
            $con = Connection::getConn();

            if(isset($doador->id)){
                $query = $con->prepare("UPDATE doador SET nome=:nome,email=:email,cpf=:cpf,telefone=:telefone,data_nascimento=:nascimento,intervalo_doacao=:intervalo,valor_doacao=:valor,forma_pagamento=:forma,endereco=:endereco WHERE id=:id");
                $query->bindValue(':id',$doador->id,PDO::PARAM_INT);
            }else{                
                $query = $con->prepare("INSERT INTO doador (nome,email,cpf,telefone,data_nascimento,intervalo_doacao,valor_doacao,forma_pagamento,endereco) VALUES (:nome,:email,:cpf,:telefone,:nascimento,:intervalo,:valor,:forma,:endereco)");
            }
            $query->bindValue(':nome',$doador->nome,PDO::PARAM_STR);
            $query->bindValue(':email',$doador->email,PDO::PARAM_STR);
            $query->bindValue(':cpf',$doador->cpf,PDO::PARAM_STR);
            $query->bindValue(':telefone',$doador->telefone,PDO::PARAM_STR);
            $query->bindValue(':nascimento',$doador->nascimento,PDO::PARAM_STR);
            $query->bindValue(':intervalo',$doador->intervalo,PDO::PARAM_INT);
            $query->bindValue(':valor',$doador->valor,PDO::PARAM_STR);
            $query->bindValue(':forma',$doador->forma,PDO::PARAM_INT);
            $query->bindValue(':endereco',$doador->id_endereco,PDO::PARAM_INT);
            
            $res = $query->execute();
            if($res == false){
                throw new Exception("Erro ao registrar doador!");
            }
        }catch(PDOException $e){
            throw new Exception("erro: ".$e->getMessage());
        }

    }
    public static function delete($id){
        $con = Connection::getConn();
        $query = $con->prepare("DELETE FROM doador WHERE id=:id");
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $res = $query->execute();

        if($res == false){
            throw new Exception("Erro ao deletar doador");
        }
    }
}