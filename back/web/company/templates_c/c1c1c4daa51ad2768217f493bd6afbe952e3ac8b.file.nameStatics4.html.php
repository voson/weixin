<?php /* Smarty version Smarty-3.0.6, created on 2013-12-17 13:11:41
         compiled from "./nameStatics4.html" */ ?>
<?php /*%%SmartyHeaderCode:513352afdd0de1b295-84156174%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1c1c4daa51ad2768217f493bd6afbe952e3ac8b' => 
    array (
      0 => './nameStatics4.html',
      1 => 1387256562,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '513352afdd0de1b295-84156174',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在售车型</title>
<script type="text/javascript" src="../../res/js/jquery-1.4.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../res/css/nameList.css" />
<link rel="stylesheet" href="../../res/css/datepicker.css" type="text/css" />
<script src="../../res/js/nameList.js"></script>
<script src="<?php echo $_smarty_tpl->getVariable('tempData')->value;?>
 "></script>
<script type="text/javascript">
	window.onload = function () {
		pageQie(0);
		var tb = document.getElementById("tbody");
		var tbody = tb.getElementsByTagName("tbody")[0];
		var trs = tbody.getElementsByTagName("tr");

		for (var i = 0; i < trs.length; i++) {
			if (i % 2 != 0) {
				trs[i].style.backgroundColor = "#fcfcfc";
			}
		}
		
	};
	
	<?php if ($_smarty_tpl->getVariable('choice')->value=='0'){?> 
	function pageQie(page){
		var str="<tbody><tr class='tTitle'><td class='date'>"+"报名日期"+"</td><td class='series'>"+
					 "车系</td><td class='model'>"+
					 "车型</td><td class='name'>"+
					 "姓名</td><td class='phone'>"+
					 "联系方式</td><td class='willBuyTime'>"+
					 "预约时间</td><td class='operation'>"+
					 "操作</td>";
		var show=10;
		for(var i=page*show;i<(page+1)*show&&i<dataJson.length;i++){
			str+="<tr><td class='date'>"+dataJson[i].date+"</td><td class='brand'>"+
					 dataJson[i].series+"</td><td class='model'>"+
					 dataJson[i].model+"</td><td class='name'>"+
					 dataJson[i].name+"</td><td class='phone'>"+
					 dataJson[i].telephone+"</td><td class='willBuyTime'>"+
					 dataJson[i].willBuyTime+"</td><td class='operation'><a onclick='return confirm(\"是否删除此购车报名？\")' href='operation.php?action=delGroUser&id="+dataJson[i].group_id+"'>删除</a></td>"+
				 +"</tr>"	;
		}
		str+="</tbody>";
		$('#tbody').html(str);
		
		var numPage=Math.ceil(dataJson.length/show);
		var pageStr='';
		for(var k=1;k<=numPage;k++){
			pageStr+="<a href='javascript:void(0)' onclick='pageQie("+(k-1)+")'>"+k+"</a>";
		}
		$('#pageShow').html(pageStr);
	}
	<?php }else{ ?> 
	data=decodeURI('<?php echo $_smarty_tpl->getVariable('choice')->value;?>
');
	dataArr=data.split(',');
 
	var m=0;
	var finalJson=new Array();
    for(var k=0;k<dataJson.length;k++){
		flag=0;
		//先筛选日期
		if(new Date(dataArr[2])<=new Date(dataJson[k].date)){
			flag=1;
		}else{
			flag=0;
		}
		
		if(flag==1&&new Date(dataArr[3])>=new Date(dataJson[k].date)){
			flag=1;
		}else{
			flag=0;
		}
		//alert(flag+' k: '+k);
		if(flag==1&&dataArr[0]=='0'){
			flag=1;
		}else if(flag==1&&dataArr[0]==dataJson[k].series){
			flag=1;
		}else{
			flag=0;
		}
		
		if(flag==1&&dataArr[1]=='0'){
			flag=1;
		}else if(flag==1&&dataArr[1]==dataJson[k].model){
			flag=1;
		}else{
			flag=0;
		}
		
		if(flag==1&&dataArr[4]=='0'){
			flag=1;
		}else if(flag==1&&dataArr[4]==dataJson[k].willBuyTime){
			flag=1;
		}else{
			flag=0;
		}
		//	
		if(flag==1){
			finalJson[m]=dataJson[k];
			m++
		}
	}
	function pageQie(page){
		var str="<tbody><tr class='tTitle'><td class='date'>"+"报名日期"+"</td><td class='series'>"+
					 "车系</td><td class='model'>"+
					 "车型</td><td class='name'>"+
					 "姓名</td><td class='phone'>"+
					 "联系方式</td><td class='willBuyTime'>"+
					 "预约时间</td><td class='operation'>"+
					 "操作</td>";
		var show=10;
		for(var i=page*show;i<(page+1)*show&&i<finalJson.length;i++){
			str+="<tr><td class='date'>"+finalJson[i].date+"</td><td class='brand'>"+
					 finalJson[i].series+"</td><td class='model'>"+
					 finalJson[i].model+"</td><td class='name'>"+
					 finalJson[i].name+"</td><td class='phone'>"+
					 finalJson[i].telephone+"</td><td class='willBuyTime'>"+
					 finalJson[i].willBuyTime+"</td><td class='operation'><a onclick='return confirm(\"是否删除此购车报名？\")' href='operation.php?action=delGroUser&id="+finalJson[i].group_id+"'>删除</a></td>"+
				 +"</tr>"	;
		}
		str+="</tbody>";
		$('#tbody').html(str);
		
		var numPage=Math.ceil(m/show);
		var pageStr='';
		for(var k=1;k<=numPage;k++){
			pageStr+="<a href='javascript:void(0)' onclick='pageQie("+(k-1)+")'>"+k+"</a>";
		}
		$('#pageShow').html(pageStr);
	}
	<?php }?> 
</script>
</head>

<body>
    	<div class="carTable">
        	<table id="tbody" class="tbody" >  	
            </table>
      </div>
      <div class="page" style="clear:both; font-size:14px; padding-top:15px;"> 
         <p class="page" align="center" id="pageShow"><?php echo $_smarty_tpl->getVariable('pageshow')->value;?>
</p>   <!-- 显示页码-->
      </div>
      
</body>
</html>
