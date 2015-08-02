<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>商户信息</title>

    <link href="http://g.alicdn.com/bui/bui/1.1.17/css/bs3/dpl.css" rel="stylesheet">
    <link href="http://g.alicdn.com/bui/bui/1.1.17/css/bs3/bui.css" rel="stylesheet"></head>
<body>
    <div class="demo-content">
        <?php foreach ($results as $key) { ?>
        <form method="POST" id="J_Form" enctype="multipart/form-data"  action="<?php echo base_url(); ?>index.php/update_seller_info/do_update" class="form-horizontal">
            <div class="control-group">
                <label class="control-label">
                    <s>*</s>
                    店铺名称：
                </label>
                <div class="controls">
                    <input type="text" name="truename" class="input-large" data-rules="{required : true}" value="<?php echo $key['truename'] ?>"></div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    <s>*</s>
                    密码：
                </label>
                <div class="controls">
                    <input type="password" name="pwd" id="f1" name="f1" class="input-large"></div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    <s>*</s>
                    确认密码：
                </label>
                <div class="controls">
                    <input type="password" name="f2" class="input-large" data-rules="{equalTo:'#f1'}"></div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    <s>*</s>
                    地址：
                </label>
                <div class="controls">
                    <input type="text" name="address" class="input-large" data-rules="{required : true}" value="<?php echo $key['address'] ?>"></div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    <s>*</s>
                    电话：
                </label>
                <div class="controls">
                    <input type="text" name="tel" class="input-large" data-rules="{required : true}" value="<?php echo $key['tel'] ?>"></div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    <s>*</s>
                    头像：
                </label>
                <div class="controls">
                    <input type="file" name="sellerimg" class="input-large"></div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    <s>*</s>
                    描述：
                </label>
                <div class="controls  control-row-auto">
                    <textarea name="desc" id="" class="control-row4 input-large" data-rules="{required : true}"  value="<?php echo $key['desc'] ?>"></textarea>
                </div>
            </div>
            <div class="row actions-bar">
                <div class="form-actions span13 offset3">
                    <button type="submit" class="button button-primary">保存</button>
                </div>
            </div>
        </form>
        <?php } ?>

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
        <!-- script end --> </div>
</body>
</html>