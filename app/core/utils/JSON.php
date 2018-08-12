<?php

namespace PauSabe\CBCN\utils;

use PauSabe\CBCN\utils\JSON\JsonSerializable;
use PauSabe\CBCN\utils\Filter;

class JSON{

    private $filters = [];

    public function encode($data){
        //Extract data
        if($data instanceof JsonSerializable)
            $data = $data->jsonSerialize();
        //Pass filters
        foreach($this->filters as $filter){
            $data = $filter->filter($data);
        }
        //Serialize data
        return $this->_encode($data);
    }

    public function addFilter(Filter $filter){
        $this->filters[] = $filter;
    }

    private function _encode($data){
        //Extract data
        if($data instanceof JsonSerializable)
            return $this->_encode($data->jsonSerialize());
        //Serialize data
        if(is_array($data)) return $this->encodeArray($data);
        return json_encode($data);
    }

    private function encodeArray($array){
        $is_sequencial = empty($array) || array_keys($array) === range(0, count($array) -1);
        $head = $is_sequencial ? "[" : "{";
        $tail = $is_sequencial ? "]" : "}";
        $body = "";
        foreach($array as $key => $value){
            $body .= $is_sequencial ? $this->_encode($value).", " : "\"$key\": ".$this->_encode($value).", ";
        }
        $body = substr($body, 0, -2);

        return $head.$body.$tail;
    }

}
