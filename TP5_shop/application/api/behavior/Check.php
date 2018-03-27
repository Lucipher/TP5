<?php

namespace app\admin\behavior;

use think\Request;
use think\Cookie;
use traits\controller\Jump;
class Check{
    use Jump;
    public function run(&$params){
        //假如控制器为admin，方法为index，跳转到login/index
        $request = Request::instance();
        
        $controller = strtolower($request->controller());
        $action = strtolower($request->action());
        //排除的控制器和方法
        $paichu = array(
            "login"=>["index","check","userout"],
        );
        
        //判断当前的控制器是否在排除排除的控制器内
        if(isset($paichu[$controller])){
            //控制器对应的方法和当前的方法能否匹配
            $actions = $paichu[$controller];
            if(in_array($action, $actions)){
                return;//终止方法的执行，但是和整体程序没有关系
            }
        }
        
        //判断是否登录，没有登录进入登录页面
        if(!Cookie::has("admin_id")){
            
            redirect("admin/login/index")->send();
            die();//终止所有程序继续运行
        }else{
            //权限验证排除部分
//            $powerPaichu = array(
//                "index"=>["index"],
//            );
//
//            //判断当前的控制器是否在排除排除的控制器内
//            if(isset($powerPaichu[$controller])){
//                //控制器对应的方法和当前的方法能否匹配
//                $actions = $powerPaichu[$controller];
//                if(in_array($action, $actions)){
//                    return;//终止方法的执行，但是和整体程序没有关系
//                }
//            } 
            //权限判断
//            $power = session("power");
//            $isPower = false;
//            foreach($power as $k=>$v){
//                if($v["controller"] == $controller && $v["action"] == $action){
//                    $isPower = true;
//                    break;
//                }
//            }
//            if($isPower == false){
//                $this->error("没有权限");
//                die();
//            }
            
        }
        
//        if(strtolower($controller) == "admin" && strtolower($action) == "index"){
//            echo 123;
//            redirect("admin/login/index")->send();
//            die();
//        }else{
//            echo 456;
//        }
        
    }
}
