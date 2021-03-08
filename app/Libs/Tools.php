<?php 

class Tools{
    public static function route($de = "home", $para = "home"){
        echo "<script>location.href = location.href.replace('cadastrar','index');</script>";
    }
}