<!DOCTYPE HTML>
<html>
<head>
    <title>所有订单</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php echo base_url(); ?>static/bui/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>static/bui/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>static/bui/assets/css/page-min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>static/bui/assets/css/prettify.css" rel="stylesheet" type="text/css" />
    <link href="http://g.alicdn.com/bui/bui/1.1.17/css/bs3/dpl.css" rel="stylesheet">
    <link href="http://g.alicdn.com/bui/bui/1.1.17/css/bs3/bui.css" rel="stylesheet">

    <script type="text/javascript">
        function delResult(id){
            // console.log(id);
            $.ajax({
                url : '<?php echo base_url(); ?>index.php/show_orders/doDelete/'+id,
                dataType : 'json',
                //data : {"a":"1"},
                success : function(data){
                    if(data){ //删除成功
                        // search.load();
                        //BUI.Message.Alert('删除成功！');
                        window.location.href='<?php echo base_url(); ?>index.php/show_orders';
                    }else{ //删除失败
                        BUI.Message.Alert('删除失败！');
                    }
                }
            });
        }
        function click_submit(id){
            BUI.Message.Confirm('确认要删除id为'+id+'的记录么？',function(){delResult(id);},'question');
        }
    </script>
</head>
<body>
    <div id="tab">
        <table class="table table-bordered table-hover definewidth m10">
            <thead>
                <tr>
                    <th>订单号</th>
                    <th>状态</th>
                    <th>总价</th>
                    <th>创建时间</th>
                    <th>运费</th>
                    <th>买家</th>
                    <th>收货人</th>
                    <th>联系电话</th>
                    <th>商品ID</th>
                    <th>商品名称</th>
                    <th>商品价格</th>
                    <th>数量</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(isset($results))
                    foreach ($results as $key) {
                ?>
                <tr>
                    <td><?php echo $key['id']; ?></td>
                    <td><?php echo $key['username']; ?></td>
                    <td><?php echo $key['password']; ?></td>
                    <td><?php echo $key['email']; ?></td>
                    <td>主讲</td>
                    <td>计算机网络</td>
                    <td>专业课</td>
                    <td>50.69</td>
                    <td>合格</td>
                    <td>0.00</td>
                    <td>0.00</td>
                    <td>50.69</td>
                    <td>已审核</td>
                    <td>
                        <div class="button button-small button-info" onclick="click_submit(<?php echo $key['id']; ?>)">销核</div>
                    </td>
                </tr>
                <?php } ?>
                <tr>
                    <td style="text-align: right" colspan="14">当前第<?php if(isset($page_index)) echo $page_index ?> 页 总记录 <?php if(isset($count))echo $count; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <script type="text/javascript" src="<?php echo AMTPLPATH; ?>assets/js/jquery-1.8.1.min.js"></script>
    <script type="text/javascript" src="<?php echo AMTPLPATH; ?>assets/js/bui.js"></script>
    <script type="text/javascript" src="<?php echo AMTPLPATH; ?>assets/js/config.js"></script>
    <script src="http://g.tbcdn.cn/fi/bui/jquery-1.8.1.min.js"></script>
    <script src="http://g.alicdn.com/bui/seajs/2.3.0/sea.js"></script>
    <script src="http://g.alicdn.com/bui/bui/1.1.17/config.js"></script>
<body>
</html>