<?php
namespace app\api\model;
use think\Model;
use think\Session;
use think\Db;
	//首页轮播图
class Config extends Model
{
    
//    首页轮播图接口
    function listinfo(){
           $data=Db::table('vae_home_lunbo')->select();
           if($data){
                return json_encode(array("code"=>200,"message"=>"请求成功","success"=>true,"data"=>$data));
           }else{
                 return json_encode(array("code"=>404,"message"=>"请求失败","success"=>true,"data"=>"NULL"));
           }
    }
//    系统公告
    function notice(){
        $data=Db::table('vae_home_system')->where("id",1)->find();
             if($data){
                return json_encode(array("code"=>200,"message"=>"请求成功","success"=>true,"data"=>$data));
           }else{
                 return json_encode(array("code"=>404,"message"=>"请求失败","success"=>true,"data"=>"NULL"));
           }
    }
    
//    商品分类
        function sort(){
           $data=Db::table('tpt_category')->select();
           if($data){
                return json_encode(array("code"=>200,"message"=>"请求成功","success"=>true,"data"=>$data));
           }else{
                return json_encode(array("code"=>404,"message"=>"请求失败","success"=>true,"data"=>"NULL"));
           }
    }
    
    //    频道列表
        function liebiao(){
           $data=Db::table('tpt_nav')->where('type',2)->select();
           if($data){
                return json_encode(array("code"=>200,"message"=>"请求成功","success"=>true,"data"=>$data));
           }else{
                return json_encode(array("code"=>404,"message"=>"请求失败","success"=>true,"data"=>"NULL"));
           }
    }
   

}