<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:35:"./template/default/forum_index.html";i:1502456816;s:36:"./template/default/forum_header.html";i:1529232607;s:37:"./template/default/public_gradeh.html";i:1490864914;s:34:"./template/default/forum_menu.html";i:1502459207;s:35:"./template/default/forum_right.html";i:1502437386;s:36:"./template/default/forum_footer.html";i:1529047576;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo config('web.WEB_TIT'); ?></title>
<meta name="keywords" content="<?php echo config('web.WEB_KEY'); ?>">
<meta name="description" content="<?php echo config('web.WEB_DES'); ?>">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="apple-mobile-web-app-status-bar-style" content="black"> 
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="format-detection" content="telephone=no">
<link href="/favicon.ico" rel="shortcut icon">
<link rel="stylesheet" href="__ADMIN__/layui/css/layui.css" media="all">
<link rel="stylesheet" href="__HOME__/css/forum.css" media="all">
<script type="text/javascript"  src="__ADMIN__/js/jquery-1.11.1.min.js"></script>
<?php echo str_replace("&apos;", "'", html_entity_decode(config('web.WEB_TJCODE'))); ?>
</head>
<body>
<div class="header">
  <div class="main">
    <a class="logo" href="/" title="<?php echo config('web.WEB_TIT'); ?>">
      <img src="<?php echo config('web.WEB_FORUMLOGO'); ?>" alt="<?php echo config('web.WEB_TIT'); ?>">
    </a>
    <div class="nav">
      <?php if(config('web.WEB_URL') == 1): ?><a href="__ROOT__/forum.html"><?php else: ?><a href="__INDEX__/forum.html"><?php endif; ?>
         <i class="layui-icon">&#xe609;</i>社区首页
      </a>       
      <?php if(config('web.WEB_URL') == 1): ?><a href="__ROOT__/choice.html"><?php else: ?><a href="__INDEX__/choice.html"><?php endif; ?>
         <i class="iconfont icon-wenda"></i>精贴
      </a>  
       <a href="http://www.yingzit.cn">         <i class="iconfont icon-ui"></i>领券中心
      </a>  	  
    </div>
    <div class="nav-user">
      <?php if(\think\Session::get('username') != ''): ?>
      <!-- 登入后的状态 -->
      <?php if(config('web.WEB_URL') == 1): ?><a class="avatar" href="__ROOT__/home/<?php echo \think\Session::get('userid'); ?>.html"><?php else: ?><a class="avatar" href="__INDEX__/home/<?php echo \think\Session::get('userid'); ?>.html"><?php endif; ?>
        <img src="__ROOT__<?php echo \think\Session::get('userhead'); ?>">
        <cite><?php echo \think\Session::get('username'); ?></cite>
        <i><?php if(\think\Session::get('userid') == 1): ?><em style="font-style: normal;color:#FF7200;margin-left: 10px;">管理员</em><?php else: if(\think\Session::get('point') >= config('point.GRADE_AVIP') and \think\Session::get('point') < config('point.GRADE_BVIP')): ?><em style="font-style: normal;color:#FF7200;margin-left: 10px;"><?php echo config('point.GRADE_CVIP'); ?></em><?php endif; if(\think\Session::get('point') >= config('point.GRADE_DVIP') and \think\Session::get('point') < config('point.GRADE_EVIP')): ?><em style="font-style: normal;color:#FF7200;margin-left: 10px;"><?php echo config('point.GRADE_FVIP'); ?></em><?php endif; if(\think\Session::get('point') >= config('point.GRADE_GVIP') and \think\Session::get('point') < config('point.GRADE_HVIP')): ?><em style="font-style: normal;color:#FF7200;margin-left: 10px;"><?php echo config('point.GRADE_IVIP'); ?></em><?php endif; if(\think\Session::get('point') >= config('point.GRADE_JVIP')): ?><em style="font-style: normal;color:#FF7200;margin-left: 10px;"><?php echo config('point.GRADE_KVIP'); ?></em><?php endif; endif; ?>
