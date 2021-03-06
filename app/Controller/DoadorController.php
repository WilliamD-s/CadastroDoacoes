<?php

class DoadorController{

    public static function exibirDoadores(){
        try{
            return Doador::selecionarTodos();
        }catch(Exception $e){
            echo "<script>alert('".$e->getMessage()."')</script>";
        }
    }

    public function index(){
        include('app/View/home.php');
    }

    public function cadastrar(){
        include('app/View/cadastrar.php');
    }
}