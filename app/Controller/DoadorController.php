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
        if (isset(
            $_POST['nome'],
            $_POST['email'],
            $_POST['cpf'],
            $_POST['telefone'],
            $_POST['data_nascimento'],
            $_POST['intervalo_daocao'],
            $_POST['valor_doacao'],
            $_POST['forma_pagamento'],
            $_POST['uf'],
            $_POST['cidade'],
            $_POST['bairro'],
            $_POST['rua'],
            $_POST['cep']
        )) {

            $doador = new Doador();
            $endereco = new Endereco;
            
            $doador->nome = $_POST['nome'];
            $doador->email = $_POST['email'];
            $doador->cpf = $_POST['cpf'];
            $doador->telefone = $_POST['telefone'];
            $doador->data_nascimento = date("Y-m-d H:i:s", strtotime($_POST['data_nascimento']));
            $doador->intervalo_doacao = $_POST['intervalo_daocao'];
            $doador->valor_daocao = $_POST['valor_daocao'];
            $doador->forma_pagamento = $_POST['forma_pagamento'];
            $endereco->rua = $_POST['rua'];
            $endereco->bairro = $_POST['bairro'];
            $endereco->estado = $_POST['uf'];
            $endereco->cidade = $_POST['cidade'];
            $endereco->cep = $_POST['cep'];
            try {
                $doador->endereco->id = Endereco::merge($endereco);
                Doador::insert($doador);
            } catch (Exception $e) {
                echo "<script>alert(" . $e->getMessage() . ");</script>";
            }
        } else {
            echo "<script>alert('Por favor, preencha todos os campos');</script>";
        }
    }
    public function delete($id)
    {
        try {
            Doador::delete($id);
        } catch (Exception $e) {
            echo "<script>alert(" . $e->getMessage() . ");</script>";
        }
    }
}
