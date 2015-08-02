<!DOCTYPE HTML>
<html>
<head>
  <title>离石啦后台管理系统</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="<?php echo AMTPLPATH; ?>assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo AMTPLPATH; ?>assets/css/bui-min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo AMTPLPATH; ?>assets/css/main-min.css" rel="stylesheet" type="text/css" /></head>
<body>

  <div class="header">

    <div class="dl-title">
      <span class="lp-title-port">离石啦</span>
      <span class="dl-title-text">后台管理系统</span>
    </div>

    <div class="dl-log">
      欢迎您，
      <span class="dl-log-user"><?php echo $this->session->userdata('user'); ?></span>
      <a href="<?php echo site_url('login/logout') ?>" title="退出系统" class="dl-log-quit">[退出]</a>
    </div>
  </div>
  <div class="content">
    <div class="dl-main-nav">
      <div class="dl-inform">
        <div class="dl-inform-title">
          贴心小秘书
          <s class="dl-inform-icon dl-up"></s>
        </div>
      </div>
      <ul id="J_Nav"  class="nav-list ks-clear">
        <li class="nav-item dl-selected">
          <div class="nav-item-inner nav-home">首页</div>
        </li>
        <li class="nav-item">
          <div class="nav-item-inner nav-inventory">商户信息</div>
        </li>
        <li class="nav-item">
          <div class="nav-item-inner  nav-order">订单信息</div>
        </li>
      </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten"></ul>
  </div>
  <script type="text/javascript" src="<?php echo AMTPLPATH; ?>assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="<?php echo AMTPLPATH; ?>assets/js/bui.js"></script>
  <script type="text/javascript" src="<?php echo AMTPLPATH; ?>assets/js/config.js"></script>

  <script>
    BUI.use('common/main',function(){
      var config = [{
          id:'menu', 
          homePage : 'code',
          menu:[{
              text:'首页内容',
              items:[
                {id:'code',text:'站点介绍',href:'<?php echo base_url(); ?>index.php/base_info',closeable : true}
              ]
            }]
          },{
      id:'user',
      homePage : 'code',
      menu:[{
        text:'商户信息',
              items:[
                {id:'code',text:'商户信息',href:'<?php echo base_url(); ?>index.php/update_seller_info',closeable : true}
              ] 
        }
        ]},{
          id:'order', 
          homePage : 'code',
          menu:[{
              text:'订单信息',
              items:[
                // {id:'uncomplete',text:'未完成订单',href:'<?php echo base_url(); ?>index.php/show_orders',closeable : true},
                {id:'code',text:'查询订单',href:'<?php echo base_url(); ?>index.php/show_find',closeable : true},
                // {id:'complete',text:'历史订单',href:'<?php echo base_url(); ?>index.php/show_history',closeable : true}
              ]
            }]
          }
      ];
      new PageUtil.MainPage({
        modulesConfig : config
      });
    });
  </script>
</body>
</html>