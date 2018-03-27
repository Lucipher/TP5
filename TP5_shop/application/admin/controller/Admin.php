<?php

namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\model\Role;
use app\admin\model\Admin as adminModel;
use think\Loader;
use think\Paginator;
class Admin extends Controller{
//    管理员列表
        

     
    
//    管理员管理
      public function index(){
            
          $search_username=input("get.search_username","");
          $search_role=input("get.search_role",0);
          $adminModel=new adminModel();
//          存在where条件
//          第一部分：先连接where条件
          if($search_username!=""){
              $adminModel->where("username","like","%{$search_username}%");
          }
//          model中，添加一些其他静态方法，但是DB数据库中学到所有方法，都是用于model
//          在连接
          if($search_role!=0){
              $adminModel->where("role_id",$search_role);
          }
          $list=$adminModel->paginate(2,false,[
//              在分页的url地址上加上其他传参
              'query'=>["search_username"=>$search_username]
          ]);
          $roleList=Role::all();
          $this->assign("list",$list);
          $this->assign("role",$roleList);
          $this->assign("search_role",$search_role);
          $this->assign("search_username",$search_username);
          return $this->fetch();                
       }
         public function add(){
         //    使用role表中的数据
             $list=Role::all();
//             var_dump($list);
        $this->assign("role",$list);
             return $this->fetch();
         }
         
//         后台数据插入数据库
         
    public function insert(){
      
//        获取数据
        $data=input("post.");
//        加载验证规则
        $validate=Loader::validate('Admin');
        if(!$validate->check($data)){
           $this->error($validate->getError());
        }else{
                $adminModel=new adminModel;
                if($adminModel->except("password1")->save($data)){
//                    except("password1")排除字段
                    $this->success("添加成功","admin/admin/index");
                }else{
                   $this->success("添加成功");
                }
        }

    }
    
    //          删除数据
      public function delete($id){

        $new_id=adminModel::where('id','=',$id)->delete();
        
//       删除   模板::where('字段名','操作',条件)->delete();
       if($new_id){
           $this->success('删除成功', 'admin/index');   
       }else{
           $this->success('删除失败', 'admin/index'); 
       }

    }
    
    
//    修改数据
//    
              public function update($id){
         //    使用role表中的数据
             $list=adminModel::get($id);
             $role=new Role();
             $data=$role->field("name,id")->select();
             
              $this->assign("data",$data);
           $this->assign("list",$list);
           
             return $this->fetch();
         }
    
                 

         
         
         
         public function updata(){
//         $adminModel = new adminModel();
         $data=input("post.");
//        var_dump($data);
         
         
//         $rel=$adminModel->isUpdate(true)->save($data);
       //  var_dump($Admin);
       //  

           $validate=Loader::validate('Admin');
        if(!$validate->check($data)){
           $this->error($validate->getError());
        }else{
                $adminModel=new adminModel;
                if($adminModel->except("password1")->save($data,["id"=>$data["id"]])){
//                    except("password1")排除字段
                    $this->success("添加成功","admin/admin/index");
                }else{
                   $this->success("添加成功");
                }
        }

          }
         
}
