function del(obj)
      {
        if(confirm("确认删除么?"))
        {
          $.ajax({
            type:'get',
            url:'<?php echo site_url('Shop/test'); ?>',
            datatype:'json',
            data:{sid:obj.dataset.id},
            success:function(data)
            {
              if(data == 1 || data == "1")
              {
                alert("删除成功!");
                var tr = obj.parentNode.parentNode;
                tr.style.display='none';
              }
            }
          })
        }
      }