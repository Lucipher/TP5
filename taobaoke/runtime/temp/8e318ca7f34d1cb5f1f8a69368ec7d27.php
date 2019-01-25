<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:42:"./application/admin\view\category_add.html";i:1502559265;s:42:"./application/admin\view\index_header.html";i:1493194503;s:42:"./application/admin\view\index_footer.html";i:1529044280;}*/ ?>
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
    <fieldset class="layui-elem-field layui-field-title">
      <legend>添加分类</legend>
    </fieldset>
    <form class="layui-form">
      <div class="layui-form-item">
        <label class="layui-form-label">分类名称</label>
        <div class="layui-input-block">
          <input type="text" name="name" required lay-verify="required" placeholder="必填内容" autocomplete="off" class="layui-input">
        </div>
      </div>
      <div class="layui-form-item" style="width: 300px;">
        <label class="layui-form-label">所属分类</label>
        <div class="layui-input-block">
          <select name="pid">
            <option value="0">顶级分类</option>
            <?php if(is_array($CategoryList) || $CategoryList instanceof \think\Collection || $CategoryList instanceof \think\Paginator): $i = 0; $__LIST__ = $CategoryList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      	    <option value="<?php echo $vo['id']; ?>"><?php if($vo['pid'] == 0): ?><?php echo $vo['name']; endif; ?></option>
      	    <?php endforeach; endif; else: echo "" ;endif; ?>
          </select>
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">所属类型</label>
        <div class="layui-input-block">
          <input type="radio" name="type" value="1" title="商品" checked="">
          <input type="radio" name="type" value="2" title="帖子" disabled="">
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">分类图片</label>
        <div class="layui-input-block">
      	  <input type="file" name="file" class="layui-upload-file" id="image" style="float: left;">
      	  <input type="text" name="pic" class="layui-input" style="position: absolute;left: 111px;top: 0px;width: 500px;">
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">关键词</label>
        <div class="layui-input-block">
    	    <input type="text" name="keywords" placeholder="请输入内容" autocomplete="off" class="layui-input">
        </div>
      </div>
      <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">描述</label>
        <div class="layui-input-block">
          <textarea name="description" placeholder="请输入内容" class="layui-textarea"></textarea>
        </div>
      </div>
      <div class="layui-form-item">
        <div class="layui-input-block">
    	  <button class="layui-btn" lay-submit="" lay-filter="category_add">立即提交</button>
          <button class="layui-btn layui-btn-primary" onclick="history.go(-1)">返回</button>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="footer">
  <p><a style="position: absolute;color: #FFF;display: none;" href="#">三二一网络（321KEJI.CN）</a></p>
</div>
<script type="text/javascript">
layui.use(['form', 'upload'],function(){
  var form = layui.form()
  ,jq = layui.jquery;
  
  layui.upload({
    url: '<?php echo url("upload/upimage"); ?>'
    ,elem:'#image'
    ,before: function(input){
      loading = layer.load(2, {
        shade: [0.2,'#000']
      });
    }
    ,success: function(res){
      layer.close(loading);
      jq('input[name=pic]').val(res.path);
      layer.msg(res.msg, {icon: 1, time: 1000});
    }
  }); 
  
  form.on('submit(category_add)', function(data){
    loading = layer.load(2, {
      shade: [0.2,'#000']
    });
    var param = data.field;
    jq.post('<?php echo url("category/add"); ?>',param,function(data){
      if(data.code == 200){
        layer.close(loading);
        layer.msg(data.msg, {icon: 1, time: 1000}, function(){
          location.href = '<?php echo url("category/index"); ?>';
        });
      }else{
        layer.close(loading);
        layer.msg(data.msg, {icon: 2, anim: 6, time: 1000});
      }
    });
    return false;
  });
})
</script>
</body>
</html>