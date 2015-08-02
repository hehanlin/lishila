<!DOCTYPE html>
<html lang="en">
<head>
  <title>添加用户</title>
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
  
    <form method="post" action="<?php echo site_url('admin/insertRow')?>" id="adminAdd" class="definewidth m10">
    
    <table class="table table-bordered table-hover ">
        
         <tbody><tr>
            <td width="20%" class="tableleft">昵称</td>
            <td width="80%"><input type="text" name="nickname" data-rules="{required:true,minlength:3,maxlength:20}"></td>
        </tr>
        <tr>
            <td width="20%" class="tableleft">真实姓名</td>
            <td width="80%"><input type="text" name="truename" data-rules="{required:true,minlength:3,maxlength:20}"></td>
        </tr>
        <tr>
          <td width="20%" class="tableleft">密码</td>
          <td width="80%"><input type="password" name="password" id="pwd1" data-rules="{required:true,password:true,minlength:3,maxlength:20}"></td>
        </tr>
        <tr>
          <td width="20%" class="tableleft">确认密码</td>
          <td width="80%"><input type="password" id="pwd2" data-rules="{equalTo:'#pwd1'}"></td>
        </tr>
        <tr>
            <td width="20%" class="tableleft">是否可用</td>
            <td width="80%"><input type="radio" value="1" checked="checked" name="status"/>可用&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" value="0" name="status"/>禁用</td>
        </tr>
        
        <tr>
            <td width="20%" class="tableleft">权限分配</td>
            <td width="80%">
              <?php foreach($aidAndInfo as $a)  :  ?>
                <label><input name="auth[]" type="checkbox" value="<?php echo $a['aid'] ?>" /><?php echo $a['info'] ?></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <?php endforeach; ?></td>
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
              srcNode : '#adminAdd'
            }).render();
          });
        </script>
  </body>
</html>