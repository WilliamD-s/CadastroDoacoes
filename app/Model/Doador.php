<?php 

class Doador{
    public static function selecionarTodos(){
        $con = Connection::getConn();
        $query = $con->prepare('SELECT d.id, e.nome, d.data_cadastro, d.intervalo_doacao, d.valor_doacao, d.forma_pagamento, e.nome as estado, e.sigla as uf FROM doador d INNER JOIN endereco end ON d.endereco=end.id INNER JOIN estado e ON e.id=end.estado');
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
        $query = $con->prepare("SELECT * FROM doador WHERE id=:id");
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
    public static function insert($dados){
        $con = Connection::getConn();
        $query = $con->prepare('INSERT INTO doador(nome, email, cpf, telefone, data_nascimento, intervalo_doacao, valor_doacao, forma_pagamento, endereco) VALUES(:nome, :email, :cpf, :telefone, :data_nascimento, :intervalo_doacao, :valor_doacao, :forma_pagamento, :endereco)');
        $query->bindValue(":nome",$dados->nome,PDO::PARAM_STR);
        $query->bindValue(":email",$dados->email,PDO::PARAM_STR);
        $query->bindValue(":cpf",$dados->cpf,PDO::PARAM_STR);
        $query->bindValue(":telefone",$dados->telefone,PDO::PARAM_STR);
        $query->bindValue(":data_nascimento",$dados->data_nascimento);
        $query->bindValue(":intervalo_doacao",$dados->intervalo_doacao,PDO::PARAM_INT);
        $query->bindValue(":valor_daocao",$dados->valor_doacao);
        $query->bindValue(":forma_pagamento",$dados->forma_pagamento,PDO::PARAM_INT);
        $query->bindValue(":endereco",$dados->endereco->id,PDO::PARAM_INT);
        $res = $query->execute();

        if($res){
            return true;
        }else{            
            throw new Exception("Erro ao cadastrar doador!");
        }
    }
    public static function update($dados){
        $con = Connection::getConn();
        $query = $con->prepare('UPDATE doador SET nome=:nome, email=:email, cpf=:cpf, telefone=:telefone, data_nascimento=:data_nascimento, intervalo_doacao=:intervalo_daocao, valor_doacao=:valor_doacao, forma_pagamento=:forma_pagamento, endereco=:endereco WHERE id=:id');
        $query->bindValue(":id",$dados->id,PDO::PARAM_INT);
        $query->bindValue(":nome",$dados->nome,PDO::PARAM_STR);
        $query->bindValue(":email",$dados->email,PDO::PARAM_STR);
        $query->bindValue(":cpf",$dados->cpf,PDO::PARAM_STR);
        $query->bindValue(":telefone",$dados->telefone,PDO::PARAM_STR);
        $query->bindValue(":data_nascimento",$dados->data_nascimento);
        $query->bindValue(":intervalo_doacao",$dados->intervalo_doacao,PDO::PARAM_INT);
        $query->bindValue(":valor_daocao",$dados->valor_doacao);
        $query->bindValue(":forma_pagamento",$dados->forma_pagamento,PDO::PARAM_INT);
        $query->bindValue(":endereco",$dados->endereco->id,PDO::PARAM_INT);
        $res = $query->execute();

        if($res){
            return true;
        }else{            
            throw new Exception("Erro ao atualizar dados!");
        }
    }
    public static function delete($id){
        $con = Connection::getConn();
        $query = $con->prepare("DELETE doador,endereco FROM doador INNER JOIN endereco ON endereco.id=doador.endereco WHERE id=:id");
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $res = $query->execute();

        if($res == false){
            throw new Exception("Erro ao deletar doador");
        }
    }
}