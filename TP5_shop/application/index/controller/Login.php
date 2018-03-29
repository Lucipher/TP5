<?php
/**
 * 登录控制器
 */
namespace app\index\controller;

use think\Controller;
use app\index\model\User;
use think\Loader;
use think\Cookie;



class Login extends Controller{
    
//    登录
    public function login(){
        
        return $this->fetch();
    }
    
    
//    注册
      public function register(){
//        dump(send_mail("1205177965@qq.com","刘赫","标题","主体"));
//       exit();
        return $this->fetch();
        
    }
    
    
    
    
    
        /**
     * 验证登录用户信息
     */
    public function check_check() {
       
        $email = input("post.email", "");

        $pwd = input("post.pwd", "");

        $data = array("email" => $email, "pwd" => $pwd);

        $validate = Loader::validate('Denglu');

//       自动验证
        if (!$validate->check($data)) {
            $this->error($validate->getError());
        } else {

            $info = User::where($data)->find();
            if ($info) {
                //需要将用户存储起来(session,cookie)
                Cookie::set("id", $info->id, ['expire' => 3600]);
                Cookie::set("email", $info->email, ['expire' => 3600]);
                $this->success("登录成功", "index/login/login");
            } else {
                $this->error("登录失败");
            }
        }
    }

    /**
     * 验证注册用户信息
     */
    public function check(){
        $email= input("post.email", "");
        $name = input("post.name", "");
        $pwd=input("post.pwd", "");
        $pwd1=input("post.pwd1", "");
        $data = array("email"=>$email,"name"=>$name,"pwd"=>$pwd,"pwd1"=>$pwd1);

        $validate = Loader::validate('Register');
     
//       自动验证
  if(!$validate->check($data)){
      $this->error($validate->getError());
  }else{
      $data["statue"]=1;
      $User=new User;
              if($User->except("pwd1")->save($data)){
           
            $this->success("注册成功","index/login/login");
        }else{
            $this->error("注册失败");
        }
    }
    }
    
 
}
