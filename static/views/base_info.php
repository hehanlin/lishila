<!DOCTYPE HTML>
<html>
 <head>
  <title> 首页介绍</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <link href="<?php echo AMTPLPATH; ?>assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo AMTPLPATH; ?>assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo AMTPLPATH; ?>assets/css/page-min.css" rel="stylesheet" type="text/css" />   <!-- 下面的样式，仅是为了显示代码，而不应该在项目中使用-->
   <link href="<?php echo AMTPLPATH; ?>assets/css/prettify.css" rel="stylesheet" type="text/css" />
  
    
   <style>
    select, textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input {
        padding: 1px;
    }

    select {
        height: 24px;
    }

    .radio{
        font-size: 11px;
        margin-bottom: 4px;
    }

    .nav{
        margin-bottom: 5px;
    }

    form{
        margin: 0 0 5px;
    }

    .page{
        text-align: right;margin-right:25px;margin-top:5px;
    }

    .page a{
        margin-left: 5px;
    }

    .page .current{
        margin-left: 5px;
        color: red;
    }

    .table td input[type="checkbox"]{
        padding: 0;
        margin: 0;
    }

    .table th input[type="checkbox"]{
        padding: 0;
        margin: 0;
    }

    .table td, .table th{
        padding-top: 8px;
        padding-bottom: 4px;
      line-height:20ppx;
      
    }
    .table th{
       
      background-color:#eaeaea;
    }

    .definewidth{
      width:60%;
      margin:auto;    
    }
    .m10{
      margin-top:10px;
    }
    .m20{
      padding-top:20px;
    }

    .tableleft{
      text-align:right;
      padding-left:5px;
      background-color:#f5f5f5;

    }

    .onShow,.onFocus,.onError,.onCorrect,.onLoad,.onTime{display:inline-block;display:-moz-inline-stack;zoom:1;*display:inline; vertical-align:middle;background:url(../Images/msg_bg.png) no-repeat; color:#444;line-height:18px;padding:2px 10px 2px 23px; margin-left:10px;_margin-left:5px}
    .onShow{background-position:3px -147px;border-color:#40B3FF;color:#959595}
    .onFocus{background-position:3px -147px;border-color:#40B3FF;}
    .onError{background-position:3px -47px;border-color:#40B3FF; color:red}
    .onCorrect{background-position:3px -247px;border-color:#40B3FF;}
    .onLamp{background-position:3px -200px}
    .onTime{background-position:3px -1356px}
  </style>
</head>
  <body>
  <h1>离石啦后台管理中心</h1>
    <form class="definewidth m10">
    
    <table class="table table-bordered table-hover ">
        
         <tbody><tr>
            <td width="50%" class="tableleft">离石啦后台管理中心</td>
            <td width="50%"></td>
        </tr>
        <tr>
            <td width="50%" class="tableleft">商家总数</td>
            <td width="50%"><?php echo $shop_sum; ?>个</td>
        </tr>
        <tr>
          <td width="50%" class="tableleft">活动总数</td>
          <td width="50%"><?php echo $active_sum; ?>个</td>
        </tr>
        <tr>
          <td width="50%" class="tableleft">广告发放</td>
          <td width="50%"><?php echo $ad_sum; ?>个</td>
        </tr>
        
        
    </tbody></table>
    </form>
  <script type="text/javascript" src="<?php echo AMTPLPATH; ?>assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="<?php echo AMTPLPATH; ?>assets/js/bui-min.js"></script>
  <script type="text/javascript" src="<?php echo AMTPLPATH; ?>assets/js/config-min.js"></script>
  <script type="text/javascript">
    BUI.use('common/page');
  </script>
  <!-- 仅仅为了显示代码使用，不要在项目中引入使用-->
  <script type="text/javascript" src="<?php echo AMTPLPATH; ?>assets/js/prettify.js"></script>
  <script type="text/javascript">
    $(function () {
      prettyPrint();
    });
  </script>  

</body>
</html>  