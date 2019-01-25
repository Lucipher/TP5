<?php
namespace app\api\controller;
use think\Controller;
use think\Session;
use think\Db;
use app\api\model\Sign as SignMondel;
use app\api\model\User as UserMondel;
//签到
class Sign extends Controller
{
  
    public function sign(){

        
         $token=$_GET['token'];
         $model = new UserMondel;
          $token1_yz = $model->gg_token($token);
          
          if($token1_yz!=90001){
                return json_encode(array("code"=>404,"message"=>"登录过期，请重新登录","success"=>false,"data"=>$token1_yz));
          }

          $model1 = new SignMondel;
          $sign_money = $model1->Sign($token);
          if($sign_money){
              $add_sign=$model1->add_sign($token);
             return json_encode(array("code"=>200,"message"=>"签到成功","success"=>true,"data"=>$token1_yz));
          }else{
             return json_encode(array("code"=>404,"message"=>"签到失败","success"=>false,"data"=>"NULL"));
          }
     
   
          
    }
    

}

   

