<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:32:"./template/mobile/index_cat.html";i:1506701934;s:35:"./template/mobile/index_header.html";i:1503554618;s:35:"./template/mobile/public_goods.html";i:1506701227;s:35:"./template/mobile/index_footer.html";i:1503554782;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $Category['name']; ?> - <?php echo config('web.WEB_TIT'); ?></title>
<meta name="keywords" content="<?php echo $Category['keywords']; ?>">
<meta name="description" content="<?php echo $Category['description']; ?>">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="apple-mobile-web-app-status-bar-style" content="black"> 
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="format-detection" content="telephone=no">
<link href="__ROOT__/favicon.ico" rel="icon" type="image/x-icon"/>
<link rel="stylesheet" href="__ADMIN__/layui/css/layui.css" media="all">
<link rel="stylesheet" href="__MOBILE__/css/home.css" media="all">
<script src="__MOBILE__/mods/jquery-1.10.2.min.js" charset="utf-8"></script>
<script src="__MOBILE__/mods/index.js" charset="utf-8"></script>
<script src="__ADMIN__/layui/layui.js" charset="utf-8"></script>
<style>
.layui-main{max-width: 1024px;width: 97%;}
.layui-flow-more {display: inline-block;width: 100%;}
.layui-flow-more a cite{margin: 20px 0 80px 0;}
.layui-fixbar{bottom: 70px;}
</style>
<?php echo html_entity_decode(config('web.WEB_TJCODE')); ?>
</head>
<body class="site-home" id="LAY_home" style="background-color: #f6f6f6;">
<div class="toolbar"></div>
<div id="header" class="layui-header header">
  <div class="drop-down">
    <a href="javascript:;" onclick="sidenavIn()" class="btn-left"><i class="layui-icon">&#xe649;</i></a>
  </div>
  <div class="search">
    <?php if(config('web.WEB_URL') == 1): ?><form action="__ROOT__/search.html" class="fly-search"><?php else: ?><form action="__INDEX__/search.html"><?php endif; ?>
      <span class="search-box">
        <input autocomplete="off" placeholder="请输入想找的宝贝" type="text" name="ks" value="<?php echo input('ks');?>" required lay-verify="required" class="layui-input txt">
      </span>
      <button class="smt" lay-submit lay-filter="submit"><i class="layui-icon">&#xe615;</i></button>
    </form>
  </div>
</div>
<div class="sidenav" id="sidenav-toggle">
  <a class="logo" href="/" title="<?php echo config('web.WEB_TIT'); ?>">
    <img src="<?php echo config('web.WEB_LOGO'); ?>" alt="<?php echo config('web.WEB_TIT'); ?>">
  </a>
  <ul>
    <?php if(is_array($CategoryList) || $CategoryList instanceof \think\Collection || $CategoryList instanceof \think\Paginator): $i = 0; $__LIST__ = $CategoryList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <li><a href="<?php echo url('cat/'.$vo['id']); ?>" <?php if($cid == $vo['id']): ?>class="active"<?php endif; ?>><?php echo $vo['name']; ?></a></li>
    <?php endforeach; endif; else: echo "" ;endif; ?>
  </ul>
</div>



<script type="text/javascript">
$(function (){
  var listWidth = $(".list-main li").innerWidth();//取商品列表图片宽
  $(".list-main li img").css('height',listWidth);
})
</script>
<div class="filter">
  <div id="subnav" class="subnav" style="display: block;">
    <div class="subnav-main">
      <ul>
        <li><a href="/">全部</a></li>
        <?php if(is_array($CategoryList) || $CategoryList instanceof \think\Collection || $CategoryList instanceof \think\Paginator): $i = 0; $__LIST__ = $CategoryList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <li><a href="<?php echo url('cat/'.$vo['id']); ?>" <?php if($cid == $vo['id']): ?>class="active"<?php endif; ?>><?php echo $vo['name']; ?></a></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div>
    <div class="drop-down">
      <a href="javascript:;" onclick="sidenavIn()" class="btn-left"><i class="layui-icon">&#xe61a;</i></a>
    </div> 
  </div>
  <div class="sort">
    <div class="layui-main">
      <div class="sort-main">
        <a href="<?php echo url('cat/'.$cid); ?>" <?php if($sort == ''): ?>class="active"<?php endif; ?>>综合排序</a>
        <a href="<?php echo url('cat/'.$cid,array('sort'=>'new')); ?>" <?php if($sort == 'new'): ?>class="active"<?php endif; ?>>最新</a>
        <a href="<?php echo url('cat/'.$cid,array('sort'=>'hot')); ?>" <?php if($sort == 'hot'): ?>class="active"<?php endif; ?>>销量</a>
        <a href="<?php echo url('cat/'.$cid,array('sort'=>'price')); ?>" <?php if($sort == 'price'): ?>class="active"<?php endif; ?>>价格</a>
        <a href="<?php echo url('cat/'.$cid,array('sort'=>'rate')); ?>" <?php if($sort == 'rate'): ?>class="active"<?php endif; ?>>折扣</a>
        <a href="<?php echo url('cat/'.$cid,array('sort'=>'quan')); ?>" <?php if($sort == 'quan'): ?>class="active"<?php endif; ?>>券额</a>
      </div>      
    </div>
  </div>  
