<?php 

class Tools{
    public static function timestampParaData($data){
        $data = DateTime::createFromFormat ( "Y-m-d H:i:s", $data);
        $data = $data->format('d/m/Y');
        return $data;
    }
    public static function timestampParaHtml($data){
        $data = DateTime::createFromFormat ( "Y-m-d H:i:s", $data);
        $data = $data->format('Y-m-d');
        return $data;
    }
}