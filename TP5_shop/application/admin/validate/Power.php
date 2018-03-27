<?php

namespace app\admin\validate;
use think\Validate;

class Power extends Validate{
    protected $rule=[
//        不为空，长度在6-20范围
        'name|名称'=>'require|Length:6,20',
//        不为空，长度在6-20，两次密码输入一致
        'controller|控制器'=>'require|alpha',
         'action|方法'=>'require|alpha',           
    ];
   
};