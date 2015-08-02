<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>添加权限</title>

	<link href="http://g.alicdn.com/bui/bui/1.1.17/css/bs3/dpl.css" rel="stylesheet">
	<link href="http://g.alicdn.com/bui/bui/1.1.17/css/bs3/bui.css" rel="stylesheet">
 
</head>
<body>
  <div class="demo-content">
    <form id="J_Form" action="" class="form-horizontal">
      <div class="control-group">
      <div class="control-group">
        <label class="control-label"><s>*</s>ID：</label>
        <div class="controls">
          <input type="text" class="input-large" disabled="disabled" data-rules="{required : true}">
        </div>
      </div>
        <label class="control-label"><s>*</s>权限名称：</label>
        <div class="controls">
          <input name="sname" type="text" class="input-large" data-rules="{required : true}">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"><s>*</s>方法名：</label>
        <div class="controls">
          <input type="text" class="input-large" data-rules="{required : true}">
        </div>
      </div>
      <div class="row actions-bar">       
          <div class="form-actions span13 offset3">
            <button type="submit" class="button button-primary">保存</button>
          </div>
      </div>       
    </form>
    
 
  <script src="http://g.tbcdn.cn/fi/bui/jquery-1.8.1.min.js"></script>
  <script src="http://g.alicdn.com/bui/seajs/2.3.0/sea.js"></script>
  <script src="http://g.alicdn.com/bui/bui/1.1.17/config.js"></script>
 
<!-- script start --> 
    <script type="text/javascript">
      BUI.use('bui/form',function(Form){
      
      new Form.Form({
        srcNode : '#J_Form'
      }).render();
  });  
      
</script>
<!-- script end -->
  </div>
</body>
</html>