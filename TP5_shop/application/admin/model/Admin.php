<?php
 
namespace app\admin\model;
use think\Model;

class Admin extends Model{
//    是否插入添加时间和修改时间
    protected $autoWriteTimestamp=true;
      protected $resultSetType='collection';
//    密码加密
    public function setPasswordAttr($value){
        return md5($value);
    }
    public function role(){
        return $this->belongsTo("Role","role_id","id");
    }
}