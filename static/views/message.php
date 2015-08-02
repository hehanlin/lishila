<!DOCTYPE HTML>
<html>
 <head>
  <title> 页面操作</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <link href="<?php echo AMTPLPATH ;?>assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo AMTPLPATH ;?>assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo AMTPLPATH ;?>assets/css/page-min.css" rel="stylesheet" type="text/css" />
    <meta http-equiv="refresh" content="<?php echo $wait; ?>;url=<?php echo $url; ?>" />
 </head>
 <body>
  
  <div class="container">
    <div class="row">
      <div class="span10">
        <div class="tips tips-large tips-success">
          <span class="x-icon x-icon-success"><i class="icon icon-ok icon-white"></i></span>
          <div class="tips-content">
            <h2><?php echo $message; ?></h2>
            <h3><?php echo $wait; ?>秒后跳转!</h3>
          </div>
        </div>
      </div> 
    </div>
  </div>
  <script type="text/javascript" src="<?php echo AMTPLPATH ;?>assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="<?php echo AMTPLPATH ;?>assets/js/bui-min.js"></script>

  <script type="text/javascript" src="<?php echo AMTPLPATH ;?>assets/js/config-min.js"></script>
  <script type="text/javascript">
    BUI.use('common/page');
  </script> 

<body>
</html>  