<!DOCTYPE html>
<html lang="en">
<head>
  <title>编辑广告</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="<?php echo AMTPLPATH ;?>assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo AMTPLPATH ;?>assets/css/bui-min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo AMTPLPATH ;?>assets/css/page-min.css" rel="stylesheet" type="text/css" />

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
      width:96%;
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
    <form enctype="multipart/form-data" method="post" action="<?php echo site_url('advert/updateRow')?>" id="form1" class="definewidth m10">
    
    <table class="table table-bordered table-hover ">
        
         <tbody><tr>
            <input type="hidden" name="oldname" value="<?php echo $arr['name'] ?>">
            <input type="hidden" name="aid" value="<?php echo $arr['aid'] ?>">
            <td width="20%" class="tableleft">广告名称</td>
            <td width="80%"><input type="text" value="<?php echo $arr['name'] ?>" name="name" data-rules="{required:true,minlength:1,maxlength:40}"></td>
        </tr>
        <tr>
            <td width="20%" class="tableleft">图片</td>
            <td width="80%"><input type="file" name="img" data-rules="{required:true}"></td>
        </tr>

        <tr>
            <td width="20%" class="tableleft">广告链接</td>
            <td width="80%"><input type="text" name="a" style="width:300px" value="<?php echo $arr['a'] ?>" data-rules="{required:true}"></td>
        </tr>
        <tr>
            <td width="20%" class="tableleft">是否可用</td>
            <td width="80%">
              <input type="radio" value="1" checked="checked" name="isintro"
                <?php echo $arr['isintro'] == 1 ? "checked='checked'"  : "" ;  ?>
              />可用

              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

              <input type="radio" value="0" name="isintro"
                <?php echo $arr['isintro'] == 0 ? "checked='checked'"  : "" ;  ?>
              />禁用
            </td>
        </tr>
        <tr>
            <td width="20%" class="tableleft">提交</td>
            <td width="80%"><input type="reset" value="重置" class="button button-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="确认添加" class="button button-success"></td>
        </tr>
        
    </tbody></table>
    </form>

    <script type="text/javascript" src="<?php echo AMTPLPATH ;?>assets/js/jquery-1.8.1.min.js"></script>
    <script type="text/javascript" src="<?php echo AMTPLPATH ;?>assets/js/bui-min.js"></script>
    <script type="text/javascript" src="<?php echo AMTPLPATH ;?>assets/js/config-min.js"></script>
    <script type="text/javascript">
          BUI.use('bui/form',function  (Form) {
            new Form.Form({
              srcNode : '#form1'
            }).render();
          });
        </script>
  </body>
</html>