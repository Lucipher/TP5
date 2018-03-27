<?php
/**
 * 登录控制器
 */
namespace app\admin\controller;

use think\Controller;
use app\admin\model\Admin;
use think\Cookie;
use think\Loader;
use think\Db;
use app\admin\model\Power;


class Login extends Controller{
    
    
    public function index(){
        return $this->fetch();
    }
    
    /**
     * 验证用户信息
     */
    public function check(){
        $username = input("post.username", "");
        $pwd = input("post.password", "");
     
        $data = array("username"=>$username,"password"=>$pwd);
//        var_dump($data);
//        exit();
        $validate = Loader::validate('Admin');
     
//       自动验证
        if (!$validate->scene("login")->check($data)) {
            $this->error($validate->getError());
        }
        
        $info = Admin::where($data)->find();
//   var_dump($info);
//            exit();
        if($info){
            //需要将用户存储起来(session,cookie)
            Cookie::set("admin_id", $info->id, ['expire'=>3600]);
            Cookie::set("admin_name", $info->username, ['expire'=>3600]);
            
            //当前用户所拥有的权限
            $checkList = Db::name("role_power")->field("power_id")->where("role_id",$info->role_id)->select();
         
            
            
            
            if($checkList != null){
                $powerStr = array();
                foreach($checkList as $k=>$v){
                    $powerStr[] = $v["power_id"];
                }
                 //获取权限对应的信息
                $power = new Power();

                $powerList = $power->where(["id"=>["in", implode(",", $powerStr)]])->select()->toArray();
                session("power", $powerList);
            }else{
                session("power", null);
            }
           
            $this->success("登录成功","admin/admin/index");
        }else{
            $this->error("登录失败");
        }
    }
    
    /**
     * 退出
     */
    public function useout(){
        Cookie::delete("admin_id");
        Cookie::delete("admin_name");
        $this->redirect("admin/login/index");
    }
}