</div>
<div class="goods-list" style="margin:0 0 60px 0;">
  <ul class="list-main" id="LAY_list">
    <?php if(is_array($GoodsList) || $GoodsList instanceof \think\Collection || $GoodsList instanceof \think\Paginator): $i = 0; $__LIST__ = $GoodsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
  <li>
    <div class="goods-main">
      <div class="pic">
        <a href="<?php echo url('dtl/'.$vo['id']); ?>">
          <img src="<?php echo $vo['pic']; ?>" class="lazy" alt="<?php echo $vo['title']; ?>">                             
        </a>
        <?php echo newicon($vo['startTime']); ?>
      </div>
      <?php if($vo['couponAmount'] != 0): ?>
      <div class="quan">
        <a href="<?php echo url('jump/index'); ?>?id=<?php echo $vo['id']; ?>" rel="nofollow">
          <span class="quan-info">优惠券<br><em><?php echo $vo['couponAmount']; ?>元</em></span>
        </a>
      </div>
      <?php endif; ?>
      <h3 class="title">
        <span class="label">包邮</span><?php echo $vo['title']; ?>
      </h3>
      <div class="original-price">
        <span class="price"><em>￥</em><?php echo $vo['price']; ?></span>
        <span class="sold">已售 <em><?php echo $vo['volume']; ?></em></span>
      </div>
      <div class="coupon-price">
        <span class="price"><em>￥</em><?php echo $vo['couponPrice']; ?></span>
        <i class="quan-price"></i>
        <div class="btn-buy">
          <a href="<?php echo url('jump/index'); ?>?id=<?php echo $vo['id']; ?>" rel="nofollow">
          <?php if($vo['userType'] == 0): ?>
            <em class="t-icon"></em>
            <?php else: ?>
            <em class="m-icon"></em>
          <?php endif; ?>
          </a>
        </div>
      </div>
    </div>
  </li>
<?php endforeach; endif; else: echo "" ;endif; ?>



    <script type="text/javascript">    
      var listWidth = $(".list-main li").innerWidth();
      layui.use('flow', function(){
        var $ = layui.jquery;
        var flow = layui.flow;
        flow.load({
          elem: '#LAY_list'
          ,isLazyimg:true
          ,done: function(page, next){ 
            var lis = [];
            $.get("<?php echo url('AjaxRequest/catList'); ?>?id=<?php echo $cid; ?>&sort=<?php echo $sort; ?>&page="+(page+1), function(res){
              layui.each(res.data, function(index, item){
                lis.push('<li><div class="goods-main"><div class="pic"><a href="'+item.url+'"><img class="lazy" src="__MOBILE__/img/goods-loading.gif" data-original="'+item.pic+'" alt="'+item.title+'" style="height:'+listWidth+'px"></a>'+item.newicon+'</div>'+item.couponAmount+'<h3 class="title"><span class="label">包邮</span>'+item.title+'</h3><div class="original-price"><span class="price"><em>￥</em>'+item.price+'</span><span class="sold">已售 <em>'+item.volume+'</em></span></div><div class="coupon-price"><span class="price"><em>￥</em>'+item.couponPrice+'</span><i class="quan-price"></i><div class="btn-buy"><a href="'+item.jumpurl+'" rel="nofollow"><em class="'+item.icon+'"></em></a></div></div></div></li>');
              });
              next(lis.join(''), page < res.pages);
              $("img.lazy").lazyload({effect: "fadeIn"});
            });
          }
        });
      });
    </script>  
  </ul>
</div>
<div class="layui-footer footer">
  <ul class="public">
    <li <?php if($nav_curr == 'index'): ?>class="active"<?php endif; ?>><a href="/" class="bottom_btn home">首页</a></li>
    <li <?php if($nav_curr == 'jiu'): ?>class="active"<?php endif; ?>><?php if(config('web.WEB_URL') == 1): ?><a href="__ROOT__/jiu.html" class="bottom_btn brand"><?php else: ?><a href="__INDEX__/jiu.html" class="bottom_btn brand"><?php endif; ?>9.9包邮</a></li>
    <li <?php if($nav_curr == 'hot'): ?>class="active"<?php endif; ?>><?php if(config('web.WEB_URL') == 1): ?><a href="__ROOT__/hot.html" class="bottom_btn client"><?php else: ?><a href="__INDEX__/hot.html" class="bottom_btn client"><?php endif; ?>爆款疯抢</a></li>
    <li <?php if($nav_curr == 'live'): ?>class="active"<?php endif; ?>><?php if(config('web.WEB_URL') == 1): ?><a href="__ROOT__/live.html" class="bottom_btn gift"><?php else: ?><a href="__INDEX__/live.html" class="bottom_btn gift"><?php endif; ?>领券直播</a></li>
    <li <?php if($nav_curr == 'history'): ?>class="active"<?php endif; ?>><?php if(config('web.WEB_URL') == 1): ?><a href="__ROOT__/history.html" class="bottom_btn user"><?php else: ?><a href="__INDEX__/history.html" class="bottom_btn user"><?php endif; ?>我的足迹</a></li>
  </ul>
</div> 
<script src="__MOBILE__/mods/jquery.lazyload.js" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
$(function() {
  $("img.lazy").lazyload({effect: "fadeIn"});
});
</script>
<script type="text/javascript">
layui.use(['element', 'form', 'util'], function(){
  var element = layui.element()
  ,util = layui.util;
  element.on('nav(layui)', function(elem){
    console.log(elem)
  });
  util.fixbar();
});
</script>
<?php echo html_entity_decode(config('web.WEB_TDJ')); ?>

</body>
</html>