</i>
      </a>
      <div class="nav">
        <?php if(config('web.WEB_URL') == 1): ?><a href="__ROOT__/user/set.html"><?php else: ?><a href="__INDEX__/user/set.html"><?php endif; ?><i class="iconfont icon-shezhi"></i>设置</a>
        <a class="logi_logout" href="javascript:void(0)"><i class="iconfont icon-tuichu" style="top: 0; font-size: 22px;"></i>退了</a>
      </div>
      <?php else: ?>
      <!-- 未登入状态 -->
      <?php if(config('web.WEB_URL') == 1): ?><a class="unlogin" href="__ROOT__/login/index.html"><?php else: ?><a class="unlogin" href="__INDEX__/login/index.html"><?php endif; ?><i class="iconfont icon-touxiang"></i></a>
      <span>
      <?php if(config('web.WEB_URL') == 1): ?><a href="__ROOT__/login/index.html"><?php else: ?><a href="__INDEX__/login/index.html"><?php endif; ?>
      登入</a>
      <?php if(config('web.WEB_URL') == 1): ?><a href="__ROOT__/login/reg.html"><?php else: ?><a href="__INDEX__/login/reg.html"><?php endif; ?>
      注册</a>
      </span>
<!--       <p class="out-login">
        <a href="" onclick="layer.msg('正在通过QQ登入', {icon:16, shade: 0.1, time:0})" class="iconfont icon-qq" title="QQ登入"></a>
        <a href="" onclick="layer.msg('正在通过微博登入', {icon:16, shade: 0.1, time:0})" class="iconfont icon-weibo" title="微博登入"></a>
      </p>  -->
      <?php endif; ?>
    </div>
  </div>
</div>


<div class="main layui-clear">
  <div class="wrap">
    <div class="content">
      <div class="fly-tab fly-tab-index">
  <span>
    <?php if(config('web.WEB_URL') == 1): ?><a href="__ROOT__/forum.html"><?php else: ?><a href="__INDEX__/forum.html"><?php endif; ?>最新帖子</a>
    <?php if(config('web.WEB_URL') == 1): ?><a href="__ROOT__/choice.html"><?php else: ?><a href="__INDEX__/choice.html"><?php endif; ?>精帖</a>
    <?php if(config('web.WEB_URL') == 1): ?><a href="__ROOT__/user/index.html"><?php else: ?><a href="__INDEX__/user/index.html"><?php endif; ?>我的帖子</a>
  </span>
  <?php if(config('web.WEB_URL') == 1): ?><form action="__ROOT__/forum/search.html" class="fly-search"><?php else: ?><form action="__INDEX__/forum/search.html" class="fly-search"><?php endif; ?>
    <button style="position: absolute;right: 0;top: 3px;border: 0px solid #fff;" type="submit"><i class="iconfont icon-sousuo"></i></button>
    <input autocomplete="off" placeholder="搜索" type="text" name="ks" value="<?php echo input('ks');?>" required lay-verify="required" class="layui-input">
  </form>
  <?php if(config('web.WEB_URL') == 1): ?><a href="__ROOT__/add.html" class="layui-btn jie-add"><?php else: ?><a href="__INDEX__/add.html" class="layui-btn jie-add"><?php endif; ?>发表帖子</a>
