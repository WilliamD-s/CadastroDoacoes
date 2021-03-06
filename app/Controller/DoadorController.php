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
            $doador->forma_pagamento = FormaPagamento::selecionarPorId($doador->id_pagamento);
            $doador->intervalo_doacao = IntervaloDoacao::selecionarPorId($doador->id_intervalo);
            include('app/View/visualizar.php');
        } catch (Exception $e) {
            echo "<script>alert('" . $e->getMessage() . "');</script>";
        }
    }

    public function editar($id)
    {
        $intervalos = array();
        $formas = array();
        try {
            $intervalos = IntervaloDoacao::selecionarTodos();
            $formas = FormaPagamento::selecionarTodas();
            $doador = Doador::selecionarPorId($id);
            $doador->endereco = Endereco::selecionarPorId($doador->id_endereco);
            $doador->forma_pagamento = FormaPagamento::selecionarPorId($doador->id_pagamento);
            $doador->intervalo_doacao = IntervaloDoacao::selecionarPorId($doador->id_intervalo);
            include('app/View/editar.php');
        } catch (Exception $e) {
            echo "<script>alert('" . $e->getMessage() . "');</script>";
        }
    }
    public function update()
    {
        try {
            $doador = Doador::tratarDoador($_POST);
            $endereco = Endereco::tratarEndereco($_POST);
            
            $doador->id_endereco = Endereco::merge($endereco);
            Doador::merge($doador);
            echo "<script>location.href = '?metodo=index';</script>";
        } catch (Exception $e) {
            echo "<script>alert('".$e->getMessage()."');</script>";
            echo "<script>location.href = '?metodo=editar&id=".$doador->id."';</script>";
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
        try {
            $doador = Doador::tratarDoador($_POST);
            $endereco = Endereco::tratarEndereco($_POST);
            
            $doador->id_endereco = Endereco::merge($endereco);
            Doador::merge($doador);
            echo "<script>location.href = '?metodo=index';</script>";
        } catch (Exception $e) {
            Endereco::delete($doador->id_endereco);
            echo "<script>alert('".$e->getMessage()."');</script>";
            echo "<script>location.href = '?metodo=cadastrar';</script>";
        }
    }
    public function vizualizar($id){
        $doador = Doador::selecionarPorId($id);
        include('app/View/visualizar.php');
    }
    public function excluir($id)
    {
        try {
            $doador = Doador::selecionarPorId($id);
            Endereco::delete($doador->id_endereco);
            Doador::delete($id);            
            echo "<script>location.href = '?metodo=index';</script>";
        } catch (Exception $e) {
            echo "<scrip>alert(" . $e->getMessage() . ");</scrip>";
        }
    }
}
