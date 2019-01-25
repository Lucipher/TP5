<?php
namespace app\api\controller;
use think\Controller;
use think\Session;
use think\Db;
use app\api\model\Card as CardMondel;
use app\api\model\User as UserMondel;
//购物卡核销
class Card extends Controller
{
  
    //    获取充值卡账号密码进行核销
    public function write(){
          $token=$_GET['token'];
         $model = new UserMondel;
          $token1_yz = $model->gg_token($token);
//          return $token123;
        if($token1_yz==90001){
             if($_GET['number']&&$_GET['pwd']){
          $number=$_GET['number']; // 充值卡账号
          $pwd=$_GET['pwd'];   // 获取密码
        }
         $model = new CardMondel;
          $lit = $model->write( trim($number), trim($pwd),trim($token) );
          return $lit;
        }else{
            return json_encode(array("code"=>404,"message"=>"登录过期，请重新登录","success"=>false,"data"=>$token1_yz));
        }
        
        
        
 
    }


}

   

