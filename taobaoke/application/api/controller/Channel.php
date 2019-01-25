<?php
namespace app\api\controller;
use think\Controller;
use think\Session;
use think\Db;
use app\api\model\User as UserMondel;
//首页今日频道
class Channel extends Controller
{

//    9.9包邮
    public function jiu(){
            $GoodsDb = Db::name('goods');
           $show['G.show'] = 1;
           $GoodsList = $GoodsDb->alias('G')->join('category C', 'C.id=G.cid')->join('member M', 'M.userid=G.uid')->field('G.*,C.id as cid,M.userid,M.userhead,M.username,C.name')->where($show)->where('couponPrice','<',10)->order('G.id desc')->paginate(40);
             return json_encode(array("code"=>200,"message"=>"请求成功","success"=>true,"data"=>$GoodsList));
    }
    
//    20元封顶
        public function ershi()
    {
        $GoodsDb = Db::name('goods');
        $show['G.show'] = 1;
        $GoodsList = $GoodsDb->alias('G')->join('category C', 'C.id=G.cid')->join('member M', 'M.userid=G.uid')->field('G.*,C.id as cid,M.userid,M.userhead,M.username,C.name')->where($show)->where('couponPrice','<',20)->order('G.id desc')->paginate(40);
        if($GoodsList) {
             return json_encode(array("code"=>200,"message"=>"请求成功","success"=>true,"data"=>$GoodsList));
        }else{
             return json_encode(array("code"=>404,"message"=>"请求失败","success"=>true,"data"=>"NULL"));
        }
       
    }
    

    
    
    
    
    
    
    
    
//    我的足迹
        public function zuji()
    {
        $history = cookie('person_dtl_history');
        if($history){
            $order = 'field(G.id,'.implode(',',array_reverse($history)).')';
            $GoodsDb = Db::name('goods');
            $show['G.show'] = 1;
            $GoodsList = $GoodsDb->alias('G')->join('category C', 'C.id=G.cid')->join('member M', 'M.userid=G.uid')->field('G.*,C.id as cid,M.userid,M.userhead,M.username,C.name')->where('G.id','in',$history)->where($show)->order($order)->paginate(40);
        }else{
            $GoodsList = [];
        }
        return $GoodsList;
//        $this->assign('GoodsList', $GoodsList);
//        $this->assign('nav_curr', 'history');
//        return view();
    }
    
    
    

}

   

