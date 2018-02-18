<?php

namespace PauSabe\CBCN\utils;

use PauSabe\CBCN\utils\JSON\JsonSerializable;

class JSON{

    public static function encode($data){
        if($data instanceof JsonSerializable)
            return self::encode($data->jsonSerialize());
        if(is_array($data)) return self::encodeArray($data);
        return json_encode($data);
    }

    private static function encodeArray($array){
        $is_sequencial = empty($array) || array_keys($array) === range(0, count($array) -1);
        $head = $is_sequencial ? "[" : "{";
        $tail = $is_sequencial ? "]" : "}";
        $body = "";
        foreach($array as $key => $value){
            $body .= $is_sequencial ? self::encode($value).", " : "\"$key\": ".self::encode($value).", ";
        }
        $body = substr($body, 0, -2);

        return $head.$body.$tail;
    }

}
