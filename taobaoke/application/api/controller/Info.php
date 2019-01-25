<?php
namespace app\api\controller;
use think\Controller;
use think\Session;
use think\Db;
use app\api\model\User as UserMondel;
//商品操作
class Info extends Controller
{
  
    //    
//    商品分类 菜单
        public function cat()
    {

//            综合排序只传id,1
       $id=$_GET['id']; //分类id
        $sort = $_GET['sort'];//菜单
        $order = '';
        switch ($sort) {
            case 'new':
                $order = 'G.startTime desc';
                break;

            case 'price':
                $order = 'G.couponPrice desc';
                break;
             case 'price_asc':
                $order = 'G.couponPrice asc';
                break;
            case 'hot':
                $order = 'G.volume desc';
                break;

            case 'quan':
                $order = 'G.couponAmount desc';
                break;

            case 'rate':
                $order = 'G.couponRate asc';
        }
        if (empty($id)) {
            return json_encode(array("code"=>400,"message"=>"请求失败","success"=>false,"data"=>"NULL"));
        } else {
            $CategoryDb = Db::name('category'); 
            $Category = $CategoryDb->where("id = {$id}")->find();
//            return var_dump($Category);
//            $this->assign('Category', $Category);
            if ($Category) {
                $GoodsDb = Db::name('goods');
                if (config('web.WEB_ADC') == 1) {
                    $this->collect_unit($Category['name'],$Category['id']);
                }
                $show['G.show'] = 1;
                $GoodsList = $GoodsDb->alias('G')->join('category C', 'C.id=G.cid')->join('member M', 'M.userid=G.uid')->field('G.*,C.id as cid,M.userid,M.userhead,M.username,C.name')->where("G.cid={$id}")->where($show)->order($order)->paginate(40);
            return json_encode(array("code"=>200,"message"=>"请求成功","success"=>true,"data"=>$GoodsList));
            } else {
                 return json_encode(array("code"=>400,"message"=>"请求失败","success"=>false,"data"=>"NULL"));
            }
       
    }
    }
    
    
//    商品详情
    public function dtl()
    {
   
        $token=$_GET['token'];//获取用户token
           if($token!=NULL){//token不是空的时候查找用户信息
           $model = new UserMondel;
          $token1_yz = $model->gg_token($token);
          if($token1_yz!=90001){
                return json_encode(array("code"=>404,"message"=>"登录过期，请重新登录","success"=>false,"data"=>$token1_yz));
          }    
           
                $user=Db::table('vae_home_user')->where('token',$token)->find();
           }
                 

        $id=$_GET['id']; //商品id
        
        if (empty($id)) {
             return json_encode(array("code"=>400,"message"=>"请求失败","success"=>false,"data"=>"NULL"));
        } else {
            $GoodsDb = Db::name('goods');
            $query = $GoodsDb->where("id = {$id}")->find();
            if ($query) {
//               tokeo不是空的时候用户为登录状态，插入浏览表数据
                if($token!=null){
                    $list=Db::table('vae_home_record')->where('id',$query["id"])->find();
                    if($list!=null){
                      $where['id']=$query["id"];
                        $where['uid_app']=$user['id'];
                        Db::table('vae_home_record')->where($where)->delete();
                    }
                     $query['data_time']=date("Y-m-d H:i:s",time());
                     $query["uid_app"]=$user['id'];
                     $uid=Db::table('vae_home_record')->insert($query);//插入用户浏览记录浏览
                }
                $GoodsDb->where("id = {$id}")->setInc('view', 1);
                $Goods = $GoodsDb->alias('G')->join('category C', 'C.id=G.cid')->join('member M', 'M.userid=G.uid')->field('G.*,C.id as cid,C.name,M.userid,M.grades,M.point,M.userhead,M.username')->find($id);
                  return json_encode(array("code"=>200,"message"=>"请求成功","success"=>true,"data"=>$Goods));
                $content = $Goods['content'];
                $content = htmlspecialchars_decode($content);
//                 return json_encode($content);
//                $this->assign('content', $content);
                //取同所在类目
                $CategoryDb = Db::name('category'); 
                $Category = $CategoryDb->where("id = {$Goods['cid']}")->find();
//                $this->assign('Category', $Category);
                //取同类目数据
                $show['G.show'] = 1;
                $GoodsList = $GoodsDb->alias('G')->join('category C', 'C.id=G.cid')->join('member M', 'M.userid=G.uid')->field('G.*,C.id as cid,M.userid,M.userhead,M.username,C.name')->where("G.cid={$Goods['cid']}")->where($show)->order('G.id desc')->paginate(40);
//                $this->assign('GoodsList', $GoodsList);
//                return view();
            } else {
                return json_encode(array("code"=>400,"message"=>"请求失败","success"=>false,"data"=>"NULL"));
            }
        }
    }
    
//    浏览记录
    public function record(){
          $token=$_GET['token'];
         $model = new UserMondel;
          $token1_yz = $model->gg_token($token);
          if($token1_yz!=90001){
                return json_encode(array("code"=>404,"message"=>"登录过期，请重新登录","success"=>false,"data"=>$token1_yz));
          }    
          
          $info=Db::table('vae_home_user')->where('token',$token)->find();
          
          $list=Db::table('vae_home_record')->where('uid_app',$info["id"])->select();
          if($list){
                 return json_encode(array("code"=>200,"message"=>"请求成功","success"=>true,"data"=>$list));
          }else{
               return json_encode(array("code"=>404,"message"=>"请求失败","success"=>false,"data"=>"NULL"));

          }
    }
    
    
//    收藏夹
    public function collect(){
          $token=$_GET['token'];
         $model = new UserMondel;
          $token1_yz = $model->gg_token($token);
          if($token1_yz!=90001){
                return json_encode(array("code"=>404,"message"=>"登录过期，请重新登录","success"=>false,"data"=>$token1_yz));
          }    
              
           $info=Db::table('vae_home_user')->where('token',$token)->find();//用户信息
            $id=$_GET['id'];//商品id
           $list=Db::table('tpt_goods')->where('id',$id)->find();
           $list["uid_app"]=$info["id"];
           $list['data_time']=date("Y-m-d H:i:s",time());
            $data=Db::table('vae_home_shoucang')->insert($list);//插入收藏记录
             if($data){
                 return json_encode(array("code"=>200,"message"=>"请求成功","success"=>true,"data"=>$data));
              }else{
               return json_encode(array("code"=>404,"message"=>"请求失败","success"=>false,"data"=>"NULL"));

          }
        
        
    }
    
    

    
    
    
    

}

   

