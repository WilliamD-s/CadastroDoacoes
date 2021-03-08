<?php

class DoadorController
{
    public function index()
    {
        $doadores = array();
        try {
            $doadores = Doador::selecionarTodos();
            include('app/View/home.php');
        } catch (Exception $e) {
            echo "<script>alert('" . $e->getMessage() . "')</script>";
        }
    }
    public function visualizar($id)
    {
        try {
            $doador = Doador::selecionarPorId($id);
            $doador->endereco = Endereco::selecionarPorId($doador->endereco);
            $doador->forma_pagamento = FormaPagamento::selecionarPorId($doador->forma_pagamento);
            $doador->intervalo_doacao = IntervaloDoacao::selecionarPorId($doador->intervalo_doacao);
            include('app/View/visualizar.php');
        } catch (Exception $e) {
            echo "<script>alert('" . $e->getMessage() . "');</script>";
        }
    }

    public function cadastrar()
    {
        $intervalos = array();
        $formas = array();
        try{
            $intervalos = IntervaloDoacao::selecionarTodos();
            $formas = FormaPagamento::selecionarTodas();
        }catch(Exception $e){
            echo "<script>alert('" . $e->getMessage() . "');</script>";
        }
        include('app/View/cadastrar.php');
    }
    public function insert()
    {
        if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['cpf']) && isset($_POST['telefone']) && 
            isset($_POST['data_nascimento']) && isset($_POST['intervalo_doacao']) && isset($_POST['valor_doacao']) && 
            isset($_POST['forma_pagamento']) && isset($_POST['uf']) && isset($_POST['cidade']) && 
            isset($_POST['bairro']) && isset($_POST['rua']) && isset($_POST['cep'])) {

            $doador = new Doador();
            $endereco = new Endereco();
            
            $doador->nome = addslashes($_POST['nome']);
            $doador->email = addslashes($_POST['email']);
            $doador->cpf = addslashes($_POST['cpf']);
            $doador->telefone = addslashes($_POST['telefone']);
            $doador->nascimento = date("Y-m-d H:i:s", strtotime($_POST['data_nascimento']));
            $doador->intervalo = $_POST['intervalo_doacao'];
            $doador->valor = addslashes($_POST['valor_doacao']);
            $doador->forma = $_POST['forma_pagamento'];
            $endereco->rua = addslashes($_POST['rua']);
            $endereco->bairro = addslashes($_POST['bairro']);
            $endereco->uf = addslashes($_POST['uf']);
            $endereco->cidade = addslashes($_POST['cidade']);
            $endereco->cep = addslashes($_POST['cep']);
            try {
                $doador->id_endereco = Endereco::merge($endereco);
                Doador::insert($doador);
                echo "<script>location.href = '?metodo=index';</script>";
            } catch (Exception $e) {
                echo "<script>alert('".$e->getMessage()."');</script>";
            }
        } else {
            echo "<scrip>alert('Por favor, preencha todos os campos');</scrip>";
            echo '<script>location.href = "?metodo=cadastrar";</script>';
        }
    }
    public function vizualizar($id){
        $doador = Doador::selecionarPorId($id);
        include('app/View/visualizar.php');
    }
    public function excluir($id)
    {
        try {
            Doador::delete($id);            
            echo "<script>location.href = '?metodo=index';</script>";
        } catch (Exception $e) {
            echo "<scrip>alert(" . $e->getMessage() . ");</scrip>";
        }
    }
}
