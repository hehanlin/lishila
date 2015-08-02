<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>商户信息</title>

    <link href="http://g.alicdn.com/bui/bui/1.1.17/css/bs3/dpl.css" rel="stylesheet">
    <link href="http://g.alicdn.com/bui/bui/1.1.17/css/bs3/bui.css" rel="stylesheet">
 
</head>
<body>
  <div class="demo-content">
    <form id="J_Form" action="" class="form-horizontal">
      <div class="control-group">
        <div class="conrool bui-form-group"  data-rules="{checkRange:1}" data-messages="{checkRange:'至少勾选一项！'}" >
          <table class="table table-bordered table-hover definewidth m10">
            <thead>
              <tr>
                  <th>remainer's power</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><label class="checkbox" for=""><input name="stype" value="1" type="checkbox">添加</label></td>
              </tr>
              <tr>
                <td><label class="checkbox" for=""><input name="stype" value="2" type="checkbox">修改</label></td>
              </tr>
              <tr>
                <td><label class="checkbox" for=""><input name="stype" value="3" type="checkbox">删除</label></td>
              </tr>
              <tr>
                <td><label class="checkbox" for=""><input name="stype" value="3" type="checkbox">。。。。</label></td>
              </tr>
              <tr>
                <td><label class="checkbox" for=""><input name="stype" value="3" type="checkbox">。。。。</label></td>
              </tr>
              <tr>
                <td><label class="checkbox" for=""><input name="stype" value="3" type="checkbox">。。。。</label></td>
              </tr>
              <tr>
                <td><label class="checkbox" for=""><input name="stype" value="3" type="checkbox">。。。。</label></td>
              </tr>
              <tr>
                <td><label class="checkbox" for=""><input name="stype" value="3" type="checkbox">。。。。</label></td>
              </tr>
              <tr>
                <td><label class="checkbox" for=""><input name="stype" value="3" type="checkbox">。。。。</label></td>
              </tr>
            </tbody>
          </table>
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