<?php

namespace app\api\controller;

use think\Controller;
use app\api\model\Product as ProductModel;

class Product extends Controller{
    





    /**
     * 获取商品列表
     * @param type $type:hot(最热) new（最新） list（获取列表）
     * @param type $num：获取条数
     * @param type $typeId：分类id，默认为0
     * @param type $page：页数。默认1
     */
    public function productlist($type,$num,$typeId=0, $page=1){
        
//        1.验证数据
        if(!in_array($type, ['hot','new','list'])){
            return ["status"=>100,"data"=>[],"msg"=>"请求参数错误"];
        }
        
        $ProductModel = new ProductModel();
        //公共where条件
        $ProductModel->where(["quantity"=>[">",0], "is_sale"=>"1"]);
        
        //最热的
        if($type == "hot"){
            $ProductModel->order("sort desc");
        }
        //最新的
        if($type == "new"){
            $ProductModel->order("id desc");
        }
        //列表
        if($type == "list"){
            $ProductModel->where("category_id",$typeId);
        }
        
        //查询
        $list = $ProductModel->paginate($num);
        var_dump($list);
        
//        2.查询数据
        return ["status"=>200,"data"=>$list,"msg"=>""];
        
    }
}