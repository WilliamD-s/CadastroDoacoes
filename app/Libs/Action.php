<?php

require_once("app/Libs/Connection.php");

require_once("app/Controller/DoadorController.php");

require_once("app/Model/Cidade.php");
require_once("app/Model/Doador.php");
require_once("app/Model/Endereco.php");
require_once("app/Model/Estado.php");
require_once("app/Model/FormaPagamento.php");

class Action
{
    public function start($url)
    {
        $controller = "Doador";
        $metodo = "index";
        $id = null;
        if (isset($url['page'])) {
            $controller = $url['page'];
        }

        if (isset($url['metodo'])) {
            $metodo = $url['metodo'];
        }

        if (isset($url['id'])) {
            $id = $url['id'];
        }

        $controller = ucfirst($controller . 'Controller');
        call_user_func_array(array(new $controller, $metodo), array('id' => $id));
    }
}
