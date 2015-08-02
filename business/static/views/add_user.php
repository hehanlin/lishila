<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>添加用户</title>

    <link href="http://g.alicdn.com/bui/bui/1.1.17/css/bs3/dpl.css" rel="stylesheet">
    <link href="http://g.alicdn.com/bui/bui/1.1.17/css/bs3/bui.css" rel="stylesheet"></head>
<body>
    <div class="demo-content">
        <form id="J_Form" action="" class="form-horizontal">
            <div class="control-group">
                <div class="control-group">
                    <label class="control-label">
                        <s>*</s>
                        昵称：
                    </label>
                    <div class="controls">
                        <input name="sname" type="text" class="input-large" data-rules="{required : true}"></div>
                </div>
                <div class="control-group">
                    <label class="control-label">
                        <s>*</s>
                        真实姓名：
                    </label>
                    <div class="controls">
                        <input type="text" class="input-large" data-rules="{required : true}"></div>
                </div>
                <div class="control-group">
                    <label class="control-label">角色：</label>
                    <div class="controls">
                        <select>
                            <option>请选择</option>
                            <option>系统管理员</option>
                            <option>普通管理员</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">
                        <s>*</s>
                        状态：
                    </label>
                    <div class="controls">
                        <label class="radio" for="">
                            <input type="radio">可用</label>
                        &nbsp;&nbsp;&nbsp;
                        <label class="radio" for="">
                            <input type="radio">禁用</label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">
                        <s>*</s>
                        密码：
                    </label>
                    <div class="controls">
                        <input type="password" id="f1" name="f1" class="input-large" data-rules="{required : true}"></div>
                </div>
                <div class="control-group">
                    <label class="control-label">
                        <s>*</s>
                        确认密码：
                    </label>
                    <div class="controls">
                        <input type="password" name="f2" class="input-large" data-rules="{required : true,equalTo:'#f1'}"></div>
                </div>
                <div class="row actions-bar">
                    <div class="form-actions span13 offset3">
                        <button type="submit" class="button button-primary">保存</button>
                        <button type="reset" class="button">重置</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- script start -->
    <script src="http://g.tbcdn.cn/fi/bui/jquery-1.8.1.min.js"></script>
    <script src="http://g.alicdn.com/bui/seajs/2.3.0/sea.js"></script>
    <script src="http://g.alicdn.com/bui/bui/1.1.17/config.js"></script>
    <script type="text/javascript">
        BUI.use('bui/form',function(Form){

            new Form.Form({
                srcNode : '#J_Form'
                }).render();
        });  
      
    </script>
    <!-- script end -->
</body>
</html>