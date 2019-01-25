<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:42:"./application/admin\view\thread_index.html";i:1502558989;s:42:"./application/admin\view\index_header.html";i:1493194503;s:42:"./application/admin\view\index_footer.html";i:1529044280;}*/ ?>
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
    <div class="tpt-btn" style="float: left;margin: 0 20px 0 0">
      <a target="_blank" href="__INDEX__/add.html" class="layui-btn"><i class="layui-icon">&#xe608;</i> 添加帖子</a>
    </div>
    <div style="float: left;">
      <form class="layui-form" action="" method="get">
        <input placeholder="输入关键字" name="ks" value="<?php echo input('ks');?>" type="text" class="layui-input" style="float: left;margin-right: 10px;width: 240px;">
        <button class="layui-btn" style="float: left;" value="查询" type="submit">查询</button>
      </form>
    </div>
    <form class="layui-form" enctype="multipart/form-data" method="post">
      <table width="100%">
        <tr>
    	    <th width="3%" align="center"><input type="checkbox" name="checkAll" lay-filter="checkAll"></th>
    		  <th width="5%" align="center">帖子ID</th>
          <th width="30%" align="center">帖子标题</th>
      		<th width="5%" align="center">是否显示</th>
      		<th width="5%" align="center">是否置顶</th>
      		<th width="5%" align="center">是否精选</th>
      		<th width="10%" align="center">所属栏目</th>
      		<th width="10%" align="center">添加时间</th>
          <th width="10%" align="center">基本操作</th>
        </tr>
        <?php if(is_array($ThreadList) || $ThreadList instanceof \think\Collection || $ThreadList instanceof \think\Paginator): $i = 0; $__LIST__ = $ThreadList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
  	    <tr>
    	    <td align="center"><input type="checkbox" name="ids[<?php echo $vo['id']; ?>]" lay-filter="checkOne" value="<?php echo $vo['id']; ?>"></td>
    		  <td align="center"><?php echo $vo['id']; ?></td>
          <td style="padding-left: 20px;"><a target="_blank" href="__INDEX__/trd/<?php echo $vo['id']; ?>.html"><?php echo mb_substr(strip_tags(htmlspecialchars_decode($vo['title'])), 0, 35, 'utf-8');?>...</a></td>
      		<td align="center">
      		  <a change="<?php echo $vo['id']; ?>" onclick="changeshow(this);" <?php if($vo['show'] == 1): ?>class="layui-unselect layui-form-switch layui-form-onswitch"<?php else: ?>class="layui-unselect layui-form-switch"<?php endif; ?>><em>显示</em><i></i>
      		  </a>
      		</td>
      		<td align="center">
      		  <a change="<?php echo $vo['id']; ?>" onclick="changesettop(this);" <?php if($vo['settop'] == 1): ?>class="layui-unselect layui-form-switch layui-form-onswitch"<?php else: ?>class="layui-unselect layui-form-switch"<?php endif; ?>><em>顶置</em><i></i>
      		  </a>
      		</td>
      		<td align="center">
      		  <a change="<?php echo $vo['id']; ?>" onclick="changechoice(this);" <?php if($vo['choice'] == 1): ?>class="layui-unselect layui-form-switch layui-form-onswitch"<?php else: ?>class="layui-unselect layui-form-switch"<?php endif; ?>>
      		    <em>精选</em><i></i>
      		  </a>
      		</td>
  		    <td align="center">
            <a target="_blank" href="__INDEX__/frm/<?php echo $vo['cid']; ?>.html"><?php echo $vo['name']; ?></a>
          </td>
  		    <td align="center"><?php echo date("Y-m-d",$vo['time']); ?></td>
          <td align="center">
            <a class="layui-btn layui-btn-mini layui-btn-warm" href="<?php echo url('thread/edit',array('id'=>$vo['id'])); ?>">修改</a> <a class="layui-btn layui-btn-mini layui-btn-danger del_btn" member-id="<?php echo $vo['id']; ?>" title="删除" nickname="<?php echo $vo['title']; ?>">删除</a>
          </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </table>
      <div class="layui-form-item">
        <div style="margin-top: 20px;float: left;">
          <button class="layui-btn" lay-submit lay-filter="delete">删除选中</button>
        </div>
        <div class="pages" style="float: right;"><?php echo $ThreadList->render(); ?></div>
      </div>
    </form>
  </div>
</div>
<div class="footer">
  <p><a style="position: absolute;color: #FFF;display: none;" href="#">三二一网络（321KEJI.CN）</a></p>
</div>
<script type="text/javascript">
function changechoice(o){
  var change=$(o).attr("change");
  $.ajax({
    type:"post",
    dataType:"json",
      data:{change:change},
    url:"<?php echo url('thread/changechoice'); ?>",
    success:function(data){
      if(data == 1){
        $(o).attr("class","layui-unselect layui-form-switch");
        }else{
        $(o).attr("class","layui-unselect layui-form-switch layui-form-onswitch");
        }
    }
  });
}
function changesettop(o){
  var change=$(o).attr("change");
  $.ajax({
    type:"post",
    dataType:"json",
      data:{change:change},
    url:"<?php echo url('thread/changesettop'); ?>",
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
    url:"<?php echo url('thread/changeshow'); ?>",
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
      jq.post('<?php echo url("thread/dels"); ?>',{'id':id},function(data){
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
  
  form.on('checkbox(checkAll)', function(data){
    if(data.elem.checked){
      jq("input[type='checkbox']").prop('checked',true);
    }else{
      jq("input[type='checkbox']").prop('checked',false);
    }
    form.render('checkbox');
  });  

  form.on('checkbox(checkOne)', function(data){
    var is_check = true;
    if(data.elem.checked){
      jq("input[lay-filter='checkOne']").each(function(){
        if(!jq(this).prop('checked')){ is_check = false; }
      });
      if(is_check){
        jq("input[lay-filter='checkAll']").prop('checked',true);
      }
    }else{
      jq("input[lay-filter='checkAll']").prop('checked',false);
    } 
    form.render('checkbox');
  });

  form.on('submit(delete)', function(data){
    var is_check = false;
    jq("input[lay-filter='checkOne']").each(function(){
      if(jq(this).prop('checked')){ is_check = true; }
    });
    if(!is_check){
      layer.msg('请选择数据', {icon: 2,anim: 6,time: 1000});
      return false;
    }
    layer.confirm('确定批量删除?', function(index){
      loading = layer.load(2, {
        shade: [0.2,'#000']
      });
      var param = data.field;
      jq.post('<?php echo url("thread/delss"); ?>',param,function(data){
        if(data.code == 200){
          layer.close(loading);
          layer.msg(data.msg, {icon: 1, time: 1000}, function(){
            location.reload();
          });
        }else{
          layer.close(loading);
          layer.msg(data.msg, {icon: 2,anim: 6, time: 1000});
        }
      });
    });
    return false;
  });

})
</script>
</body>
</html>