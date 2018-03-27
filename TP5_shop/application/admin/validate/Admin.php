<?php

namespace app\admin\validate;

use think\Validate;

class Admin extends Validate{
    protected $rule = [
        //不为空，长度在6-20范围
        'username|用户名'  =>  'require|alphaNum|length:6,20',
        //不为空，长度在6-20,两次密码输入一致
        'password|密码' =>  'require|length:6,20|confirm:password1',
        'password1|重复密码' =>  'require|length:6,20|confirm:password',
        //不为空
        'role_id' =>  'require|number',
    ];
    
    protected $message = [
        "password.confirm" => "密码和重复密码不一致",
        "password1.confirm" => "密码和重复密码不一致",
        "role_id.require" => "请选择角色",
        "role_id.number" => "参数错误",
    ];
    
    //验证场景
    protected $scene = [
        'login'  =>  ['username','password'=>"require|length:6,20"],
        "edit" => ["password","password1","role_id"]
    ];
}
