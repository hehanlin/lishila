<!DOCTYPE HTML>
<html>
<head>
    <title>管理权限</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php echo base_url(); ?>static/bui/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>static/bui/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>static/bui/assets/css/page-min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>static/bui/assets/css/prettify.css" rel="stylesheet" type="text/css" />
</head>
<body></head>
<body>
    <div id="tab">
        <table class="table table-bordered table-hover definewidth m10">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>权限</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>insert</td>
                    <td>
                        <a class="button button-small" href="<?php echo base_url(); ?>index.php/update_power">修改</a>
                        <a class="button button-small" onclick="click_submit()">删除</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>update</td>
                    <td>
                        <a class="button button-small" href="<?php echo base_url(); ?>index.php/update_power">修改</a>
                        <a class="button button-small" onclick="click_submit()">删除</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>delete</td>
                    <td>
                        <a class="button button-small" href="<?php echo base_url(); ?>index.php/update_power">修改</a>
                        <a class="button button-small" onclick="click_submit()">删除</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="http://g.tbcdn.cn/fi/bui/jquery-1.8.1.min.js"></script>
    <script src="http://g.alicdn.com/bui/seajs/2.3.0/sea.js"></script>
    <script src="http://g.alicdn.com/bui/bui/1.1.17/config.js"></script>
    <script type="text/javascript">
        //表单验证
        BUI.use('bui/form',function(Form){
            new Form.Form({
                srcNode : '#J_Form'
            }).render();
        });  

        //删除验证
        function click_submit(){
            BUI.Message.Confirm('确认要删除选中的记录么？',function(){alert(1)},'question');
        }
    </script>
<body></html>