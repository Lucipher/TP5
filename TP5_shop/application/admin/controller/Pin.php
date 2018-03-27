<?php

namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\model\Role;
use app\admin\model\Admin;

class Pin extends Controller{
        
//    角色管理
      public function index(){
        $Role=new Role();
          $list=$Role->paginate(2);
      
       $this->assign("list",$list);
          return $this->fetch();
                 
       }
       
//       添加数据
            public function add(){

             return $this->fetch();
         }
         
         
          public function insert(){

                $Role = new Role($_POST);
//                echo $Role;
           
            // post数组中只有name和email字段会写入
                 $Role->allowField(['name','description'])->save();
             if($Role){
                       $this->success('添加成功', 'pin/index');   
                   }else{
                       $this->success('添加失败', 'pin/index'); 
                   }

            }
            
            
//            删除数据
            
            
                //          删除数据
      public function delete($id){

        $new_id=Role::where('id','=',$id)->delete();
        
//       删除   模板::where('字段名','操作',条件)->delete();
       if($new_id){
           $this->success('删除成功', 'pin/index');   
       }else{
           $this->success('删除失败', 'pin/index'); 
       }

    }
    
    
    
            
     
//    修改数据
//    
              public function update($id){
         //    使用role表中的数据
             $list=Role::get($id);
             
//             $role=new Role();
//             $data=$role->field("name,id")->select();
//             
//              $this->assign("data",$data);
           $this->assign("list",$list);
           
             return $this->fetch();
         }
    
                 

         
         
         
         public function updata(){
//         $adminModel = new adminModel();
         $data=input("post.");
//       var_dump($data);
         
         
//         $rel=$adminModel->isUpdate(true)->save($data);
       //  var_dump($Admin);
       //  

     
                $role=new Role;
                if($role->save($data,["id"=>$data["id"]])){
//                    except("password1")排除字段
                    $this->success("修改成功","admin/pin/index");
                }else{
                   $this->success("修改成功");
                }
      

          }
         
            
}
