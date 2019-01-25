<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:33:"./template/default/jiu_index.html";i:1502540803;s:36:"./template/default/index_header.html";i:1506439004;s:37:"./template/default/public_gradeh.html";i:1490864914;s:36:"./template/default/public_goods.html";i:1506701012;s:36:"./template/default/index_footer.html";i:1505706092;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>9块9包邮 - <?php echo config('web.WEB_TIT'); ?></title>
<meta name="keywords" content="<?php echo config('web.WEB_KEY'); ?>">
<meta name="description" content="<?php echo config('web.WEB_DES'); ?>">
<link href="__ROOT__/favicon.ico" rel="icon" type="image/x-icon"/>
<link rel="stylesheet" href="__ADMIN__/layui/css/layui.css" media="all">
<link rel="stylesheet" href="__HOME__/css/home.css" media="all">
<script src="__HOME__/mods/jquery-1.10.2.min.js" charset="utf-8"></script>
<script src="__HOME__/mods/index.js" charset="utf-8"></script>
<script type="text/javascript">
$(document).ready(function(){
  $.slide("#slide");
  //$.slide("#slide-01");//多个幻灯片ID
});
</script>
<?php echo str_replace("&apos;", "'", html_entity_decode(config('web.WEB_TJCODE'))); ?>
</head>
<body class="site-home" id="LAY_home" style="background-color: #f6f6f6;">
<?php if(is_array($BannerList) || $BannerList instanceof \think\Collection || $BannerList instanceof \think\Paginator): $i = 0; $__LIST__ = $BannerList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['identity'] == 'top-banner'): ?>
  <div class="top-banner"><a href="<?php echo $vo['links']; ?>" target="_blank"><img src="<?php echo $vo['pic']; ?>" width="100%;" alt="<?php echo $vo['title']; ?>" /></a></div>
  <?php endif; endforeach; endif; else: echo "" ;endif; ?>
<div class="toolbar">
  <div class="layui-main">
  <div class="top-nav">
    <ul>
    <?php if(is_array($NavList) || $NavList instanceof \think\Collection || $NavList instanceof \think\Paginator): $i = 0; $__LIST__ = $NavList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(($vo['type'] == '1') and ($vo['identity'] == 'top')): ?>
      <li><a href="<?php echo $vo['links']; ?>" target="_blank"><?php echo $vo['name']; ?></a></li>
      <?php endif; endforeach; endif; else: echo "" ;endif; ?>  
    </ul>
  </div>  
    <div class="right-show">
      <div class="login">
      <?php if(\think\Session::get('username') != ''): ?>
        <a class="avatar" href="<?php echo url('home/'.\think\Session::get('userid')); ?>">
          <cite><?php echo \think\Session::get('username'); ?></cite>
          <i><?php if(\think\Session::get('userid') == 1): ?><em style="font-style: normal;color:#FF7200;margin-left: 10px;">管理员</em><?php else: if(\think\Session::get('point') >= config('point.GRADE_AVIP') and \think\Session::get('point') < config('point.GRADE_BVIP')): ?><em style="font-style: normal;color:#FF7200;margin-left: 10px;"><?php echo config('point.GRADE_CVIP'); ?></em><?php endif; if(\think\Session::get('point') >= config('point.GRADE_DVIP') and \think\Session::get('point') < config('point.GRADE_EVIP')): ?><em style="font-style: normal;color:#FF7200;margin-left: 10px;"><?php echo config('point.GRADE_FVIP'); ?></em><?php endif; if(\think\Session::get('point') >= config('point.GRADE_GVIP') and \think\Session::get('point') < config('point.GRADE_HVIP')): ?><em style="font-style: normal;color:#FF7200;margin-left: 10px;"><?php echo config('point.GRADE_IVIP'); ?></em><?php endif; if(\think\Session::get('point') >= config('point.GRADE_JVIP')): ?><em style="font-style: normal;color:#FF7200;margin-left: 10px;"><?php echo config('point.GRADE_KVIP'); ?></em><?php endif; endif; ?>
</i>
        </a>
        <div class="logout" style="float: left;">
          <a href="<?php echo url('user/set'); ?>"><i class="iconfont icon-shezhi"></i>设置</a>
          <a class="logi_logout" href="javascript:void(0)"><i class="iconfont icon-tuichu" style="top: 0; font-size: 22px;"></i>退了</a>
        </div>　|
      <?php else: ?>
        <a href="<?php echo url('login/index'); ?>" rel="nofollow">登录</a>
        <a href="<?php echo url('login/reg'); ?>" rel="nofollow" style="color: #ff464e;">免费注册</a>　|
      <?php endif; ?>  
      </div>
      <div class="other">
        <?php if(config('web.WEB_URL') == 1): ?><a href="__ROOT__/forum.html" target="_blank"><?php else: ?><a href="__INDEX__/forum.html" target="_blank"><?php endif; ?>论坛社区</a>       
        <a href="tencent://message/?uin=<?php echo config('web.WEB_QQ'); ?>&Site=<?php echo config('web.WEB_COM'); ?>&Menu=yes" target="_blank" rel="nofollow">客服服务</a>        
      </div>
    </div>
  </div>  
