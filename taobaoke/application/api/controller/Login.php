<?php
namespace app\api\controller;
use think\Controller;
use think\Session;
use think\Db;
use app\api\model\User as UserMondel;
//登录注册验证码

class Login extends Controller
{
  
//    登录接口
    public function login()
    {
        if($_GET['user']&&$_GET['pwd']){
        $user=$_GET['user']; // 获取账号
        $pwd=$_GET['pwd']; 
        }
        else {
            return json_encode(array("code"=>404,"message"=>"请求失败,参数不完整","success"=>false,"data"=>"NULL"));
        }
//          调用model做验证
        $model = new UserMondel;
        $uid = $model->login( trim($user), trim($pwd));
        return $uid;
    }

//    发送验证码
    public function add_code(){
        $code["code"]="1234";
         return json_encode(array("code"=>200,"message"=>"请求成功","success"=>true,"data"=>$code));
    }
    
//    核实验证码
    public function code(){
        if($_GET['user']&&$_GET['code']){
         $user=$_GET['user']; // 获取用户名
        $code_yz=$_GET['code'];//获取验证码
        }else{
              return json_encode(array("code"=>404,"message"=>"账号与密码必须输入","success"=>false,"data"=>"NULL"));
        }
        $model = new UserMondel;
        $yanzheng = $model->code( trim($user), trim($code_yz));
        return $yanzheng;
    }



//   注册接口
    public function register()
    {
        if($_GET['user']&&$_GET['pwd']){
           $user=$_GET['user']; // 获取用户名
           $pwd=$_GET['pwd'];   // 获取密码
        }else{
            return json_encode(array("code"=>404,"message"=>"账号与密码必须输入","success"=>false,"data"=>"NULL"));
        }
//          调用model做验证
        $model = new UserMondel;
        $uid = $model->register( trim($user), trim($pwd) );
        return $uid;
    }

//   登录红包接口
    public function login_red(){
          $token=$_GET['token'];
               $model = new UserMondel;
          $token1_yz = $model->gg_token($token);
          if($token1_yz==90001){
          $login_red = $model->login_red($token);
         return $login_red;
          }else{
            return json_encode(array("code"=>404,"message"=>"登录过期，请重新登录","success"=>false,"data"=>$token1_yz));
          }
  
    }
//获取红包金额
        public function red_money(){
            $model = new UserMondel;
          $red["money"] = $model->qiandao_red();
          return json_encode(array("code"=>200,"message"=>"请求成功","success"=>true,"data"=>$red));
        }
    

    
//    修改密码
    public function modify(){  
           $token=$_GET['token'];
            $model = new UserMondel;
          $token1_yz = $model->gg_token($token);
        
          if($token1_yz==90001){
            $pwd=$_GET['pwd']; // 获取旧密码
           $pwd_xin=$_GET['pwd_xin'];   // 获取新密码
               $model = new UserMondel;
            $uid = $model->modify( trim($pwd), trim($pwd_xin),trim($token) );
            return $uid;
          }else{
             return json_encode(array("code"=>404,"message"=>"登录过期，请重新登录","success"=>false,"data"=>$token1_yz));
          }
    }
    
    
    

    
////    重置密码
//    public function reset(){
//          $user=$_GET['user'];//获取手机号
//           $code=$_GET['code']; // 获取验证码
//           if($code="1234"){      
//            return json_encode(array("code"=>200,"message"=>"验证码","success"=>true,"data"=>"$code"));
//           }else{
//           return json_encode(array("code"=>404,"message"=>"验证码错误","success"=>false,"data"=>"NULL"));
//           }
//    }
//    
//    public function cz_reset(){
//           $code=$_GET['pwd']; // 新密码
//           
//                
//    }




//    修改个人信息

    public function edit_info(){
        $user=$_GET['image']; // 获取头像
        $pwd=$_GET['nickname'];   // 获取昵称
    }



}

   

