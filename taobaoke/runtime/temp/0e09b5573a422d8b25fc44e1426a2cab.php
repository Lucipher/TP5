<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:44:"./application/admin\view\robotdtk_index.html";i:1502559028;s:42:"./application/admin\view\index_header.html";i:1493194503;s:42:"./application/admin\view\index_footer.html";i:1529044280;}*/ ?>
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
      <a href="<?php echo url('robotdtk/add'); ?>" class="layui-btn"><i class="layui-icon">&#xe608;</i> 添加采集器</a>
      <button style="margin-bottom: 3px;" class="layui-btn" lay-submit lay-filter="robotdtk_collect"><i class="layui-icon">&#xe628;</i> 一键采集全自动采集</button>
    </div>
    <form class="layui-form" method="post">
      <table width="100%">
        <tr>
          <th width="3%" align="center"><input type="checkbox" name="checkAll" lay-filter="checkAll"></th>
          <th width="5%" align="center">采集器ID</th>
          <th width="25%" align="center">采集名称</th>
          <th width="20%" align="center">入库分类</th>
          <th width="20%" align="center">采集分类</th>
          <th width="10%" align="center">基本操作</th>
        </tr>
        <?php if(is_array($RobotdtkList) || $RobotdtkList instanceof \think\Collection || $RobotdtkList instanceof \think\Paginator): $i = 0; $__LIST__ = $RobotdtkList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
          <td align="center"><input type="checkbox" name="ids[<?php echo $vo['id']; ?>]" lay-filter="checkOne" value="<?php echo $vo['id']; ?>"></td>
          <td align="center"><?php echo $vo['id']; ?></td>
          <td align="center"><?php echo $vo['name']; ?></td>
          <td align="center"><?php echo $vo['cid']; ?></td>          
          <td align="center"><?php echo $vo['dtkcid']; ?></td>
          <td align="center">
            <a class="layui-btn layui-btn-mini layui-btn-warm" href="<?php echo url('robotdtk/edit',array('id'=>$vo['id'])); ?>">修改</a> 
            <a class="layui-btn layui-btn-mini layui-btn-danger del_btn" member-id="<?php echo $vo['id']; ?>" title="删除" nickname="<?php echo $vo['name']; ?>">删除</a>
          </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </table>
      <div class="layui-form-item">
        <div style="margin-top: 20px;float: left;">
          <button class="layui-btn" lay-submit lay-filter="delete">删除选中</button>
        </div>
      </div>      
    </form>
  </div>
</div>
<div class="footer">
  <p><a style="position: absolute;color: #FFF;display: none;" href="#">三二一网络（321KEJI.CN）</a></p>
</div>
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
      jq.post('<?php echo url("robotdtk/dels"); ?>',{'id':id},function(data){
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
      jq.post('<?php echo url("robotdtk/delss"); ?>',param,function(data){
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

  var collect_layer_index_one = null;
  form.on('submit(robotdtk_collect)', function(data){
    layer.confirm('确定开始采集?', function(index){
    var id = 1;  
    collect_layer_index_one = layer.open({
      type:0,
      content:'开始采集,正在准备数据，请稍候！',
      btn: false,
      area: ['300px', '150px'],
      cancel:function(index,layero){
        layer.close(index);
        location.reload();
      }
    });
    collect_get_one({id:id});
    });    
    return false;
  });
  function collect_get_one(param){
    jq.ajax({
      url:'<?php echo url("robotdtk/collect"); ?>',
      data:param,
      type:'post',
      success:function(data){
        if(data.code == 202){
          $('.layui-layer-content').text(data.msg);
        }else{
          if(data.code == 200){
            $('.layui-layer-content').text(data.msg);
            param.num = data.num;
            collect_get_one(param);
          }
        }
      },
      dataType:'json'
    });
  }

})
</script>
</body>
</html>


