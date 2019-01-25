<?php
namespace app\admin\model;
use think\Model;
use think\Db;
class Generate extends Model
{
    
    
    //生成购物卡号
    function gouwu() {
        //        购物卡前八位
          $time=date("Y-m-d",time()) ;  //时间转换
          $data=str_replace('-','',$time);//str_replace删除字符串中的指定字符       
          $lit=Db::table('vae_home_number')->find();
            foreach($lit as $a){     
             $a++;
            $val=sprintf("%04d",$a);
            $val_int=Db::table('vae_home_number')->where('id',1)->update(['number' => "$val"]);
             }  
            $val=$data.$val;
          return $val;
    }
    
//    生成购物卡和密码
    function generate($money) {
         $number=$this->gouwu();
         $pwd=rand('100000','999999');//生成随机六位数字
         //
//         购物金额为动态可以设置，用户id从seesion获取
         
         $time=date("Y-m-d H:i:s",time());
         $state=0;//核销状态0:未核销；1:已核销
         
         $data=["number"=>"$number","z_money"=>"$money","password"=>"$pwd","state"=>"$state","time"=>"$time"];
         return $data;
     }
     

     

     

	
}
