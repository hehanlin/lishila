
function AllAreaExcel(ID)  
{ 
var oXL = new ActiveXObject("Excel.Application");  
var oWB = oXL.Workbooks.Add();  
var oSheet = oWB.ActiveSheet;  
var sel=document.body.createTextRange(); 
sel.moveToElementText(ID); 
sel.select(); 
sel.execCommand("Copy"); 
oSheet.Paste(); 
oXL.Visible = true; 
} 
