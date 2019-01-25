<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:41:"./application/admin\view\index_index.html";i:1548301419;s:42:"./application/admin\view\index_header.html";i:1493194503;s:42:"./application/admin\view\index_footer.html";i:1529044280;}*/ ?>
<!DOCTYPE html>
<html>
<head>  
<meta charset="utf-8">
<title>后台管理</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="renderer" content="webkit">
<meta name="robots" content="noindex,nofollow">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="apple-mobile-web-app-status-bar-style" content="black"> 
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="format-detection" content="telephone=no">
<link href="/favicon.ico" rel="shortcut icon">
<link rel="stylesheet" href="__ADMIN__/layui/css/layui.css">
<link rel="stylesheet" href="__ADMIN__/css/admin.css">
<script type="text/javascript" src="__ADMIN__/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="__ADMIN__/layui/layui.js"></script>
</head>
<body>
<div class="header">
  <div class="main">
    <a class="logo" href="<?php echo url('index/index'); ?>" title="后台管理">后台管理</a>
    <div class="nav-user">
      <a class="avatar">
        <img src="__ROOT__<?php echo \think\Session::get('userhead'); ?>">
        <cite><?php echo \think\Session::get('username'); ?></cite>
        <i>管理员</i>
      </a>
      <div class="nav">
        <a target="_blank" href="__INDEX__"><i class="layui-icon" style="top: 3px; font-size: 24px;padding-right: 8px;">&#xe609;</i>网站首页</a>
        <a class="logi_logout" href="javascript:void(0)"><i class="layui-icon" style="top: 4px;font-size: 24px;padding-right: 8px;">&#x1006;</i>退出</a>
      </div>
    </div>
  </div>
</div>
<div class="main fly-user-main layui-clear">
  <ul class="layui-nav layui-nav-tree left_menu_ul">
  	<li class="layui-nav-item layui-nav-itemed">
      <a href="javascript:;">论坛管理</a>
      <dl class="layui-nav-child">
        <dd><a href="<?php echo url('forum/index'); ?>" target="main"><i class="layui-icon">&#xe630;</i>版块管理</a></dd>
        <dd><a href="<?php echo url('thread/index'); ?>" target="main"><i class="layui-icon">&#xe63c;</i>帖子管理</a></dd>
  	    <dd><a href="<?php echo url('comment/index'); ?>" target="main"><i class="layui-icon">&#xe63a;</i>评论管理</a></dd>
      </dl>
    </li>
    <li class="layui-nav-item layui-nav-itemed">
      <a href="javascript:;">商品管理</a>
      <dl class="layui-nav-child">
        <dd><a href="<?php echo url('category/index'); ?>" target="main"><i class="layui-icon">&#xe630;</i>分类管理</a></dd>
        <dd><a href="<?php echo url('goods/index'); ?>" target="main"><i class="layui-icon">&#xe63c;</i>商品管理</a></dd>
        <dd><a href="<?php echo url('goods/stale'); ?>" target="main"><i class="layui-icon">&#xe63c;</i>过期商品</a></dd>
      </dl>
    </li>
    <li class="layui-nav-item layui-nav-itemed">
      <a href="javascript:;">采集管理</a>
      <dl class="layui-nav-child">
        <dd><a href="<?php echo url('robotxuanpin/index'); ?>" target="main"><i class="layui-icon">&#xe609;</i>自选高佣采集</a></dd>
        <dd><a href="<?php echo url('robotgaoyongjin/index'); ?>" target="main"><i class="layui-icon">&#xe609;</i>一键高佣采集</a></dd>
        <dd><a href="<?php echo url('robothaoquan/index'); ?>" target="main"><i class="layui-icon">&#xe609;</i>好券清单采集</a></dd>
        <dd><a href="<?php echo url('robotlanlan/index'); ?>" target="main"><i class="layui-icon">&#xe609;</i>懒懒采集</a></dd>
        <dd><a href="<?php echo url('robothaodanku/index'); ?>" target="main"><i class="layui-icon">&#xe609;</i>好单库采集</a></dd>                            
        <dd><a href="<?php echo url('robotdtk/index'); ?>" target="main"><i class="layui-icon">&#xe609;</i>大淘客采集</a></dd>
        <dd><a href="<?php echo url('robotxuanpinku/index'); ?>" target="main"><i class="layui-icon">&#xe609;</i>选品库采集</a></dd>                    
        <dd><a href="<?php echo url('robotalimama/index'); ?>" target="main"><i class="layui-icon">&#xe609;</i>超级搜索采集</a></dd>
      </dl>
    </li>        
  	<li class="layui-nav-item" style="background-color: #444a5d;">
      <a href="javascript:;">综合管理</a>
      <dl class="layui-nav-child">
        <dd><a href="<?php echo url('nav/index'); ?>" target="main"><i class="layui-icon">&#xe64d;</i>菜单管理</a></dd>      
  	    <dd><a href="<?php echo url('point/index'); ?>" target="main"><i class="layui-icon">&#xe62c;</i>积分管理</a></dd>
        <dd><a href="<?php echo url('banner/index'); ?>" target="main"><i class="layui-icon">&#xe60d;</i>广告管理</a></dd>
  	    <dd><a href="<?php echo url('links/index'); ?>" target="main"><i class="layui-icon">&#xe64d;</i>友情链接</a></dd>
        <dd><a href="<?php echo url('member/index'); ?>" target="main"><i class="layui-icon">&#xe612;</i>会员管理</a></dd>
      </dl>
    </li>
    <li class="layui-nav-item layui-nav-itemed">
      <a href="javascript:;">系统管理</a>
      <dl class="layui-nav-child">
        <dd><a href="<?php echo url('config/index'); ?>" target="main"><i class="layui-icon">&#xe620;</i>网站配置</a></dd>
  	    <dd><a class="update_cache" href="javascript:void(0)"><i class="layui-icon">&#xe640;</i>清理缓存</a></dd>
      </dl>
    </li>
      	<li class="layui-nav-item layui-nav-itemed">
      <a href="javascript:;">购物卡管理</a>
      <dl class="layui-nav-child">
        <dd><a href="<?php echo url('generate/index'); ?>" target="main"><i class="layui-icon">&#xe630;</i>购物卡生成</a></dd>
        <dd><a href="<?php echo url('generate/listinfo'); ?>" target="main"><i class="layui-icon">&#xe63c;</i>购物卡列表</a></dd>
      </dl>
    </li>
    
  </ul>
</div>
<div class="layui-body iframe-container">
  <iframe class="admin-iframe" id="admin-iframe" name="main" src="<?php echo url('index/home'); ?>"></iframe>
</div>
<div class="footer">
  <p><a style="position: absolute;color: #FFF;display: none;" href="#">三二一网络（321KEJI.CN）</a></p>
</div>
<script type="text/javascript">
layui.use(['layer', 'element','jquery'], function(){
  var layer = layui.layer
  ,element = layui.element()
  ,jq = layui.jquery;
  
  jq('.left_menu_ul .layui-nav-item').click(function(){
    jq('.left_menu_ul .layui-nav-item').removeClass('layui-this');
    jq(this).addClass('layui-this');
    jq("#iframe-mask").show();
    jq("#admin-iframe").load(function(){   
      jq("#iframe-mask").fadeOut(100);
    });
  });

  jq('.update_cache').click(function(){
    loading = layer.load(2, {
      shade: [0.2,'#000']
    });
    jq.getJSON('<?php echo url("index/update"); ?>',function(data){
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
</body>
</html>