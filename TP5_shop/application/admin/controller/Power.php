<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\model\Power as PowerModel;
use think\Loader;

class Power extends Controller{
    
    /**
     * 权限的列表
     */
    public function index(){
        $powerModel = new PowerModel();
        //第一种(最简单)(问题：执行sql语句多，容易造成sql堵塞，显示页面非常慢)
//        直接去表中，查询所有的第一级菜单
//        $one = $powerModel->where("parent_id",0)->select();
//        foreach($one as $k=>$v){
//            $one[$k]["child"] = $powerModel->where("parent_id", $v->id)->select();
//        }
        
//        第二种：一条sql查询所有，重组数据
//        $list = $powerModel->select();
//		
//		if(!empty($list)){
//			$data = array();
//			foreach($list as $k=>$v){
//				$data[$v["parent_id"]][] = $v;
//			}
//			$list = array();
//			foreach($data[0] as $v){
//				if(isset($data[$v["id"]])){
//					$v["child"] = $data[$v["id"]];
//				}else{
//					$v["child"] = array();
//				}
//				$list[] = $v;
//			}
//        
//		}
        
//      第三种方式：递归(在函数中嵌套本函数)
        
        //是第一级的数据
//        $one = $powerModel->where("parent_id",0)->select()->toArray();
//        
//        $list = array();
//       foreach($one as $k=>$v){
//           $list[] = $this->menutree($v);
//       }
        
        
        //第二种：
        $one = $powerModel->where("parent_id",0)->select()->toArray();
        $all = $powerModel->select()->toArray();
        $list = array();
        foreach($one as $k=>$v){
            $list[] = $this->menutree($v, $all);
        }
        //查询所有数据
        $this->assign("list", $list);
        return $this->fetch();
    }
   
    /**
     * 查询树状结构
     */
//    protected function menutree($info){
//        $powerModel = new PowerModel();
//        
//        $two = $powerModel->where("parent_id",$info["id"])->select()->toArray();
//        if($two != null){
//            foreach($two as $k=>$v){
//                $two[$k] = $this->menutree($v);
//            }
//        }
//        //一级的$info
//        $info["child"] = $two;
//        return $info;
//    }
    protected function menutree($info,$all){
        foreach($all as $k=>$v){
            if($v["parent_id"] == $info["id"]){
                $v = $this->menutree($v, $all);
                $info["child"][] = $v;                
            }
        }
        return $info;
    }


    public function add(){
        return $this->fetch();
    }
    
    /**
     * 后台数据插入数据库
     */
    public function insert(){
        
        //获取数据
        $data = input("post.");
        //加载验证规则
        
        $validate = Loader::validate('Power');
        if (!$validate->check($data)) {
            $this->error($validate->getError());
        }else{
            $power = new PowerModel;
            //添加数据，排除password1字段
            if($power->save($data)){
                $this->success("添加成功","admin/power/index");
            }else{
                $this->error("添加失败");
            }
        }
    }
    
    /**
     * 权限添加下一级的菜单
     */
    public function addChild($parent_id){
        $this->assign("info", PowerModel::get($parent_id));
        return $this->fetch();
    }
    
//    删除数据
          public function delete($id){

        $new_id=PowerModel::where('id','=',$id)->delete();
        
//       删除   模板::where('字段名','操作',条件)->delete();
       if($new_id){
           $this->success('删除成功', 'power/index');   
       }else{
           $this->success('删除失败', 'power/index'); 
       }

    }
    
    
}
