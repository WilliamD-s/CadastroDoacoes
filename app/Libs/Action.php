<?php

require_once("app/Libs/Connection.php");

require_once("app/Controller/DoadorController.php");

require_once("app/Model/Cidade.php");
require_once("app/Model/Doador.php");
require_once("app/Model/Endereco.php");
require_once("app/Model/Estado.php");
require_once("app/Model/FormaPagamento.php");

class Action{
    public function start($url){

        $page = 'home';
              
        if(isset($url['page'])){
            $page = $url['page'];
        }
        
        $conteudo = file_get_contents('app/View/'.$page.'.html');
        $retorno = Action::fillTemplate($conteudo,$page.'.html');

        echo $retorno;
    }

    public static function runTask($dados){
        if(isset($dados['class']) && isset($dados['task'])){
            $controller = ucfirst($dados['class']."Controller");
            if(class_exists($controller)){

                $id = null;
                $acao = $dados['task'];

                if(isset($dados['id'])){
                    $id = $dados['id'];
                }

                call_user_func_array(array(new $controller, $acao),array('id' => $id));
            }
        }
    }

    public static function fillTemplate($dados, $pagina = "index.html"){   
        $template = file_get_contents("app/View/".$pagina);
        if(is_array($dados)){
            foreach($dados as $key=>$value){
                $template = str_replace("{{".$key."}}",$value,$template);
            }
        }else{
            $template = str_replace("{{conteudo_dinamico}}",$dados,$template);
        }
        return $template;
    }
}