</div>
<div class="layui-header header">
  <div class="layui-main">
    <div class="hgroup">
      <a class="logo" href="/" title="<?php echo config('web.WEB_TIT'); ?>">
        <img src="<?php echo config('web.WEB_LOGO'); ?>" alt="<?php echo config('web.WEB_TIT'); ?>">
      </a>
      <div class="protection">
        <img src="__HOME__/img/protection.png" alt="protection">
      </div>
      <div class="search">
        <?php if(config('web.WEB_URL') == 1): ?><form action="__ROOT__/search.html"><?php else: ?><form action="__INDEX__/search.html"><?php endif; ?>
          <span class="search-box">
            <input type="text" id="ks" name="ks" value="<?php echo input('ks');?>" onblur="this.value==''?this.value=this.title:null" onfocus="this.value==this.title?this.value='':null" placeholder="请输入想找的宝贝" autocomplete="off" required lay-verify="required" class="layui-input txt">
          </span>
          <button class="smt" lay-submit lay-filter="submit"><i class="layui-icon">&#xe615;</i></button>
        </form>
        <div class="hot-k">
          <span>热搜词：</span>
          <?php if(is_array($TagList) || $TagList instanceof \think\Collection || $TagList instanceof \think\Paginator): $i = 0; $__LIST__ = $TagList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;if($tag != ''): if(config('web.WEB_URL') == 1): ?><a href="__ROOT__/search.html?ks=<?php echo $tag; ?>"><?php else: ?><a href="__INDEX__/search.html?ks=<?php echo $tag; ?>"><?php endif; ?>
            <?php echo $tag; ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div id="suggest" class="suggest"></div>
      </div>
    </div>
    <div class="nav">
      <ul class="navigation">
        <li <?php if($nav_curr == 'index'): ?>class="active first"<?php endif; ?>><a href="/">所有分类<i class="layui-icon" style="vertical-align: -2px;">&#xe625;</i></a></li>    
        <?php if(is_array($NavList) || $NavList instanceof \think\Collection || $NavList instanceof \think\Paginator): $i = 0; $__LIST__ = $NavList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(($vo['type'] == '1') and ($vo['identity'] == 'main')): ?>
          <li <?php if($nav_curr == $vo['alias']): ?>class="active"<?php endif; ?>><a href="<?php echo $vo['links']; ?>" <?php if($vo['target'] == 1): ?>target="_blank"<?php endif; ?>><?php echo $vo['name']; ?></a></li>
          <?php endif; endforeach; endif; else: echo "" ;endif; ?> 
      </ul>
    </div>
  </div>
</div>
<div class="filter">
  <div id="subnav" class="subnav" style="display: block;">
    <div class="layui-main">
      <div class="subnav-main">
        <ul>
          <li><a href="/">全部</a></li>
          <?php if(is_array($CategoryList) || $CategoryList instanceof \think\Collection || $CategoryList instanceof \think\Paginator): $i = 0; $__LIST__ = $CategoryList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
          <li><a href="<?php echo url('cat/'.$vo['id']); ?>"><?php echo $vo['name']; ?></a></li>
          <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
    </div>    
  </div>
