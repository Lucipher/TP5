<?php

namespace app\index\validate;

use think\Validate;

class Register extends Validate{
    protected $rule = [
        'name|用户名'  =>  'require|alphaNum|length:6,20',
        //不为空，长度在6-20范围
        'email|Email'  =>  'length:6,20',
        //不为空，长度在6-20,两次密码输入一致
        'pwd|密码' =>  'require|length:6,20|confirm:pwd',
        'pwd1|重复密码' =>  'require|length:6,20|confirm:pwd1',
        //不为空

    ];
    
    protected $message = [
        "password.confirm" => "密码和重复密码不一致",
        "password1.confirm" => "密码和重复密码不一致",

        "role_id.number" => "参数错误",
    ];
    
//    //验证场景
//    protected $scene = [
//        'login'  =>  ['username','password'=>"require|length:6,20"],
//        "edit" => ["password","password1","role_id"]
//    ];
}
