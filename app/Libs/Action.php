<?php

require_once("app/Libs/Connection.php");
require_once("app/Libs/Tools.php");

require_once("app/Controller/DoadorController.php");

require_once("app/Model/Doador.php");
require_once("app/Model/Endereco.php");
require_once("app/Model/IntervaloDoacao.php");
require_once("app/Model/FormaPagamento.php");

class Action
{
    public function start($url)
    {
        $controller = "DoadorController";
        $metodo = "index";
        $id = null;

        if (isset($url['metodo'])) {
            $metodo = $url['metodo'];
        }

        if (isset($url['id'])) {
            $id = $url['id'];
        }
        
        call_user_func_array(array(new $controller, $metodo), array('id' => $id));
    }
}
