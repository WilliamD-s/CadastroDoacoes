<?php 

class Doador{
    public static function selecionarTodos(){
        $con = Connection::getConn();
        $query = $con->prepare('SELECT d.id, d.nome, d.data_cadastro, i.nome AS intervalo, d.valor_doacao, p.nome AS pagamento, e.estado AS uf FROM doador d INNER JOIN endereco e ON d.endereco=e.id INNER JOIN forma_pagamento p ON p.id=d.forma_pagamento INNER JOIN intervalo_doacao i ON d.intervalo_doacao=i.id');
        $res = $query->execute();

        if($res){
            $result = array();
            while($row = $query->fetchObject('Doador')){
                $row->data_cadastro = DateTime::createFromFormat ( "Y-m-d H:i:s", $row->data_cadastro );
                $row->data_cadastro = $row->data_cadastro->format('d/m/Y');
                $result[] = $row;
            }
            return $result;
        }else{
            throw new Exception("Falha ao executar consulta!");
        }
    }
    public static function selecionarPorId($id){
                
        $con = Connection::getConn();
        $query = $con->prepare("SELECT d.nome,d.email,d.cpf,d.telefone,d.data_nascimento AS nascimento,i.nome AS intervalo,d.valor_doacao AS valor,p.nome AS pagamento, e.cep,e.rua,e.bairro,e.cidade,e.estado,e.id AS id_endereco FROM doador d INNER JOIN intervalo_doacao i ON i.id=d.intervalo_doacao INNER JOIN endereco e ON e.id=d.endereco INNER JOIN forma_pagamento p ON p.id=d.forma_pagamento  WHERE d.id=:id");
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $res = $query->execute();

        if($res){
            if($doador = $query->fetchObject('Doador')){
                $doador->nascimento = DateTime::createFromFormat ( "Y-m-d H:i:s", $doador->nascimento );
                $doador->nascimento = $doador->nascimento->format('d/m/Y');
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