</div>
<div class="goods-list">
  <div class="layui-main">
    <ul class="list-main">
      <?php if(is_array($GoodsList) || $GoodsList instanceof \think\Collection || $GoodsList instanceof \think\Paginator): $i = 0; $__LIST__ = $GoodsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
  <li>
    <div class="goods-main">
      <div class="pic">
        <a href="<?php echo url('dtl/'.$vo['id']); ?>" target="_blank">
          <img class="lazy" src="__HOME__/img/goods-loading.gif" data-original="<?php echo $vo['pic']; ?>" alt="<?php echo $vo['title']; ?>">                                           
        </a>
        <?php echo newicon($vo['startTime']); ?>
      </div>
      <?php if($vo['couponAmount'] != 0): ?>
      <div class="quan">
        <a href="<?php echo url('jump/index'); ?>?id=<?php echo $vo['id']; ?>" target="_blank" rel="nofollow">
          <span class="quan-info"><em><?php echo $vo['couponAmount']; ?>元</em></span>
        </a>
      </div>
      <?php endif; ?>
      <h3 class="title">
        <span class="label">包邮</span><?php echo $vo['title']; ?>
      </h3>
      <div class="original-price">
        <span class="price">现价：<em>￥</em><?php echo $vo['price']; ?></span>
        <span class="sold">已售出 <em><?php echo $vo['volume']; ?></em> 件</span>
      </div>
      <div class="coupon-price">
        <span class="price"><em>￥</em><?php echo $vo['couponPrice']; ?></span>
        <i class="quan-price"></i>
        <div class="btn-buy">
          <a href="<?php echo url('jump/index'); ?>?id=<?php echo $vo['id']; ?>" target="_blank" rel="nofollow">
          <?php if($vo['userType'] == 0): ?>
            <em class="t-icon"></em><i>去</i><span>淘宝</span>
            <?php else: ?>
            <em class="m-icon"></em><i>去</i><span>天猫</span>
          <?php endif; ?>
          </a>
        </div>
      </div>
    </div>
  </li>
<?php endforeach; endif; else: echo "" ;endif; ?>




    </ul>
    <!-- 分页导航 -->
    <?php if($GoodsList->render() != ''): ?>
    <div style="text-align: center">
      <div class="laypage-main">
        <?php echo $GoodsList->render(); ?>
      </div>
    </div>
    <?php endif; ?>    
  </div>
</div>
<div class="layui-footer footer">
  <div class="layui-main">
    <div class="qr-code">
      <img src="<?php echo config('web.WEB_QRCODE'); ?>" alt="二维码">
      <p>关注微信 及时抢</p>
    </div>
    <div class="thanks"></div>
    <div class="links" style="margin-top: 20px;">
      <p>友情链接：</p>
      <div class="links-main">
      <?php if(is_array($LinksList) || $LinksList instanceof \think\Collection || $LinksList instanceof \think\Paginator): $i = 0; $__LIST__ = $LinksList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <a href="<?php echo $vo['links']; ?>" target="_blank"><?php echo $vo['name']; ?></a>
      <?php endforeach; endif; else: echo "" ;endif; ?>        
      </div>     
    </div> 
    <div class="service">
      <a href="tencent://message/?uin=<?php echo config('web.WEB_QQ'); ?>&Site=<?php echo config('web.WEB_COM'); ?>&Menu=yes" class="contact-us" target="_blank" rel="nofollow">联系我们</a>
      <span class="working-time">
          <p>周一至周日</p>
          <p>9:00-21:00</p>
      </span>
    </div>
    <div class="company"><?php echo config('web.WEB_ICP'); ?> | Copyright © 2010-2017, <a href="/"><?php echo config('web.WEB_COM'); ?></a>, All Rights Reserved</div>  
  </div>
</div>
<script src="__HOME__/mods/jquery.lazyload.js" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
$(function() {
  $("img.lazy").lazyload({effect: "fadeIn"});
});
</script>
<script type="text/javascript">
;$(function(){
  $('#ks').bind('input propertychange', function() {
      var ajaxUrl = "<?php echo url('AjaxRequest/suggest'); ?>",
          ks = $(this).val();
      $.getJSON(ajaxUrl,{ks:ks},function(result){
        if (result.code == 1) {
          if (ks) {
            $('.suggest').addClass("dropdown");
            $(".suggest").html(result.data);
            $("#suggest ul li a").each(function() {
              $(this).on('click', function(){
                var  q = $(this).attr('data-ks');
                $('#ks').val(q);
                $('.suggest').removeClass("dropdown");
            });               
          });
        }
      }
    }) 
  });
  $("body").on('click',function() {
      $('.dropdown-menu').remove();
  });    
});
</script>
<script src="__ADMIN__/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript">
layui.use(['layer','element', 'form', 'util','jquery'], function(){
  var layer = layui.layer
  ,jq = layui.jquery
  ,element = layui.element()
  ,util = layui.util;
  element.on('nav(layui)', function(elem){
    console.log(elem)
  });
  util.fixbar();
  jq('.logi_logout').click(function(){
    loading = layer.load(2, {
      shade: [0.2,'#000']
    });
    jq.getJSON('<?php echo url("login/logout"); ?>',function(data){
      if(data.code == 200){
        layer.close(loading);
        layer.msg(data.msg, {icon: 1, time: 1000}, function(){
          location.reload();
        });
      }else{
        layer.close(loading);
        layer.msg(data.msg, {icon: 2, anim: 6, time: 1000});
      }
    });
  });
});
</script>
<?php echo html_entity_decode(config('web.WEB_TDJ')); ?>
</body>
</html>
