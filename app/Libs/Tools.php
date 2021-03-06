<?php 

class Tools{
    public static function route($page = 'home'){
        echo "<script>location.href = location.href.replace('page',".$page.");</script>";
    }
}