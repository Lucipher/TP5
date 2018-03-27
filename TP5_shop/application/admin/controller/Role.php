<?php

namespace app\admin\controller;

use think\Controller;
use app\admin\model\Role as RoleModel;
use app\admin\model\Power;
use think\Db;

class Role extends Controller{
    
    /**
     * 管理员的列表
     */
    public function index(){
        
        $list = RoleModel::all();
        //查询所有数据
        $this->assign("list", $list);
        //获取搜索的词语
        return $this->fetch();
    }
    
    /**
     * 权限和角色对应管理
     */
    public function power($id){
        //调取所有的权限
        $all = Power::all()->toArray();
        $one = Power::all(["parent_id"=>0])->toArray();
        $list = array();
        foreach($one as $k=>$v){
            $list[] = $this->menutree($v, $all);
        }
        
        //调取当前角色选中的权限
        $checkList = Db::name("role_power")->where("role_id",$id)->select();
        $check = array();
        foreach($checkList as $k=>$v){
            $check[$v["power_id"]] = $v;
        }
        $this->assign("list",$list);
        $this->assign("one",$one);
        $this->assign("checkList",$check);
        $this->assign("id",$id);
        return $this->fetch();
        
    }
    
    protected function menutree($info,$all){
        foreach($all as $k=>$v){
            if($v["parent_id"] == $info["id"]){
                $v = $this->menutree($v, $all);
                $info["child"][] = $v;                
            }
        }
        return $info;
    }
    
    /**
     * 数据入库
     */
    public function poweradd(){
        $data = input("post.");
      //  var_dump($data);
        $role = $data["role_id"];
        $power = $data["power"];
        Db::name("role_power")->where("role_id",$role)->delete();
        $insert = array();
        foreach($power as $k=>$v){
            $insert[] = ["role_id"=>$role,"power_id"=>$v];
        }
        Db::name("role_power")->insertAll($insert);
        $this->success("设置成功","admin/role/index");
        
    }
    
//    删除数据
    public function delete($id){
          $RoleModel=RoleModel::where('id','=',$id)->delete();
        
//       删除   模板::where('字段名','操作',条件)->delete();
       if($RoleModel){
           $this->success('删除成功', 'role/index');   
       }else{
           $this->success('删除失败', 'role/index'); 
       }
    }
}
