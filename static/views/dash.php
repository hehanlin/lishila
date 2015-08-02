<!DOCTYPE HTML>
<html>
 <head>
  <title>离石啦后台管理系统</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="<?php echo AMTPLPATH; ?>assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo AMTPLPATH; ?>assets/css/bui-min.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo AMTPLPATH; ?>assets/css/main-min.css" rel="stylesheet" type="text/css" />
 </head>
 <body>

  <div class="header">
    
      <div class="dl-title">
                  <span class="lp-title-port">离石啦</span><span class="dl-title-text">后台管理系统</span>
      </div>

    <div class="dl-log">欢迎您，<span class="dl-log-user"></span><a href="<?php echo base_url(); ?>index.php/login/logout" title="退出系统" class="dl-log-quit">[退出]</a><a href="http://http://www.builive.com/" title="文档库" class="dl-log-quit">文档库</a>
    </div>
  </div>
   <div class="content">
    <div class="dl-main-nav">
      <div class="dl-inform"><div class="dl-inform-title">贴心小秘书<s class="dl-inform-icon dl-up"></s></div></div>
      <ul id="J_Nav"  class="nav-list ks-clear">
        <li class="nav-item dl-selected"><div class="nav-item-inner nav-home">首页</div></li>
        <li class="nav-item"><div class="nav-item-inner nav-supplier">用户管理</div></li>
        <li class="nav-item"><div class="nav-item-inner nav-inventory">商户信息</div></li>
        <li class="nav-item"><div class="nav-item-inner  nav-order">活动信息</div></li>
        <li class="nav-item"><div class="nav-item-inner  nav-order">类别管理</div></li>
        <li class="nav-item"><div class="nav-item-inner  nav-order">广告管理</div></li>
      </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">

    </ul>
   </div>
  <script type="text/javascript" src="<?php echo AMTPLPATH; ?>assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="<?php echo AMTPLPATH; ?>assets/js/bui.js"></script>
  <script type="text/javascript" src="<?php echo AMTPLPATH; ?>assets/js/config.js"></script>

  <script>
    BUI.use('common/main',function(){
      var config = [
          //home
          {
            id:'home', 
            homePage : 'code',
            menu:[{
                text:'首页内容',
                items:[
                  {id:'code',text:'站点介绍',href:'<?php echo base_url(); ?>index.php/base_info',closeable : true}
                ]
            }]
          },
          //admin
          {
		        id:'admin',
		        menu:[
            {
              text:'用户信息',
              items:[
                {id:'adminIndex',text:'用户信息',href:'<?php echo base_url(); ?>index.php/admin/index',closeable : true},
              ]
            },
            {
			        text:'用户管理',
              items:[
                {id:'adminAdd',text:'添加用户',href:'<?php echo base_url(); ?>index.php/admin/add',closeable : true},
				        {id:'adminManage',text:'管理用户',href:'<?php echo base_url(); ?>index.php/admin/manage',closeable : true},
				        {id:'adminSee',text:'查看用户',href:'<?php echo base_url(); ?>index.php/admin/see',closeable : true}				
              ]
            },
            {
              text:'权限管理',
              items:[
                {id:'authAdd',text:'添加权限',href:'<?php echo base_url(); ?>index.php/auth/add',closeable : true},
                {id:'authManage',text:'管理权限',href:'<?php echo base_url(); ?>index.php/auth/manage',closeable : true},
                {id:'authSee',text:'查看权限',href:'<?php echo base_url(); ?>index.php/auth/see',closeable : true}        
              ]
            }]
          },
          //shop
          {
            id:'shop',
            menu:[{
              text:'商户管理',
              items:[
                {id:'shopAdd',text:'添加商户',href:'<?php echo base_url(); ?>index.php/shop/add',closeable : true},
                {id:'shopIndex',text:'管理商户',href:'<?php echo base_url(); ?>index.php/shop/manage',closeable : true},
                {id:'shopSee',text:'查看商户',href:'<?php echo base_url(); ?>index.php/shop/see',closeable : true}        
              ]
            }]
          },

          //active
          {
            id:'active',
            menu:[{
              text:'活动管理',
              items:[
                {id:'activeAdd',text:'添加活动',href:'<?php echo base_url(); ?>index.php/active/add',closeable : true},
                {id:'activeIndex',text:'管理活动',href:'<?php echo base_url(); ?>index.php/active/manage',closeable : true},
                {id:'activeSee',text:'查看活动',href:'<?php echo base_url(); ?>index.php/active/see',closeable : true}        
              ]
            }]
          },

          //type
          {
            id:'type',
            menu:[{
              text:'类别管理',
              items:[
                {id:'typeAdd',text:'添加类别',href:'<?php echo base_url(); ?>index.php/type/add',closeable : true},
                {id:'typeIndex',text:'管理类别',href:'<?php echo base_url(); ?>index.php/type/manage',closeable : true},
                {id:'typeSee',text:'查看类别',href:'<?php echo base_url(); ?>index.php/type/see',closeable : true}        
              ]
            }]
          },

          //advert
          {
            id:'advert',
            menu:[{
              text:'广告管理',
              items:[
                {id:'advertAdd',text:'添加广告',href:'<?php echo base_url(); ?>index.php/advert/add',closeable : true},
                {id:'advertIndex',text:'管理广告',href:'<?php echo base_url(); ?>index.php/advert/manage',closeable : true},
                {id:'advertSee',text:'查看广告',href:'<?php echo base_url(); ?>index.php/advert/see',closeable : true}        
              ]
            }]
          },
		  ];
      new PageUtil.MainPage({
        modulesConfig : config
      });
    });
  </script>
 </body>
</html>
