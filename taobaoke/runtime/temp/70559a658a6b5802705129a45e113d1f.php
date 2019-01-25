<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:41:"./application/admin\view\forum_index.html";i:1503471629;s:42:"./application/admin\view\index_header.html";i:1493194503;s:42:"./application/admin\view\index_footer.html";i:1529044280;}*/ ?>
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
      <a href="<?php echo url('forum/add'); ?>" class="layui-btn"><i class="layui-icon">&#xe608;</i> 添加版块</a>
    </div>
    <form method="post">
      <table width="100%">
        <tr>
          <th width="5%" align="center">版块ID</th>
          <th width="20%" align="center">版块名称</th>
          <th width="10%" align="center">是否开启</th>
          <th width="10%" align="center">是否显示</th>
          <th width="10%" align="center">版块图片</th>
          <th width="25%" align="center">版块链接</th>
          <th width="10%" align="center">添加时间</th>
          <th width="10%" align="center">基本操作</th>
        </tr>
        <?php if(is_array($ForumList) || $ForumList instanceof \think\Collection || $ForumList instanceof \think\Paginator): $i = 0; $__LIST__ = $ForumList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
          <td align="center"><?php echo $vo['id']; ?></td>
          <td align="center"><a target="_blank" href="__INDEX__/frm/<?php echo $vo['id']; ?>.html"><?php if($vo['level'] != 0): ?>└─ <?php endif; ?><?php echo $vo['name']; ?></a></td>
          <td align="center">
            <a change="<?php echo $vo['id']; ?>" onclick="changeopen(this);" <?php if($vo['open'] == 1): ?>class="layui-unselect layui-form-switch layui-form-onswitch"<?php else: ?>class="layui-unselect layui-form-switch"<?php endif; ?>><em>开启</em><i></i></a>
          </td>          
          <td align="center">
            <a change="<?php echo $vo['id']; ?>" onclick="changeshow(this);" <?php if($vo['show'] == 1): ?>class="layui-unselect layui-form-switch layui-form-onswitch"<?php else: ?>class="layui-unselect layui-form-switch"<?php endif; ?>><em>显示</em><i></i></a>
          </td>
          <td align="center"><?php if($vo['pic'] != ''): ?><img src="__ROOT__<?php echo $vo['pic']; ?>" height="25"><?php else: ?>暂无图片<?php endif; ?></td>
          <td style="padding-left: 20px;">__INDEX__/frm/<?php echo $vo['id']; ?>.html</td>
          <td align="center"><?php echo date("Y-m-d",$vo['time']); ?></td>
          <td align="center">
            <a class="layui-btn layui-btn-mini layui-btn-warm" href="<?php echo url('forum/edit',array('id'=>$vo['id'])); ?>">修改</a> <a class="layui-btn layui-btn-mini layui-btn-danger del_btn" member-id="<?php echo $vo['id']; ?>" title="删除" nickname="<?php echo $vo['name']; ?>">删除</a>
          </td>
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
function changeopen(o){
  var change=$(o).attr("change");
  $.ajax({
    type:"post",
    dataType:"json",
      data:{change:change},
    url:"<?php echo url('forum/changeopen'); ?>",
    success:function(data){
      if(data == 1){
        $(o).attr("class","layui-unselect layui-form-switch");
        }else{
        $(o).attr("class","layui-unselect layui-form-switch layui-form-onswitch");
        }
    }
  });
}
function changeshow(o){
  var change=$(o).attr("change");
  $.ajax({
	  type:"post",
	  dataType:"json",
      data:{change:change},
	  url:"<?php echo url('forum/changeshow'); ?>",
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
<script type="text/javascript">
layui.use('form',function(){
  var form = layui.form()
  ,jq = layui.jquery;

  jq('.del_btn').click(function(){
    var name = jq(this).attr('nickname');
    var id = jq(this).attr('member-id');
    layer.confirm('确定删除【'+name+'】?', function(index){
      loading = layer.load(2, {
        shade: [0.2,'#000']
      });
      jq.post('<?php echo url("forum/dels"); ?>',{'id':id},function(data){
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
})
</script>
</body>
</html>


