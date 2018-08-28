<?php
namespace PauSabe\CBCN\utils\Filter;

use PauSabe\CBCN\utils as u;
use PauSabe\CBCN\service as s;

class GroupArray implements u\Filter{

    public function filter($data){
        $group_filter = new Group();//Group filter. Check namespace.
        return array_map(function($ev) use ($group_filter){
            return $group_filter->filter($ev);
        }, $data);
    }
}

