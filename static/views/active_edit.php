<p>
  <!DOCTYPE html>
  <html lang="en">
<head>
    <title>添加活动</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php echo AMTPLPATH ;?>assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo AMTPLPATH ;?>assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo AMTPLPATH ;?>assets/css/page-min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url('static/kindeditor').'/'; ?>themes/default/default.css" />
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
      line-height:25px;
      
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

    <form method="post" enctype="multipart/form-data"  action="<?php echo site_url('active/updateRow') ?>
      " id="form1" class="definewidth m10">
      <table class="table table-bordered table-hover ">

        <tbody>
          <tr>
            <input type="hidden" value="<?php echo $arr['name'] ?>" name="oldname"/>
            <input type="hidden" value="<?php echo $arr['aid'] ?>" name="aid"/>

            <td width="20%" class="tableleft">活动名称</td>
            <td width="80%">
              <input type="text" value="<?php echo $arr['name'] ?>" name="name" style="width:200px;height:20px"  data-rules="{required:true,minlength:1,maxlength:20}"></td>
          </tr>
          <tr>
            <td width="20%" class="tableleft">所属商户</td>
            <td width="80%">
              <select data-rules="{required:true}" name="sid">
                <?php foreach($shop as $v)  :  ?>
                  <option value="<?php echo $v['sid']; ?>"
                  <?php echo $arr['sid'] == $v['sid']  ?  "selected='true'"  :   ''  ; ?>
                  ><?php echo $v['truename']; ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </td>
          </tr>
          <tr>
            <td width="20%" class="tableleft">原价</td>
            <td width="80%">
              <input type="text" value="<?php echo $arr['old_price'] ?>" name="old_price" style="width:200px;height:20px"  data-rules="{required:true,number:true}"></td>
          </tr>
          <tr>
            <td width="20%" class="tableleft">现价</td>
            <td width="80%">
              <input type="text" value="<?php echo $arr['now_price'] ?>" name="now_price" style="width:200px;height:20px"  data-rules="{required:true,number:true}"></td>
          </tr>
          <tr>
            <td width="20%" class="tableleft">购买链接</td>
            <td width="80%">
              <input type="text" value="<?php echo $arr['alink'] ?>" name="alink" style="width:200px;height:20px" data-rules="{required:true}"></td>
          </tr>
          <tr>
            <td width="20%" class="tableleft">图片</td>
            <td width="80%">
              <input type="file" name="img" data-rules="{required:true}"></td>
          </tr>
          <tr>
            <td width="20%" class="tableleft">开始时间</td>
            <td width="80%">
                <input type="text" value="<?php echo $arr['start_time'] ?>" style="width:200px;height:20px"  class="calendar calendar-time" name="start_time" data-rules="{required:true}"/>
            </td>
          </tr>
          <tr>
            <td width="20%" class="tableleft">结束时间</td>
            <td width="80%">
              <input type="text" value="<?php echo $arr['end_time'] ?>" style="width:200px;height:20px"  class="calendar calendar-time" name="end_time" data-rules="{required:true}"/>
            </td>
          </tr>
          <tr>
            <td width="20%" class="tableleft">套餐详情</td>
            <td width="80%">
              <textarea id="editor_id1" name="package"  style="width:700px;height:300px;"><?php echo $arr['package'] ?></textarea>
            </td>
          </tr>
          <tr>
            <td width="20%" class="tableleft">购买须知</td>
            <td width="80%">
              <textarea id="editor_id2" name="desc" style="width:700px;height:300px;"><?php echo $arr['desc'] ?></textarea>
            </td>
          </tr>
          <tr>
            <td width="20%" class="tableleft">排序依据</td>
            <td width="80%">
              <input type="text" value="<?php echo $arr['flag'] ?>" name="flag" style="width:200px;height:20px"  value="0" data-rules="{required:true}"></td>
          </tr>
         <tr>
            <td width="20%" class="tableleft">是否可用</td>
            <td width="80%">
              <input type="radio" value="1" checked="checked" name="status"
                <?php echo $arr['status'] == 1 ? "checked='checked'"  : "" ;  ?>
              />可用

              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

              <input type="radio" value="0" name="status"
                <?php echo $arr['status'] == 0 ? "checked='checked'"  : "" ;  ?>
              />禁用
            </td>
        </tr>

          <tr>
            <td width="20%" class="tableleft">提交</td>
            <td width="80%">
              <input type="reset" value="重置" class="button button-primary">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="submit" value="确认添加" class="button button-success" id="sub"></td>
          </tr>

        </tbody>
      </table>
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
    <script type="text/javascript">

           BUI.use('bui/calendar',function(Calendar){

             var datepicker = new Calendar.DatePicker({

               trigger:'.calendar',

               autoRender : true

             });

           });

    </script>

    <!--kindeditor-->
    <script charset="utf-8" src="<?php echo base_url('static/kindeditor').'/'; ?>kindeditor-min.js"></script>
    <script charset="utf-8" src="<?php echo base_url('static/kindeditor').'/'; ?>lang/zh_CN.js"></script>
    <script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id1');
        });

        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id2');
        });
    </script>
</body>
  </html>


