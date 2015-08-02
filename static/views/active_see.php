<!DOCTYPE html>
<html lang="en">
<head>
  <title>查看活动</title>
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
    
      <form method="GET" action="<?php echo site_url('active/manage');  ?>" id="" class="form-inline definewidth m20">
     
          
    
          &nbsp;&nbsp;活动名称:<input type="text" name="name" class="input-default">
          &nbsp;&nbsp;所属商户:<select data-rules="{required:true}" name="sid" class="input-default">
                <option value="">请选择...</option>
                <?php foreach($shop as $v)  :  ?>
                  <option value="<?php echo $v['sid']; ?>"><?php echo $v['truename']; ?></option>
                <?php endforeach; ?>
              </select>
           &nbsp;&nbsp;<input type="submit" value="查询" id="Button1" class="button button-primary">&nbsp;&nbsp;  
          <input type="submit" value="导出数据" id="Button2" class="button button-success">
          </form>

      <div id="tab"> 
      <table class="table table-bordered table-hover definewidth m10">
                  <thead>
                  <tr>
                       <th>序号</th>
                      <th>活动名称</th>
                      <th>所属商户</th>
                      <th>状态</th>
                  </tr>
                  </thead>
                  
                    <tbody>
                    <?php foreach($list as $v) :  ?>
                    
                      <tr>
                        <td><?php echo $v['aid']; ?></td>
                        <td><?php echo $v['name']; ?></td>
                        <td>
                            <?php 
                                foreach ($shop as $val) {
                                  if($val['sid'] == $v['sid'])echo $val['truename']; 
                                }
                             ?>
                        </td>
                        <td><?php echo $v['status']  == 1  ? "可用" : "禁用"  ; ?></td>
                      
                      </tr>

                    <?php endforeach; ?>

                      
                  
                      <tr>
                        <td style="text-align: right" colspan="14">
              <?php echo $page; ?>
              </td>
                      </tr>
                    </tbody>
              </table>
       </div>

    <script type="text/javascript" src="<?php echo AMTPLPATH ;?>assets/js/jquery-1.8.1.min.js"></script>
    <script type="text/javascript" src="<?php echo AMTPLPATH ;?>assets/js/bui-min.js"></script>
    <script type="text/javascript" src="<?php echo AMTPLPATH ;?>assets/js/config-min.js"></script>
    </body>
    </html>
