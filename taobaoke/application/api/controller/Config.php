<?php
namespace app\api\controller;
use think\Controller;
use think\Session;
use think\Db;
use app\api\model\Config as ConfigMondel;
use app\api\model\User as UserMondel;
//系统配置接口
class Config extends Controller
{
//    图片列表
    public function lunbo(){
        $model=new ConfigMondel();
        $data=$model->listinfo();
        return $data;
    }
    
//    文字公告
       public function notice(){
        $model=new ConfigMondel();
        $data=$model->notice();
        return $data;
    }
    
//   商品分类
    public function sort(){
         $model=new ConfigMondel();
        $data=$model->sort();
        return $data;
    }
    
//    频道列表
    public function liebiao(){
           $model=new ConfigMondel();
        $data=$model->liebiao();
        return $data;
    }
    
}

   

