<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:40:"./application/admin\view\index_home.html";i:1529231877;s:42:"./application/admin\view\index_header.html";i:1493194503;s:42:"./application/admin\view\index_footer.html";i:1529044280;}*/ ?>
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
<div class="tpt-index fly-panel fly-panel-user">
<blockquote style="padding: 10px;border-left: 5px solid #009688;" class="layui-elem-quote">欢迎使用影子淘宝客（YINGZIT.CN）系统，先温馨提醒几个常见问题：</blockquote>
<table width="100%">
  <tr>
    <td>尽管本程序在发布前已经经过严格测试，但我们依然强烈建议各位用户时常备份；</td>
    <td>
      如果需要开启伪静态，请先确认服务器或空间添加了伪静态规则；
      <a href="http://yingzit.cn/forum.html" style="color:#FF5722;" target="_blank">查看教程</a>
    </td>
  </tr>
  <tr>
    <td>安装完成后请可以将index.php和admin.php里面安装代码删除；</td>
    <td>安装好程序后，一定要记得修改默认的密码和口令；</td>
  </tr>
</table>
<blockquote style="padding: 10px;border-left: 5px solid #009688;" class="layui-elem-quote">系统信息：</blockquote>
<table width="100%">
  <tr>
    <td width="110px">程序版本</td>
    <td>
      影子淘宝客（YINGZIT.CN） V1.0 
      <a href="http://yingzit.cn/trd/7.html" style="color:#FF5722;" target="_blank">查看最新版本</a>
     </td>
  </tr>
  <tr>
    <td>服务器类型</td>
    <td><?php echo php_uname('s'); ?></td>
  </tr>
  <tr>
    <td>PHP版本</td>
    <td><?php echo PHP_VERSION; ?></td>
  </tr>
  <tr>
    <td>Zend版本</td>
    <td><?php echo Zend_Version(); ?></td>
  </tr>
  <tr>
    <td>服务器解译引擎</td>
    <td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td>
  </tr>
  <tr>
    <td>服务器语言</td>
    <td><?php echo $_SERVER['HTTP_ACCEPT_LANGUAGE']; ?></td>
  </tr>
  <tr>
    <td>服务器Web端口</td>
    <td><?php echo $_SERVER['SERVER_PORT']; ?></td>
  </tr>
</table>
<blockquote style="padding: 10px;border-left: 5px solid #009688;" class="layui-elem-quote">开发团队：</blockquote>
<table width="100%">
  <tr>
    <td width="110px">版权所有</td>
    <td>影子淘宝客（YINGZIT.CN）</td>
  </tr>
  <tr>
    <td>感谢贡献者</td>
    <td>Thinkphp，Layer</td>
  </tr>
   <tr>
    <td>QQ交流群</td>
    <td>481679916</td>
  </tr>
  <tr>
    <td>特别提醒您</td>
    <td>本程序均可免费下载使用，但严禁删除、隐藏或更改版权信息，且导致的一切损失由使用者自行承担。</td>
  </tr>
</table>
</div>
<div class="footer">
  <p><a style="position: absolute;color: #FFF;display: none;" href="#">三二一网络（321KEJI.CN）</a></p>
</div>
</body>
</html>