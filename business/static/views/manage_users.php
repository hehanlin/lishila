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
                    <th>用户名</th>
                    <th>角色</th>
                    <th>当前状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>remainer</td>
                    <td>普通管理员</td>
                    <td>可用</td>
                    <td>
                        <!-- <a class="button button-small" href="<?php echo base_url(); ?>index.php/show_user_power">查看</a> -->
                        <a class="button button-small" href="<?php echo base_url(); ?>index.php/update_user_info">编辑</a>
                        <!-- <a class="button button-small" href="<?php echo base_url(); ?>index.php/update_user_power">修改权限</a> -->
                        <a class="button button-small" onclick="click_submit()">删除</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<body></html>