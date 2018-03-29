<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\Product as ProductModel;
class Index extends Controller
{
    public function index()
    {       
//        商品展示
      $ProductModel=new ProductModel;
          $list = ProductModel::all();
        //查询所有数据
        $this->assign("list", $list);
//        var_dump($list);
        //获取搜索的词语
        return $this->fetch();
    }
    public function Parameter($id){
   $ProductModel = ProductModel::get($id);
    echo $ProductModel;

       return $this->redirect('details',$ProductModel);   
    }
//    public function register(){
////        dump(send_mail("1205177965@qq.com","刘赫","标题","主体"));
////       exit();
//        return $this->fetch();
//        
//    }

}
