<?php 

require_once("app/Libs/Action.php");

ob_start();
    $service = new Action();
    $service->start($_GET);
    $result = ob_get_contents();
ob_end_clean();

$pagina = file_get_contents('app/Template/base.html');
$pagina = str_replace('{{conteudo_dinamico}}',$result,$pagina);
echo $pagina;