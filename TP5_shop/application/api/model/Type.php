<?php

namespace app\api\model;

use think\Model;

class Type extends Model{
    
     protected $resultSetType = 'collection';
    
    public function menuList($data, $pid = 0){
        $list = array();
        foreach($data as $dk=>$dv){
            if($dv["pid"] == $pid){
                $dv["child"] = $this->menuList($data, $dv["id"]);
                $list[] = $dv;
            }
        }
        return $list;
    }
}

