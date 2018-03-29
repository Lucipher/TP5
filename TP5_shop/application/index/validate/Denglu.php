<?php

namespace app\index\validate;

use think\Validate;

class Denglu extends Validate{
    protected $rule = [
        //不为空，长度在6-20范围
        'email|用户名'  =>  'require|length:6,20',
        //不为空，长度在6-20,两次密码输入一致
        'pwd|密码' =>  'require|length:6,20|confirm:pwd',

    ];
    
//    protected $message = [
//        "password.confirm" => "密码和重复密码不一致",
//        "password1.confirm" => "密码和重复密码不一致",
//        "role_id.require" => "请选择角色",
//        "role_id.number" => "参数错误",
//    ];
    
//    //验证场景
//    protected $scene = [
//        'login'  =>  ['username','password'=>"require|length:6,20"],
//        "edit" => ["password","password1","role_id"]
//    ];
}
