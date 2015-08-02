<!DOCTYPE html>
<html lang="en">
<head>
  <title>用户管理</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="../bui/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
  <link href="../bui/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
  <link href="../bui/assets/css/page-min.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <div class="container">
    <div class="row">
      <form id="searchForm" class="form-horizontal span24">
        <div class="row">
          <div class="control-group span8">
            <label class="control-label">用户编号：</label>
            <div class="controls">
              <input type="text" class="control-text" name="user_id">
            </div>
          </div>
          <div class="control-group span8">
            <label class="control-label">用户姓名：</label>
            <div class="controls">
              <input type="text" class="control-text" name="user_name">
            </div>
          </div>
          <div class="control-group span8">
            <label class="control-label">性别：</label>
            <div class="controls" >
              <select name="" id="" name="sex">
                <option value="">男</option>
                <option value="">女</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="span3 offset2">
            <button  type="button" id="btnSearch" class="button button-primary">搜索</button>
          </div>
        </div>
      </form>
    </div>
    <div class="search-grid-container">
      <div id="grid"></div>
    </div>

  </div>
  <div id="content" class="hide">
      <form id="J_Form" class="form-horizontal" action="../data/edit.php?a=1">
        <input type="hidden" name="a" value="3">
        <div class="row">
          <div class="control-group span8">
            <label class="control-label"><s>*</s>用户姓名</label>
            <div class="controls">
              <input name="user_name" type="text" data-rules="{required:true}" class="input-normal control-text">
            </div>
          </div>
          <div class="control-group span8">
            <label class="control-label"><s>*</s>性别：</label>
            <div class="controls">
              <select  data-rules="{required:true}"  name="sex" class="input-normal"> 
                <option value="">请选择</option>
                <option value="1">男</option>
                <option value="0">女</option>
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="control-group span15">
            <label class="control-label">住址</label>
            <div class="controls control-row4">
              <textarea name="address" class="input-large" type="text"></textarea>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="control-group span8">
            <label class="control-label">联系方式</label>
            <div class="controls">
              <input name="tel" type="text" data-rules="{required:false}" class="input-normal control-text">
            </div>
          </div>
          <div class="control-group span8">
            <label class="control-label">邮箱</label>
            <div class="controls">
              <input name="email" type="text" data-rules="{required:false}" class="input-normal control-text">
            </div>
          </div>
        </div>

      </form>
    </div>
  <script type="text/javascript" src="../bui/assets/js/jquery-1.8.1.min.js"></script>
  <script type="text/javascript" src="../bui/assets/js/bui-min.js"></script>
  <script type="text/javascript" src="../bui/assets/js/config-min.js"></script>
  <script type="text/javascript">
    BUI.use('common/page');
  </script>
    
    <script type="text/javascript">
      $(function () {
        prettyPrint();
      });
    </script> 
  <script type="text/javascript">
    BUI.use('common/search',function (Search) {
      
      var enumObj = {"1":"男","0":"女"},
        editing = new BUI.Grid.Plugins.DialogEditing({
          contentId : 'content', //设置隐藏的Dialog内容
          autoSave : true, //添加数据或者修改数据时，自动保存
          triggerCls : 'btn-edit'
        }),
        columns = [
            {title:'用户编号',dataIndex:'user_id',width:80,renderer:function(v){
              return Search.createLink({
                id : 'detail' + v,
                title : '用户信息',
                text : v,
                href : '../bui/detail/example.html'
              });
            }},
            {title:'用户姓名',dataIndex:'user_name',width:100},
            {title:'性别',dataIndex:'sex',width:60,renderer:BUI.Grid.Format.enumRenderer(enumObj)},
            {title:'住址',dataIndex:'address',width:300},
            {title:'联系方式',dataIndex:'tel',width:150},
            {title:'邮箱',dataIndex:'email',width:200},
            {title:'操作',dataIndex:'',width:200,renderer : function(value,obj){
              var editStr =  Search.createLink({ //链接使用 此方式
                  id : 'edit' + obj.id,
                  title : '编辑用户信息',
                  text : '打开编辑',
                  href : '../bui/form/example.html'
                }),
                editStr1 = '<span class="grid-command btn-edit" title="编辑用户信息">弹出编辑</span>',
                delStr = '<span class="grid-command btn-del" title="删除信息">删除</span>';//页面操作不需要使用Search.createLink
              return editStr +  editStr1 + delStr;
            }}
          ],
        store = Search.createStore('../bui/data/user.json',{
          proxy : {
            save : { //也可以是一个字符串，那么增删改，都会往那么路径提交数据，同时附加参数saveType
              addUrl : '../bui/data/add.json',
              updateUrl : '../bui/data/edit.json',
              removeUrl : '../bui/data/del.php'
            }/*,
            method : 'POST'*/
          },
          autoSync : true //保存数据后，自动更新
        }),
        gridCfg = Search.createGridCfg(columns,{
          tbar : {
            items : [
              {text : '<i class="icon-plus"></i>添加用户',btnCls : 'button button-small',handler:addFunction},
              {text : '<i class="icon-edit"></i>编辑',btnCls : 'button button-small',handler:function(){alert('编辑');}},
              {text : '<i class="icon-remove"></i>删除',btnCls : 'button button-small',handler : delFunction}
            ]
          },
          plugins : [editing,BUI.Grid.Plugins.CheckSelection,BUI.Grid.Plugins.AutoFit] // 插件形式引入多选表格
        });

      var  search = new Search({
          store : store,
          gridCfg : gridCfg
        }),
        grid = search.get('grid');

      function addFunction(){
        var newData = {isNew : true}; //标志是新增加的记录
        editing.add(newData,'name'); //添加记录后，直接编辑
      }

      //删除操作
      function delFunction(){
        var selections = grid.getSelection();
        delItems(selections);
      }

      function delItems(items){
        var ids = [];
        BUI.each(items,function(item){
          ids.push(item.id);
        });

        if(ids.length){
          BUI.Message.Confirm('确认要删除选中的记录么？',function(){
            store.save('remove',{ids : ids});
          },'question');
        }
      }

      //监听事件，删除一条记录
      grid.on('cellclick',function(ev){
        var sender = $(ev.domTarget); //点击的Dom
        if(sender.hasClass('btn-del')){
          var record = ev.record;
          delItems([record]);
        }
      });
    });
  </script>

  </body>
</html>