<?php

namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\model\Role;
use app\admin\model\Admin;
use app\admin\model\Brand;
class Pinpai extends Controller{
        
//    品牌管理
      public function index(){
        $Brand=new Brand();
          $list=$Brand->paginate(2);
     
       $this->assign("list",$list);
          return $this->fetch();
                 
       }
       
       //       添加数据
            public function add(){

             return $this->fetch();
         }
         
                  
          public function insert($title,$site){

                    // 获取表单上传文件 例如上传了001.jpg
              $file = request()->file('image');
              // 移动到框架应用根目录/public/uploads/ 目录下
              $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
              if($info){
                  // 成功上传后 获取上传信息
                  // 输出 jpg

                 // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                $img=$info->getSaveName();
//                拼接地址
                  $pinjie="http://localhost/TP5_shop/public/uploads/";
               $login=$pinjie.$img;
                  // 输出 42a79759f284b767dfcb2a0197904287.jpg
              }else{
                  // 上传失败获取错误信息
                 echo $file->getError();
              }
                $Brand=new Brand();
                $data=$Brand->data([
                    "title"=>$title,
                    "login"=>$login,
                    "site"=>$site
                ]);
              
//            var_dump($data);
//         //           
//            // post数组中只有name和email字段会写入
                 $Brand->save($data);
             if($Brand){
                       $this->success('添加成功', 'pinpai/index');   
                   }else{
                       $this->success('添加失败', 'pinpai/index'); 
                   }

            }
            
                            //          删除数据
      public function delete($id){

        $new_id=Brand::where('id','=',$id)->delete();
        
//       删除   模板::where('字段名','操作',条件)->delete();
       if($new_id){
           $this->success('删除成功', 'pinpai/index');   
       }else{
           $this->success('删除失败', 'pinpai/index'); 
       }

    }
    
    
    
      
//    修改数据
//    
              public function update($id){
         //    使用role表中的数据
             $list=Brand::get($id);
             
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

     
                $role=new Brand;
                if($role->save($data,["id"=>$data["id"]])){
//                    except("password1")排除字段
                    $this->success("修改成功","admin/pinpai/index");
                }else{
                   $this->success("修改失败","admin/pinpai/index");
                }
      

          }
         
    
            
 
  
}
