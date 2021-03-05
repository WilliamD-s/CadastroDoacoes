<?php 

require_once("app/Libs/Action.php");

ob_start();
    $service = new Action();
    $service->start($_GET);
    $result = ob_get_contents();
ob_end_clean();

echo $result;