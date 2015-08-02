/**
 * @author hehanlin
 * @time 2015/05/08
 * 表单验证
 */


function validation_required(obj)
{
	var val = obj.value;

	if(val == null || val == '')
	{
		this.parentNode.innerHTML += '<span style="color:red;font-size:14px;">不能为空!</span>';
	}
}