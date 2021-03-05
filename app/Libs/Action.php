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
        
        if(isset($url['class']) && isset($url['metodo'])){

            $controller = ucfirst($url['class']."Controller");
            
            if(class_exists($controller)){

                $id = null;
                $acao = $url['metodo'];

                if(isset($url['id'])){
                    $id = $url['id'];
                }

                call_user_func_array(array(new $controller, $acao),array('id' => $id));
            }
        }
        
        if(isset($url['page'])){
            $page = $url['page'];
            $base = file_get_contents('app/Template/index.html');
            $conteudo = file_get_contents('app/View/'.$page.'.html');
            $retorno = Action::fillTemplate($conteudo,'home.html');

            echo $retorno;
        }
        

        
    }
    public static function fillTemplate($dados, $template = "app/Template/index.html"){
        
        $template = file_get_contents("app/View/".$template);
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