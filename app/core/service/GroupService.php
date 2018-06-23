<?php

namespace PauSabe\CBCN\service;

use PauSabe\CBCN\model\dao as d;
use PauSabe\CBCN\model\classes as c;

class GroupService{

    public static function create($name, $place_id = null, $description = null,
                                $url_image = null, $contact_email = null,
                                $district = null){
        $group = new c\Group($name, null, $description, $url_image, $contact_email, $district);

        if(!is_null($place_id)){
            $pl_dao = new d\PlaceDAO();
            $place = $pl_dao->read($place_id);
            $group->setPlace($place);
        }

        $gr_dao = new d\GroupDAO();
        $gr_dao->create($group);

        return $group->getId();
    }

}