</div>
      <!-- 置顶帖子 -->
      <ul class="fly-list fly-list-top">
        <?php if(is_array($SettopThreadList) || $SettopThreadList instanceof \think\Collection || $SettopThreadList instanceof \think\Paginator): $i = 0; $__LIST__ = $SettopThreadList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <li class="fly-list-li">
          <?php if(config('web.WEB_URL') == 1): ?><a href="__ROOT__/home/<?php echo $vo['userid']; ?>.html" class="fly-list-avatar"><?php else: ?><a href="__INDEX__/home/<?php echo $vo['userid']; ?>.html" class="fly-list-avatar"><?php endif; ?>
            <img src="__ROOT__<?php echo $vo['userhead']; ?>" alt="<?php echo $vo['username']; ?>">
          </a>
          <h2 class="fly-tip">
            <?php if(config('web.WEB_URL') == 1): ?><a href="__ROOT__/trd/<?php echo $vo['id']; ?>.html"><?php else: ?><a href="__INDEX__/trd/<?php echo $vo['id']; ?>.html"><?php endif; ?><?php echo $vo['title']; ?></a>
            <span class="fly-tip-stick">置顶</span>
            <?php if($vo['choice'] == 1): ?><span class="fly-tip-jing">精帖</span><?php endif; ?>
          </h2>
          <p>
            <span><?php if(config('web.WEB_URL') == 1): ?><a href="__ROOT__/home/<?php echo $vo['userid']; ?>.html"><?php else: ?><a href="__INDEX__/home/<?php echo $vo['userid']; ?>.html"><?php endif; ?><?php echo $vo['username']; ?></a></span>
            <span><?php echo date("Y-m-d h:i:s",$vo['time']); ?></span>
            <span><?php if(config('web.WEB_URL') == 1): ?><a href="__ROOT__/frm/<?php echo $vo['cid']; ?>.html"><?php else: ?><a href="__INDEX__/frm/<?php echo $vo['cid']; ?>.html"><?php endif; ?><?php echo $vo['name']; ?></a></span>
            <span class="fly-list-hint"> 
              <i class="iconfont" title="回答">&#xe60c;</i> <?php echo $vo['reply']; ?>
              <i class="iconfont" title="人气">&#xe60b;</i> <?php echo $vo['view']; ?>
            </span>
          </p>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
      <!-- 最新帖子 -->
      <ul class="fly-list">
        <?php if(is_array($ThreadList) || $ThreadList instanceof \think\Collection || $ThreadList instanceof \think\Paginator): $i = 0; $__LIST__ = $ThreadList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <li class="fly-list-li">
          <?php if(config('web.WEB_URL') == 1): ?><a href="__ROOT__/home/<?php echo $vo['userid']; ?>.html" class="fly-list-avatar"><?php else: ?><a href="__INDEX__/home/<?php echo $vo['userid']; ?>.html" class="fly-list-avatar"><?php endif; ?>
            <img src="__ROOT__<?php echo $vo['userhead']; ?>" alt="<?php echo $vo['username']; ?>">
          </a>
          <h2 class="fly-tip">
            <?php if(config('web.WEB_URL') == 1): ?><a href="__ROOT__/trd/<?php echo $vo['id']; ?>.html"><?php else: ?><a href="__INDEX__/trd/<?php echo $vo['id']; ?>.html"><?php endif; ?><?php echo $vo['title']; ?></a>
            <?php if($vo['settop'] == 1): ?><span class="fly-tip-stick">置顶</span><?php endif; if($vo['choice'] == 1): ?><span class="fly-tip-jing">精帖</span><?php endif; ?>
          </h2>
          <p>
            <span><?php if(config('web.WEB_URL') == 1): ?><a href="__ROOT__/home/<?php echo $vo['userid']; ?>.html"><?php else: ?><a href="__INDEX__/home/<?php echo $vo['userid']; ?>.html"><?php endif; ?><?php echo $vo['username']; ?></a></span>
            <span><?php echo date("Y-m-d h:i:s",$vo['time']); ?></span>
            <span><?php if(config('web.WEB_URL') == 1): ?><a href="__ROOT__/frm/<?php echo $vo['cid']; ?>.html"><?php else: ?><a href="__INDEX__/frm/<?php echo $vo['cid']; ?>.html"><?php endif; ?><?php echo $vo['name']; ?></a></span>
            <span class="fly-list-hint"> 
              <i class="iconfont" title="回答">&#xe60c;</i> <?php echo $vo['reply']; ?>
              <i class="iconfont" title="人气">&#xe60b;</i> <?php echo $vo['view']; ?>
            </span>
          </p>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
      <!-- 分页导航 -->
      <div style="text-align: center">
        <div class="laypage-main">
          <?php echo $ThreadList->render(); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="edge">
  <!-- 最新会员 -->
	<div class="fly-panel leifeng-rank"> 
    <h3 class="fly-panel-title">最新会员</h3>
    <dl>
      <?php if(is_array($NewMemberList) || $NewMemberList instanceof \think\Collection || $NewMemberList instanceof \think\Paginator): $i = 0; $__LIST__ = $NewMemberList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	    <dd>
        <?php if(config('web.WEB_URL') == 1): ?><a href="__ROOT__/home/<?php echo $vo['userid']; ?>.html"><?php else: ?><a href="__INDEX__/home/<?php echo $vo['userid']; ?>.html"><?php endif; ?>
          <img src="__ROOT__<?php echo $vo['userhead']; ?>">
          <cite><?php echo $vo['point']; ?></cite>
          <i><?php echo $vo['username']; ?></i>
        </a>
      </dd>
      <?php endforeach; endif; else: echo "" ;endif; ?>
    </dl>
  </div>
  <!-- 广告 -->
  <div class="fly-panel">  
    <?php if(is_array($BannerList) || $BannerList instanceof \think\Collection || $BannerList instanceof \think\Paginator): $i = 0; $__LIST__ = $BannerList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['identity'] == 'forum-banner'): ?>
      <li><a href="<?php echo $vo['links']; ?>" target="_blank"><img src="<?php echo $vo['pic']; ?>" style="width: 100%;" alt="<?php echo $vo['title']; ?>" /></a></li>
      <?php endif; endforeach; endif; else: echo "" ;endif; ?>  
  </div>
	<!-- 板块列表 -->
  <div class="fly-panel fly-link fly-list-one"> 
    <h3 class="fly-panel-title">版块列表</h3>
    <ul>
    <?php if(is_array($ForumList) || $ForumList instanceof \think\Collection || $ForumList instanceof \think\Paginator): $i = 0; $__LIST__ = $ForumList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      <li><?php if(config('web.WEB_URL') == 1): ?><a href="__ROOT__/frm/<?php echo $vo['id']; ?>.html"><?php else: ?><a href="__INDEX__/frm/<?php echo $vo['id']; ?>.html"><?php endif; ?><?php echo $vo['name']; ?></a></li>
	  <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
  <!-- 精选帖子 -->  
  <dl class="fly-panel fly-list-one"> 
    <dt class="fly-panel-title">精选帖子</dt>
    <?php if(is_array($ChoiceThreadList) || $ChoiceThreadList instanceof \think\Collection || $ChoiceThreadList instanceof \think\Paginator): $i = 0; $__LIST__ = $ChoiceThreadList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <dd>
      <?php if(config('web.WEB_URL') == 1): ?><a href="__ROOT__/trd/<?php echo $vo['id']; ?>.html"><?php else: ?><a href="__INDEX__/trd/<?php echo $vo['id']; ?>.html"><?php endif; ?><?php echo $vo['title']; ?></a>
      <span><i class="iconfont">&#xe60b;</i> <?php echo $vo['view']; ?></span>
    </dd>
    <?php endforeach; endif; else: echo "" ;endif; ?>
  </dl>
  <!-- 热门帖子 -->   
  <dl class="fly-panel fly-list-one"> 
    <dt class="fly-panel-title">热门帖子</dt>
    <?php if(is_array($HotThreadList) || $HotThreadList instanceof \think\Collection || $HotThreadList instanceof \think\Paginator): $i = 0; $__LIST__ = $HotThreadList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <dd>
      <?php if(config('web.WEB_URL') == 1): ?><a href="__ROOT__/trd/<?php echo $vo['id']; ?>.html"><?php else: ?><a href="__INDEX__/trd/<?php echo $vo['id']; ?>.html"><?php endif; ?><?php echo $vo['title']; ?></a>
      <span><i class="iconfont">&#xe60b;</i> <?php echo $vo['view']; ?></span>
    </dd>
    <?php endforeach; endif; else: echo "" ;endif; ?>
  </dl>
  <!-- 友情链接 --> 
</div>

</div>
<div class="footer">
  <div class="company"><?php echo config('web.WEB_ICP'); ?> | Copyright © 2010-2017, <a href="/"><?php echo config('web.WEB_COM'); ?></a>, All Rights Reserved</div>
  <div class="links">
  <?php if(is_array($LinksList) || $LinksList instanceof \think\Collection || $LinksList instanceof \think\Paginator): $i = 0; $__LIST__ = $LinksList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <a href="http://www.yingzit.cn" target="_blank">影子淘宝客</a>
  <?php endforeach; endif; else: echo "" ;endif; ?>  
  </div>
</div>
<script type="text/javascript" src="__ADMIN__/layui/layui.js"></script>
<script type="text/javascript">
layui.use(['layer','jquery'], function(){
  var layer = layui.layer
  ,jq = layui.jquery;

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
})
layui.use('util', function(){
  var util = layui.util;
  //使用内部工具组件
  util.fixbar();
});
</script>
<?php echo html_entity_decode(config('web.WEB_TDJ')); ?>

</body>
</html>