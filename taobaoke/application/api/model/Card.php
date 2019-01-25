<?php
namespace app\api\model;
use think\Model;
use think\Session;
use think\Db;
	//登录注册验证码
class Card extends Model
{
    
         
//     购物卡核销查询
    function write($number,$pwd,$token ){
        
        
       $user_id=$this->c_token($token);
        
        $where["number"]=$number;
        $where["password"]=$pwd;
        $data=Db::table('vae_home_shopping')->where($where)->find();
        $time=date("Y-m-d H:i:s",time());
        $data_info=[ 'user_id'  =>$user_id,'number' => $number,'time'=>$time,'money'=>$data['z_money']];

        
        if($data){
            $state=Db::table('vae_home_shopping')->where('id',$data["id"])->update(['state' => '1']);
            if($state){
           $add_money=Db::table('vae_home_user')->where('id', $user_id)->setInc('balance',$data["z_money"]);
              Db::table('vae_home_shopping_record')->insert($data_info);
            return json_encode(array("code"=>200,"message"=>"核销成功","success"=>true,"data"=>"NULL"));
            }else{
            return json_encode(array("code"=>404,"message"=>"核销失败，不能重复核销","success"=>false,"data"=>"NULL"));
            }
        }else{
             return json_encode(array("code"=>404,"message"=>"核销失败","success"=>false,"data"=>"NULL"));
            }
        }
        
        
        
          function c_token($token){
         $info=Db::table('vae_home_user')->where('token',$token)->find();
         return $info["id"];
    }

        

    
     
    
}