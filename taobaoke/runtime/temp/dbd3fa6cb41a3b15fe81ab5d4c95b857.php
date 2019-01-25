<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:47:"./application/admin\view\generate_listinfo.html";i:1548302981;s:42:"./application/admin\view\index_header.html";i:1493194503;s:42:"./application/admin\view\index_footer.html";i:1529044280;}*/ ?>
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
<div class="fly-panel fly-panel-user">
  <div class="tpt-admin">
    <div class="tpt-btn">
      <a href="<?php echo url('nav/add'); ?>" class="layui-btn"><i class="layui-icon">&#xe608;</i> 添加菜单</a>
    </div>
    <form method="post">
      <table width="100%">
        <tr>
          <th width="5%" align="center">ID</th>
          <th width="15%" align="center">编号</th>
          <th width="10%" align="center">密码</th>
          <th width="10%" align="center">金额</th>  
           <th width="10%" align="center">是否核销</th>  
           <th width="10%" align="center">建卡时间</th>   
        </tr>
        <?php if(is_array($NavList) || $NavList instanceof \think\Collection || $NavList instanceof \think\Paginator): $i = 0; $__LIST__ = $NavList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>          
          <td align="center"><?php echo $vo['id']; ?></td>
          <td align="center"><?php echo $vo['number']; ?></td>
          <td align="center"><?php echo $vo['password']; ?></td>
          <td align="center"><?php echo $vo['z_money']; ?></td> 
           <td align="center"><?php echo $vo['state']; ?></td>
           <td align="center"><?php echo $vo['time']; ?></td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </table>
    </form>
  </div>
</div>
<div class="footer">
  <p><a style="position: absolute;color: #FFF;display: none;" href="#">三二一网络（321KEJI.CN）</a></p>
</div>
<script type="text/javascript">
function changeshow(o){
  var change=$(o).attr("change");
  $.ajax({
	  type:"post",
	  dataType:"json",
         data:{change:change},
	  url:"<?php echo url('generate/listinfo'); ?>",
	  success:function(data){
		  if(data == 1){
			  $(o).attr("class","layui-unselect layui-form-switch");
	      }else{
			  $(o).attr("class","layui-unselect layui-form-switch layui-form-onswitch");
	      }
	  }
  });
}
</script>

</body>
</html>


