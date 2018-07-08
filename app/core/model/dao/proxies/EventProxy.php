<?php

namespace PauSabe\CBCN\model\dao\proxies;

use PauSabe\CBCN\model\dao;
use PauSabe\CBCN\model\classes\Event;
use PauSabe\CBCN\model\dao\proxies\traits;

class EventProxy extends Event{

    use traits\Place;
    use traits\Group;

}
