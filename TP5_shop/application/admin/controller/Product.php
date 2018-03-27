<?php

namespace app\admin\controller;

use think\Controller;
use think\Image;
use app\admin\model\Product as Product_admin;
use app\admin\model\Brand;
use app\admin\model\Type as typeModel;
class Product extends Controller{
    
   public function index(){

               $list = Product_admin::all();
        //查询所有数据
        $this->assign("list", $list);
        //获取搜索的词语
        return $this->fetch();
   }
   public function add(){

      $list = Brand::all();
        //查询所有数据
        $this->assign("brand", $list);
        
        
        
           $typeModel=new typeModel();
            $list1=$typeModel->select();
           
           $list1=$this->tree($list1);
//           var_dump($list);
//           exit();
           //      添加页面
           $this->assign("list1",$list1);
        
       return $this->fetch();
   }
   
    public function tree($list1,$pid=0,$level=1,$fuhao="")
    {
        $data=array();
        foreach($list1 as $k=>$v){
            if($v["pid"]==$pid){
                $v["leve1"]=$level;
                $v["name"]=$fuhao.$v["name"];
                $data[]=$v; 
//                寻找当前的顶级菜单是否存在下一级
//                $level=$level+1;
              $child=$this->tree($list1,$v["id"], $level+1,$fuhao."&nbsp;&nbsp;&nbsp;&nbsp;");
//              合并数据
              $data= array_merge($data,$child);
//              var_dump($data);
            }
        }
        return $data;
    }
    
   
   
   
   
   
   
   
   
   
   
   /**
    * 专门上传图片的方法
    */
   public function upload(){
       // 获取表单上传文件,接收文件
        $file = request()->file('file');
        // 移动到框架应用根目录/public/uploads/ 目录下->validate(['size'=>15678,'ext'=>'jpg,png,gif'])
        $info = $file->move(ROOT_PATH . 'public' . DS . 'static'.DS."upload");
//        echo $info;
        if($info){
//            //上传成功后的路径
            $file = $info->getSaveName();
            $image="http://localhost/TP5_shop/public/static/upload/".$file;
            $oldImage = ROOT_PATH . 'public' . DS . 'static'.DS."upload".DS.$file;
         
            $image = Image::open($oldImage);
           
            //裁剪图片
//            $image->crop(200, 200)->save(ROOT_PATH . 'public' . DS . 'static'.DS."upload".DS."1111.jpg");
            //缩略图
            $thumb = "thumb".DS.time().".".$info->getExtension();
            $dir = ROOT_PATH . 'public' . DS . 'static'.DS."upload".DS.$thumb;

            //将原图，复制到了新的地址和新的名称下
            copy($oldImage, $dir);
            //生成缩略图
            $image->thumb("200", "200", Image::THUMB_CENTER)->save($dir);
            
            return [
                "status"=>true,
                "data"=>[
                    "file"=>$file,
                    "thumb"=>$thumb
                ]
            ];
           // dump($info);
//                echo $info->getSaveName();
//            echo $thumb;
             
        }else{
//            // 上传失败获取错误信息
            return [
              "status"=>false,
                "data"=>$file->getError(),
               ];
          
        }
   }
//   添加数据
   public function insert(){
       

     
       //获取数据
        $data = input("post.");
//        var_dump($data);    
            $power = new Product_admin;

            if($power->save($data)){
                $this->success("添加成功","admin/product/index");
            }else{
                $this->error("添加失败");
            }       
    }
//       删除数据
    public function delete($id){
           $Product_admin=Product_admin::where('id','=',$id)->delete();
        
//       删除   模板::where('字段名','操作',条件)->delete();
       if($Product_admin){
           $this->success('删除成功', 'product/index');   
       }else{
           $this->success('删除失败', 'product/index'); 
       }

    }
    
//    修改数据
    public function update($id){
         //    使用role表中的数据
        
           $list = Brand::all();
        //查询所有数据
        $this->assign("brand", $list);
        
        
        
           $typeModel=new typeModel();
            $list1=$typeModel->select();
           
           $list1=$this->tree($list1);
//           var_dump($list);
//           exit();
           //      添加页面
           $this->assign("list1",$list1);
           
           
             $update=Product_admin::get($id);
             
//             $role=new Role();
//             $data=$role->field("name,id")->select();
//             
//              $this->assign("data",$data);
           $this->assign("data",$update);
//           var_dump($list);
//           exit();
             return $this->fetch();
         }
         
         
          public function updata($id){
                
              
                          
                $data=input("post.");   
                $Product_admin=new Product_admin;
                if($Product_admin->save($data,["id"=>$data["id"]])){
//                    except("password1")排除字段
                    $this->success("修改成功","admin/product/index");
                }else{
                   $this->success("修改失败","admin/product/index");
                }
      

          }
    
}
