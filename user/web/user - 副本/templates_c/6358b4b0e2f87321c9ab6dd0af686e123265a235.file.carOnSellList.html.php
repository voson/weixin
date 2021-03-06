<?php /* Smarty version Smarty-3.0.6, created on 2013-12-20 10:08:05
         compiled from "./carOnSellList.html" */ ?>
<?php /*%%SmartyHeaderCode:248952b417055b5426-07638193%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6358b4b0e2f87321c9ab6dd0af686e123265a235' => 
    array (
      0 => './carOnSellList.html',
      1 => 1386248996,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '248952b417055b5426-07638193',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="title" content="微信微店">
<meta name="apple-touch-fullscreen" content="YES">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<title><?php echo $_smarty_tpl->getVariable('comName')->value;?>
</title>
<link rel="stylesheet" href="../../res/css/menu.css" type="text/css" />
<link rel="stylesheet" href="../../res/css/carOnSellList.css">
</head>
<script type="text/javascript" src="../../res/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('dataJson')->value;?>
"></script>
<script language="javascript">
   window.onload=function(){
	   var temp='';
	   var contStr='';
	   var headStr=''; var headNum=0;
	   var str='';

	   for(var i=0;i<dataJson.length;i++){
		   if(dataJson[i].series!=temp){
			   if(i!=0){
			   headStr="<div class='menuDiv'><h3>"+temp+"<p class='menuDivP'>"+headNum+"款在售</p></h3><ul>";
			   
			   str+=headStr+contStr+"</ul></div>";
			   }
			   headNum=1;
			   temp=dataJson[i].series;

			   contStr="<li><div class='carList'>"+
                    "<div class='carModel'><p>"+dataJson[i].model+"</p></div>"+
                    "<div class='carImg'><img class='carPic' src='../../../"+dataJson[i].pic+"'></div>"+
                    "<div class='describe'>"+
                        "<div class='price'><p class='fakePrice'><s>指导价："+dataJson[i].price+"万</s></p><p class='realPrice'>优惠价："+(dataJson[i].price-dataJson[i].discount).toFixed(2)+"万</p></div>"+
                        "<a href='carOnSell.php?carId="+dataJson[i].car_id+"#mp.weixin.qq.com' id='goSignup'>抢订微价</a></div></div></li>";
		   }else{
			   contStr+="<li><div class='carList'>"+
                    "<div class='carModel'><p>"+dataJson[i].model+"</p></div>"+
                    "<div class='carImg'><img class='carPic' src='../../../"+dataJson[i].pic+"'></div>"+
                    "<div class='describe'>"+
                        "<div class='price'><p class='fakePrice'><s>指导价："+dataJson[i].price+"万</s></p><p class='realPrice'>优惠价："+(dataJson[i].price-dataJson[i].discount).toFixed(2)+"万</p></div>"+
                        "<a href='carOnSell.php?carId="+dataJson[i].car_id+"#mp.weixin.qq.com' id='goSignup'>抢订微价</a></div></div></li>";
			   headNum++;
		   }
	   }
	   headStr="<div class='menuDiv'><h3>"+temp+"<p class='menuDivP'>"+headNum+"款在售</p></h3><ul>";
			   
	   str+=headStr+contStr+"</ul></div>";
	   
	   $('#mainBody').html(str);
	   
	    var mSwitch = new MenuSwitch("menuDiv");
		mSwitch.setDefault(0);
		mSwitch.setPrevious(false);
		mSwitch.init();
		//修改父级页面
		hashH = document.documentElement.scrollHeight; 
	    urlC = "http://113.107.219.208/agent.html";
		document.getElementById("iframeC").src=""; 
	    document.getElementById("iframeC").src=urlC+"#"+hashH;
   }
   
</script>
<body>

	<div class="goback" style="width:100%;height:47px;background:#000;position:fixed; top:0; text-align:center; z-index:77;">
		<p style="color:#fff; position:relative;-webkit-margin-before: 1em;-webkit-margin-after: 1em;-webkit-margin-start: 0px;
-webkit-margin-end: 0px;">车型列表</p>
        <a href="homepage.php" style="display:block;width:27px;height:27px;color:#000; position:fixed; top:0; margin-left:6%; margin-top:8px;"><img src="../../res/img/back.png" width="33" height="33"/></a>	
    </div>
    <div style="width:100%; height:47px;"></div>
    <div id="mainBody">
    </div>
	
    <div class="footer">
    	<p class="tengxun">腾讯汽车</p>
        <p>Copyright © 1998 - 2013 Tencent. All Rights Reserved</p>
    </div>
     <iframe id="iframeC" name="iframeC" src="" width="0" height="0" style="display:none;"></iframe>
<script type="text/javascript">
function MenuSwitch(className){     
    this._elements = [];
    this._default = -1;
    this._className = className;
    this._previous = false;
}
MenuSwitch.prototype.setDefault = function(id){
    this._default = Number(id);
}
MenuSwitch.prototype.setPrevious = function(flag){
    this._previous = Boolean(flag);
}
MenuSwitch.prototype.collectElementbyClass = function(){
    this._elements = [];
    var allelements = document.getElementsByTagName("div");
    for(var i=0;i<allelements.length;i++){
        var mItem = allelements[i];
        if (typeof mItem.className == "string" && mItem.className == this._className){
            var h3s = mItem.getElementsByTagName("h3");
            var uls = mItem.getElementsByTagName("ul");
            if(h3s.length == 1 && uls.length == 1){
                h3s[0].style.cursor = "hand";                   
                if(this._default == this._elements.length){
                    uls[0].style.display = "block"; 
                }else{
                    uls[0].style.display = "none";  
                }
                this._elements[this._elements.length] = mItem;
            }               
        }
    }
}
MenuSwitch.prototype.open = function(mElement){
    var uls = mElement.getElementsByTagName("ul");
    uls[0].style.display = "block";		     
}
MenuSwitch.prototype.close = function(mElement){
    var uls = mElement.getElementsByTagName("ul");
    uls[0].style.display = "none";
	
}
MenuSwitch.prototype.isOpen = function(mElement){
    var uls = mElement.getElementsByTagName("ul");      
    return uls[0].style.display == "block";
}
MenuSwitch.prototype.toggledisplay = function(header){
    var mItem;
    if(window.addEventListener){
        mItem = header.parentNode;
    }else{
        mItem = header.parentElement;
    }
    if(this.isOpen(mItem)){
        this.close(mItem);
    }else{
        this.open(mItem);
    }       
    if(!this._previous){
        for(var i=0;i<this._elements.length;i++){
            if(this._elements[i] != mItem){             
                var uls = this._elements[i].getElementsByTagName("ul");
                uls[0].style.display = "none";      
            }
        }
				//修改父级页面
		hashH = document.documentElement.scrollHeight; 
	    urlC = "http://113.107.219.208/agent.html";
		document.getElementById("iframeC").src=""; 
	    document.getElementById("iframeC").src=urlC+"#"+hashH; 
		var URL =  document.getElementById("iframeC").src;
		window.open(URL, "iframeC");
    }
}   
MenuSwitch.prototype.init = function(){     
    var instance = this;
    this.collectElementbyClass();
    if(this._elements.length==0){
        return;
    }
    for(var i=0;i<this._elements.length;i++){
        var h3s = this._elements[i].getElementsByTagName("h3");         
        if(window.addEventListener){
            h3s[0].addEventListener("click",function(){instance.toggledisplay(this);},false);      
        }else{
            h3s[0].onclick = function(){instance.toggledisplay(this);
			}
        }
    }
}
</script>

<script type="text/javascript">
	document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
     WeixinJSBridge.call('hideToolbar');
     WeixinJSBridge.call('hideOptionMenu');
	 });
</script>

</body>
</html>
