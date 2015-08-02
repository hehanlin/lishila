<!DOCTYPE HTML>
<html>
<head>
    <title>历史订单</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php echo base_url(); ?>static/bui/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>static/bui/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>static/bui/assets/css/page-min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="tab">

        <table class="table table-bordered table-hover definewidth m10">
            <thead>
                <tr>
                    <th>序号</th>
                    <th>学期</th>
                    <th>员工姓名</th>
                    <th>教学性质</th>
                    <th>课程性质</th>
                    <th>课程名称</th>
                    <th>课程类型</th>
                    <th>工作量</th>
                    <th>评定等级</th>
                    <th>部门增减</th>
                    <th>主部门增减</th>
                    <th>合计</th>
                    <th>本人审核</th>
                </tr>
            </thead>
            <?php 
                if(isset($results))
                foreach ($results as $key) {
            ?>
            <tbody>
                <tr>
                    <td>
                        <?php echo $key['id']; ?></td>
                    <td>
                        <?php echo $key['username']; ?></td>
                    <td>
                        <?php echo $key['password']; ?></td>
                    <td>
                        <?php echo $key['email']; ?></td>
                    <td>主讲</td>
                    <td>计算机网络</td>
                    <td>专业课</td>
                    <td>50.69</td>
                    <td>合格</td>
                    <td>0.00</td>
                    <td>0.00</td>
                    <td>50.69</td>
                    <td>已审核</td>
                </tr>
                <?php } ?>
                <tr>
                    <td style="text-align: right" colspan="13">当前页 <?php if(isset($page_index)) echo $page_index ?> 总记录 <?php if(isset($count)) echo $count ?></td>
                </tr>
            </tbody>
        </table>
    </div>
<body></html>