<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\admin\model\Generate as GenerateModel;
class Generate extends Common
{
        public function index()
    {
        return view();
    }
    
//    生成购物卡
    public function add(){

       if ($_POST['zhangshu']&&$_POST['money']){
           $zhangshu=$_POST['zhangshu'];//购物卡张数
           $money=$_POST['money'];//购物卡金额
        }
         $model = new GenerateModel; 
        $sheets=$zhangshu;//购物卡张数
        for ($x=1; $x<=$sheets; $x++) {
            $data = $model->generate($money);
            $ssl=Db::table('vae_home_shopping')->insert($data);  
        }  
        
       if($ssl){
           return json(array('code'=>200,'msg'=>'生成成功'));
       }else {
           return json(array('code'=>0,'msg'=>'生成失败'));
       }
    }
    
      public function listinfo(){
           $content=Db::table('vae_home_shopping')->select();
//          return var_dump($content);
         $this->assign('NavList', $content);
         return view();
    }
    
    
    
    
}
