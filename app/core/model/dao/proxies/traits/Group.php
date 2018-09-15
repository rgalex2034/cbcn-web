<?php

namespace PauSabe\CBCN\model\dao\proxies\traits;

use PauSabe\CBCN\model\dao;
use PauSabe\CBCN\model\classes;

trait Group{

    private $is_group_loaded = false;
    private $group_id;

    public function setGroupId($id){
        if(isset($this->group_id) || $this->is_group_loaded){
            throw new \Exception("Unable to change a write once property.");
        }
        $this->group_id = $id;
        if(is_null($this->group_id)) $this->is_group_loaded = true;
    }

    public function setGroup(classes\Group $group = null){
        $this->is_group_loaded = true;
        return parent::setGroup($group);
    }

    public function getGroup(){
        if(!$this->is_group_loaded){
            $group_dao = new dao\GroupDAO();
            if($group = $group_dao->read($this->group_id)){
                $this->group = $group;
            }
            $this->is_group_loaded = true;
        }
        return parent::getGroup();
    }
}
