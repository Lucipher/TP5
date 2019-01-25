<?php
namespace app\api\model;
use think\Model;
use think\Session;
use think\Db;
	//登录注册验证码
class User extends Model
{
    
//    登录时获取token
     function settoken(){
       $str = md5(uniqid(md5(microtime(true)),true));  //生成一个不会重复的字符串
       $str = sha1($str);  //加密
       return $str;
     }
     
     
     //    登录
    public function login($user,$pwd) {
        $where["username"]=$user;
        $where["password"]=md5($pwd);
        $denglu=Db::table('vae_home_user')->where($where)->find();   
                   //        获取token
       $denglu["token"] =$this->settoken();
        $denglu["time_out"] =strtotime("+7 days"); 
//         return var_dump($denglu);
        if($denglu["id"]!=null){
//            将token存储到数据库
         $update= Db::table('vae_home_user')->where('id',$denglu['id'])->update(['token' => $denglu["token"],'time_out'=>$denglu["time_out"]]); 
         
          return json_encode(array("code"=>200,"message"=>"登录成功","success"=>true,"data"=>$denglu));
        }else {
           return json_encode(array("code"=>404,"message"=>"账号或密码不正确","success"=>false,"data"=>"NULL"));
        }

    }
    
    
    
    //验证验证码
        function code( $user,$code_yz ) {
        $zhuce=Db::table('vae_home_user')->where('username',$user)->find();
        if($zhuce!=null){
            return json_encode(array("code"=>404,"message"=>"账号已存在","success"=>false,"data"=>"NULL"));
        }else if(!preg_match("/^1[345678]{1}\d{9}$/",$user)){
            return json_encode(array("code"=>404,"message"=>"账号格式不正确","success"=>false,"data"=>"NULL"));
        }else if($code_yz!="1234"){
            return json_encode(array("code"=>404,"message"=>"验证码错误","success"=>false,"data"=>$code_yz));
        }else{
            return json_encode(array("code"=>200,"message"=>"验证通过","success"=>true,"data"=>$code_yz));
        }
    }
//        用token获取用户信息
         function c_token($token){
         $info=Db::table('vae_home_user')->where('token',$token)->find();
         return $info["id"];
    }
    
    
    
    

//领取红包
    function login_red($token){

        $user_id=$this->c_token($token);
        $red=$this->qiandao_red();
         $zhuce=Db::table('vae_home_user')->where('id',$user_id)->find();  
        $login_red= Db::table('vae_home_user')->where('id', $user_id)->update(['state' => '1']);
        
        $red_money["money"]=$this->qiandao_red();
      
        if($login_red){
            $sign_money=Db::table('vae_home_user')->where('id', $user_id)->setInc('balance', $red);
            return json_encode(array("code"=>200,"message"=>"领取成功","success"=>true,"data"=>$red_money));
        }else{
            return json_encode(array("code"=>404,"message"=>"领取失败","success"=>false,"data"=>$login_red));
        }
    }
    //查询签到红包金额
        function qiandao_red(){
        $qiandao_red=Db::table('vae_home_system')->where("id",3)->find();
        return $qiandao_red['setup'];
    }
    
    
    //      注册
        function register( $user,$pwd ) {
        $zhuce=Db::table('vae_home_user')->where('username',$user)->find();

        if($zhuce!=null){
            return json_encode(array("code"=>404,"message"=>"账号已存在","success"=>false,"data"=>"NULL"));
        }else if(!preg_match("/^1[345678]{1}\d{9}$/",$user)){
            return json_encode(array("code"=>404,"message"=>"账号格式不正确","success"=>false,"data"=>"NULL"));
        }else if(!preg_match("/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,10}$/",$pwd)){
            return json_encode(array("code"=>404,"message"=>"密码格式不正确,密码由6-15位字母和数字组成","success"=>false,"data"=>"NULL"));
        }else{
            $pwd=md5($pwd);
            $time=date("Y-m-d H:i:s",time());
            $data=[ 'username'  =>"$user",'password' => "$pwd",'time'=>"$time",'state'=>'0'];
            $zhuce=Db::table('vae_home_user')->insert($data);
            if($zhuce){
           return json_encode(array("code"=>200,"message"=>"注册成功","success"=>true,"data"=>$zhuce));
            }else{
           return json_encode(array("code"=>404,"message"=>"注册失败","success"=>false,"data"=>$zhuce));
          }


        }
    }
    
    
    
    
    
//    修改密码
        function modify($pwd,$pwd_xin,$token){  
            $user_id=$this->c_token($token);
              $zhuce=Db::table('vae_home_user')->where('id',$user_id)->find();  
              if(!preg_match("/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,10}$/",$pwd)){
                    return json_encode(array("code"=>404,"message"=>"密码格式不正确,6-15为字母和数字组成","success"=>false,"data"=>"NULL"));
              }
//              return $pwd."拉啦啦啦".$zhuce["password"];
//           return json_encode(array("code"=>404,"message"=>'$pwd."拉啦啦啦".$zhuce["password"]',"success"=>false,"data"=>"NULL"));
              $pwd1=md5($pwd);
 
              if($pwd1==$zhuce["password"]){
                  $pwd_xin1=md5($pwd_xin);
                    $update= Db::table('vae_home_user')->where('id', $user_id)->update(['password' => $pwd_xin1]);
                if($update){
                    return json_encode(array("code"=>200,"message"=>"修改成功","success"=>true,"data"=>$update));
                }else{
                    return json_encode(array("code"=>404,"message"=>"修改失败","success"=>false,"data"=>"NULL"));
                }
              }else{
//                   return json_encode(array("code"=>404,"message"=>$zhuce['password'].'啦啦啦'.$pwd1,"success"=>false,"data"=>"NULL"));
               return json_encode(array("code"=>404,"message"=>"修改失败,旧密码错误","success"=>false,"data"=>"NULL"));
              }
   
    }
    

            
    
    
//        function reset($user,$pwd){
//        $info=Db::table('vae_home_user')->where('username',$user)->find();  
//        $zhuce=Db::table('vae_home_user')->where('id',$info["id"])->find();  
//            if(!preg_match("/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,10}$/",$pwd)){
//                    return json_encode(array("code"=>404,"message"=>"密码格式不正确,6-15为字母和数字组成","success"=>false,"data"=>"NULL"));
//              }else{
//                  $pwd1=md5($pwd);
//                   $update= Db::name('home_user')->where('id', $user_id)->update(['password' => $pwd1]);
//                   return $update;
//              }
//    }
//    
    
//    各个接口需要调用的token接口
        function gg_token($token){
         $tokencheck = $this->yz_token($token);
         return $tokencheck;
    }


//    token验证
        function yz_token($token){
             $where["time_out"]=$token;

        $res=Db::table('vae_home_user')->where('token',$token)->find();
//             $res = db::getOneForFields($table, 'time_out', 'token1 = ?', array($token));
//            return var_dump($res);
        if (!empty($res)) {

            if (time() - $res['time_out'] > 0) {
              return 90003; //token长时间未使用而过期，需重新登陆
            }
               $new_time_out=time()+604800;//604800是七天
        
           $update= Db::table('vae_home_user')->where('token', $token)->update(['time_out' => $new_time_out]);

//         if (db::setWhere($table, array('time_out' => $new_time_out), 'token1 = ?', array($token))) {
          if($update){
             return 90001;  //token验证成功，time_out刷新成功，可以获取接口信息
                   }   
          }         

        return 90002;  //token错误验证失败
    }
    
    
    
    
    
    
    
     
    
}