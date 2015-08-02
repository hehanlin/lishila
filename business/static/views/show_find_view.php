<!DOCTYPE HTML>
<html>
<head>
    <title>查询订单</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php echo base_url(); ?>static/bui/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>static/bui/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>static/bui/assets/css/page-min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>static/bui/assets/css/prettify.css" rel="stylesheet" type="text/css" />
    <link href="http://g.alicdn.com/bui/bui/1.1.17/css/bs3/dpl.css" rel="stylesheet">
    <link href="http://g.alicdn.com/bui/bui/1.1.17/css/bs3/bui.css" rel="stylesheet">
</head>
<body></head>
<body>
    <form id="J_Form" action="<?php echo base_url(); ?>index.php/show_find/doSearch" method="GET" class="form-horizontal">
        <div class="control-group">
            <label class="control-label"><s>*</s>订单号：</label>
            <div class="controls">
                <input name="sname" type="text" class="input-large" data-rules="{required : true}">
                <button type="submit" class="button button-primary">查询</button>
            </div>

        </div>
    </form>
        <div id="tab">
            <!-- <table class="table table-bordered table-hover definewidth m10">
                <thead>
                    <tr>
                        <th>订单号</th>
                        <th>订单状态</th>
                        <th>订单总价格</th>
                        <th>创建时间</th>
                        <th>运费</th>
                        <th>买家微信OPENID</th>
                        <th>买家微信昵称</th>
                        <th>收货人姓名</th>
                        <th>收货地址省份</th>
                        <th>收货地址城市</th>
                        <th>收货地址区/县</th>
                        <th>收货详细地址</th>
                        <th>收货人移动电话</th>
                        <th>收货人固定电话</th>
                        <th>商品编号</th>
                        <th>商品名称</th>
                        <th>商品价格(元)</th>
                        <th>商品SUK</th>
                        <th>商品个数</th>
                        <th>商品图片</th>
                        <th>运单ID</th>
                        <th>物流公司编码</th>
                        <th>交易ID</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if(isset($results)){
                ?>
                    <tr>
                        <td><?php echo $results['order_id']; ?>
                        </td>
                        <td><?php echo $results['order_status']; ?></td>
                        <td><?php echo $results['order_total_price']; ?></td>
                        <td><?php echo $results['order_create_time']; ?></td>
                        <td><?php echo $results['order_express_price']; ?></td>
                        <td><?php echo $results['buyer_openid']; ?></td>
                        <td><?php echo $results['buyer_nick']; ?></td>
                        <td><?php echo $results['receiver_name']; ?></td>
                        <td><?php echo $results['receiver_province']; ?></td>
                        <td><?php echo $results['receiver_city']; ?></td>
                        <td><?php echo $results['receiver_zone']; ?></td>
                        <td><?php echo $results['receiver_address']; ?></td>
                        <td><?php echo $results['receiver_mobile']; ?></td>
                        <td><?php echo $results['receiver_phone']; ?></td>
                        <td><?php echo $results['product_id']; ?></td>
                        <td><?php echo $results['product_name']; ?></td>
                        <td><?php echo $results['product_price']; ?></td>
                        <td><?php echo $results['product_sku']; ?></td>
                        <td><?php echo $results['product_count']; ?></td>
                        <td><img src="<?php echo $results['product_img']; ?>"></td>
                        <td><?php echo $results['delivery_id']; ?></td>
                        <td><?php echo $results['delivery_company']; ?></td>
                        <td><?php echo $results['trans_id']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table> -->
            <table class="table table-bordered table-hover definewidth m10">
                <thead>
                    <tr>
                        <th>订单号</th>
                        <th>订单状态</th>
                        <th>订单总价格</th>
                        <th>创建时间</th>
                        <th>运费</th>
                        <th>买家微信昵称</th>
                        <th>收货人姓名</th>
                        <th>收货人移动电话</th>
                        <th>收货人固定电话</th>
                        <th>商品名称</th>
                        <th>商品价格(元)</th>
                        <th>商品个数</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if(!empty($results))    :
                ?>
                    <tr>
                        <td><?php echo @$results['order_id']; ?></td>
                        <td><?php echo @$results['order_status']; ?></td>
                        <td><?php echo @$results['order_total_price']; ?></td>
                        <td><?php echo @$results['order_create_time']; ?></td>
                        <td><?php echo @$results['order_express_price']; ?></td>
                        <td><?php echo @$results['buyer_nick']; ?></td>
                        <td><?php echo @$results['receiver_name']; ?></td>
                        <td><?php echo @$results['receiver_mobile']; ?></td>
                        <td><?php echo @$results['receiver_phone']; ?></td>
                        <td><?php echo @$results['product_name']; ?></td>
                        <td><?php echo @$results['product_price']; ?></td>
                        <td><?php echo @$results['product_count']; ?></td>
                        <td></td>                        
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <?php 
            if(!empty($results)) :
            ?>
            <?php $link = site_url('show_find/do_complate').@$results['order_id']; ?>
            <div class="form-actions span13 offset3">
                <a href="<?php echo $status['status'] == '1' ?   '#'   :   $link; ?>" class="button button-primary">
                    <?php echo $status['status'] == '1' ?    '已销核'   :   '销核';  ?>   
                </a>
            </div>
            <?php endif; ?>
            <div style="clear:both;fontsize:16px">该订单号其他信息</div>
            
            <table class="table table-bordered table-hover definewidth m10">
                <thead>
                    <tr>
                        <th>交易ID</th>
                        <th>收货地址省份</th>
                        <th>收货地址城市</th>
                        <th>收货地址区/县</th>
                        <th>收货详细地址</th>
                        <th>商品编号</th>
                        <th>商品SKU</th>
                        <th>商品图片</th>
                        <th>买家微信OPENID</th>
                        <th>物流公司编码</th>
                        <th>运单ID</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if(!empty($results))    :
                ?>
                    <tr>
                        <td><?php echo @$results['trans_id']; ?></td>
                        <td><?php echo @$results['receiver_province']; ?></td>
                        <td><?php echo @$results['receiver_city']; ?></td>
                        <td><?php echo @$results['receiver_zone']; ?></td>
                        <td><?php echo @$results['receiver_address']; ?></td>
                        <td><?php echo @$results['product_id']; ?></td>
                        <td><?php echo @$results['product_sku']; ?></td>
                        <td></td>
                        <td><?php echo @$results['buyer_openid']; ?></td>
                        <td><?php echo @$results['delivery_company']; ?></td>
                        <td><?php echo @$results['delivery_id']; ?></td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
<body></html>