<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\Type as typeModel;


class Type extends Controller{
    

    public function index(){
       $typeModel=new typeModel();
       $list=$typeModel->select()->toArray();
       $list= $this->tree($list);
//      var_dump($list);
//      exit();
////       
//       添加页面
       $this->assign("list",$list);
        return $this->fetch();
    }
  
//    显示页面/保存数据
     public function add(){
         $typeModel=new typeModel();
       if(Request::instance()->isPost()){
//           表单提交，数据入库
           $data=Request::instance()->post();
           
           $result=$typeModel->save($data);
           if($result){
               $this->success("添加成功","admin/type/index");
           }
           else{
               $this->error("添加失败");
           }
//           var_dump($result);
       }
       else{
           
//           调取数据库中现有所有分类
           $list=$typeModel->select();
           
           $list=$this->tree($list);
//           var_dump($list);
//           exit();
           //      添加页面
           $this->assign("list",$list);
        return $this->fetch();
       }

    }
    
    public function tree($list,$pid=0,$level=1,$fuhao="")
    {
        $data=array();
        foreach($list as $k=>$v){
            if($v["pid"]==$pid){
                $v["leve1"]=$level;
                $v["name"]=$fuhao.$v["name"];
                $data[]=$v; 
//                寻找当前的顶级菜单是否存在下一级
//                $level=$level+1;
              $child=$this->tree($list,$v["id"], $level+1,$fuhao."&nbsp;&nbsp;&nbsp;&nbsp;");
//              合并数据
              $data= array_merge($data,$child);
//              var_dump($data);
            }
        }
        return $data;
    }
    
    
    
            public function delete($id){
           $typeModel=typeModel::where('id','=',$id)->delete();
        
//       删除   模板::where('字段名','操作',条件)->delete();
       if($typeModel){
           $this->success('删除成功', 'type/index');   
       }else{
           $this->success('删除失败', 'type/index'); 
       }

    }
    
        
//    修改数据
//    
              public function update($id){
         //    使用role表中的数据
             $list=typeModel::get($id);
             

           $this->assign("list",$list);
           
             return $this->fetch();
         }
    
                  public function updata(){
               $data=input("post.");
               $role=new typeModel;
                if($role->save($data,["id"=>$data["id"]])){
                    $this->success("修改成功","admin/type/index");
                }else{
                   $this->success("修改失败","admin/type/index");
                }
      

          }
                 
    
}
