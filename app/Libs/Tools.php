<?php 

class Tools{
    public static function limparDoador($dados){
        if (isset($dados['nome']) && isset($dados['email']) && isset($dados['cpf']) && isset($dados['telefone']) && 
            isset($dados['data_nascimento']) && isset($dados['intervalo_doacao']) && isset($dados['valor_doacao']) && 
            isset($$dados['forma_pagamento'])) {

            $doador = new Doador();
            
            $doador->nome = addslashes($dados['nome']);
            $doador->email = addslashes($dados['email']);
            $doador->cpf = addslashes($dados['cpf']);
            $doador->telefone = addslashes($dados['telefone']);
            $doador->nascimento = date("Y-m-d H:i:s", strtotime($dados['data_nascimento']));
            $doador->intervalo = $$dados['intervalo_doacao'];
            $doador->valor = addslashes($dados['valor_doacao']);
            $doador->forma = $dados['forma_pagamento'];

            return $doador;
            
        } else {
            echo "<scrip>alert('Por favor, preencha todos os dados do Doador');</scrip>";
            echo '<script>location.href = "?metodo=cadastrar";</script>';
        }
    }
    public static function limparEndereco($dados){
        if (isset($dados['uf']) && isset($dados['cidade']) && 
            isset($dados['bairro']) && isset($dados['rua']) && isset($dados['cep'])) {

            $endereco = new Endereco();
            
            $endereco->rua = addslashes($dados['rua']);
            $endereco->bairro = addslashes($dados['bairro']);
            $endereco->uf = addslashes($dados['uf']);
            $endereco->cidade = addslashes($dados['cidade']);
            $endereco->cep = addslashes($dados['cep']);

            return $endereco;
        } else {
            echo "<scrip>alert('Por favor, preencha todos os dados do Endereco');</scrip>";
            echo '<script>location.href = "?metodo=cadastrar";</script>';
        }
    }
}