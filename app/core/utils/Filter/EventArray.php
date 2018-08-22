<?php
namespace PauSabe\CBCN\utils\Filter;

use PauSabe\CBCN\utils as u;
use PauSabe\CBCN\service as s;

class EventArray implements u\Filter{

    public function filter($data){
        $event_filter = new Event();//Event filter. Check namespace.
        return array_map(function($ev) use ($event_filter){
            return $event_filter->filter($ev);
        }, $data);
    }
}
