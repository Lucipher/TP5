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

}
