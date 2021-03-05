<?php

class DoadorController{

    public function selecionarTodos(){

        $dados = array();
        $dados['nome'] = "william";
        $dados['idade'] = '23';

        $result = Action::fillTemplate($dados,'cadastrar.html');
        echo $result;
    }
}