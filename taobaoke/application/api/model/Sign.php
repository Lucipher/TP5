<?php
namespace app\api\model;
use think\Model;
use think\Session;
use think\Db;
//签到
class Sign extends Model
{

//    签到  增加购物余额
        function sign($token){
       $qiandao_money= $this->qiandao_add();//签到赠送的金额，需要配置成系统设置
         $user_id=$this->c_token($token);
        $sign_money=Db::table('vae_home_user')->where('id', $user_id)->setInc('balance', $qiandao_money);
        return $sign_money;
    }
    
    
//    给签到表增加数据
    function add_sign($token){
         $user_id=$this->c_token($token);
        $time=date("Y-m-d H:i:s",time());
        $data = ['user_id'  =>"$user_id",'time' => "$time"];
        $add_sign=Db::table('vae_home_sign')->insert($data); 
        return $add_sign;
    }
    
//   系统配置签到赠送金额
        function qiandao_add(){
        $qiandao_add=Db::table('vae_home_system')->where("id",2)->find();
         return $qiandao_add['setup'];
    }
    
       //        用token获取用户信息
        function c_token($token){
         $info=Db::table('vae_home_user')->where('token',$token)->find();
         return $info["id"];
    }

    
    
}