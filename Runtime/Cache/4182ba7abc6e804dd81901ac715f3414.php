<?php if (!defined('THINK_PATH')) exit();?>
<link href="/public/images/admin.css" rel="stylesheet" type="text/css" />
<style>
td{font-size: 12px;}
table{border: 0;border-collapse: collapse;} 
tr{height: 25px;}
.ou{background-color: #CCE;} 
.dan{background-color: #EFEFEF;}  
.ed{background-color: #FFFFFF;}    

.help
{
color:red;
}
.overlay
{
position: fixed;
z-index:100;
_margin-top:-500px;
top: 0px;
left: 0px;
height:100%;
width:100%;
color:red;
    background-color:#666666;
    filter:alpha(opacity=75);
-moz-opacity: 0.75;
opacity: 0.75;
text-align:center;

}
.newwindow
{
background-color:#ffffff;
position:fixed;
z-index:102;
border:#d8d8d8 2px solid;
width:800px;

top:300;
left:50%;
margin-left:-400px;
margin-top:-200px;
_margin-top:-350px;
_margin-left:200px;
color:red;
}
.caption{

padding:20px 80px 10px 25px;
float:left;
}
.close{
height:25px;
padding-top:5px;
padding-right:5px;
float:right;
color:block;
cursor:hand;
}
</style>
<script type="text/javascript" src="/public/jquery-1.10.2.js"></script>
<script type="text/javascript">
    
    function todel(){
    if(confirm("确定删除吗?")){
        return true;
        }else return false;
    } 
    
</script>	
<body>
<div>
<b>我的订单管理<b><br>
<!--<div class="result">可以更改配置文件中的<b>URL_MODEL</b>和<b>URL_PATHINFO_DEPR</b>参数查看分页链接的区别。</div>-->
<div><script language="javascript" type="text/javascript" src="__ROOT__/My97DatePicker/WdatePicker.js"></script>
<div id="finder-actionBar-c0b5c6" style="padding-left:0" class="actionBar mainHead"><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td><div style="border:none;" class="actionItems" id="nownode">
<table cellspacing="0" cellpadding="0" border="0">
  <tbody><tr>
    <td>
    <div class="actionItems">
<table>
  <tbody><tr>
    <td class="functop" colspan="1">&nbsp;&nbsp;订单导出
</td>
  </tr>
  <tr>
    <td class="func">
<a target="_blank" class="sysiconBtn" href="__ROOT__/admin.php/Kehu/getorderlistinfocsv">订单导出</span>
	</td>
    <td></td>
  </tr>
</tbody></table>
  </div>
  </td>
</tr>
</tbody></table>
  </div>

</td><td><div class="actionItems" style="border-left: medium none;"><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td id="defaultOption" class="functop"><h3>默认操作区</h3></td></tr><tr><td class="func"><span submit="index.php?ctl=confirm/odconfirm&amp;act=recycle" confirm="确定删除选中项？删除后可进入回收站恢复" target="refresh" class="sysiconBtn delete">删除</span><a href="index.php?ctl=confirm/odconfirm&amp;act=recycleIndex" class="sysiconBtn recyclebin">回收站</a></td></tr></tbody></table></div></td><td><div class="actionItems"><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="functop"><h3>产品导出</h3></td></tr><tr><td class="func"><span dropmenu="finder-export-c0b5c6" style="padding-left:4px" class="sysiconBtn arrow-down"><a href="__ROOT__/admin.php/Kehu/getorderiteminfocsv" target="_blank">导出</a></span>
                        <div style="display:none;" class="dropMenu" id="finder-export-c0b5c6"><span target="download" submit="index.php?ctl=confirm/odconfirm&amp;act=export&amp;p[0]=csv" class="menuitem">csv-逗号分隔的文本文件...</span><span target="download" submit="index.php?ctl=confirm/odconfirm&amp;act=export&amp;p[0]=txt" class="menuitem">txt-制表符分隔的文本文件...</span><span target="download" submit="index.php?ctl=confirm/odconfirm&amp;act=export&amp;p[0]=xls" class="menuitem">xls-Excel文件...</span></div></td></tr></tbody></table></div></td><td><div class="actionItems"><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td class="functop"><h3>标签管理</h3></td></tr><tr><td class="func"><span style="padding-left:4px" class="sysiconBtn arrow-down" id="finder-tagBtn-c0b5c6">设置</span><a href="index.php?ctl=confirm/odconfirm&amp;act=tagmgr" class="sysiconBtn edit">管理</a><div style="display:none;padding:5px;width:200px" class="dropMenu" id="finder-tagEditor-c0b5c6"><img border="none" style="width:16px;height:16px;background-image:url(images/ImageBundle.gif);background-repeat:no-repeat;background-position:0 -58px;float:right" onclick="document.body.fireEvent('click',{type:'click',target:this})" src="images/transparent.gif"><label style="font-weight:bold">输入标签：</label>（空格分隔）<br><textarea style="width:180px; height:60px;" name="_SET_TAGS_"></textarea><br><label style="font-weight:bold">使用已有标签：</label><div class="tagEditor"><span>异常</span><span>缺货打回</span><span>退款打回</span><span>已处理</span><span>手工单处理</span><span>退款不发</span><span>延迟发货</span><span>已填单</span><span>不发货，退款</span><span>不发，已整合</span><span>联系客户，再发</span><span>不发货</span><span>映红拍信用</span><span>要先打回做换货</span><span>已换货重新下单</span><span>24号发货</span><span>24号发货，发44码</span><span>24号发货，发黑色43</span><span>地址错了，先不发</span><span>运费链接</span><span>延迟23发货</span><span>已做手工单发货</span></div><button data="finder-tagEditor-c0b5c6" target="refresh" submit="index.php?ctl=confirm/odconfirm&amp;act=setTag" style="clear:both; height:22px; line-height:20px;">应用标签</button></div></td></tr></tbody></table></div></td><td>
    <!--filter--><div class="actionItems"><table><tbody><tr><td class="functop"><h3 style="*margin:0; *padding:0">搜索<span id="gjss" onclick="gjss()" class=" prepend-1 arrow-down lnk">高级搜索</span></h3></td></tr><tr><td class="func">
<form action="__ROOT__/admin.php/Kehu/orderfind" class="finder-filter finder-filter-pos" id="finder-filter-c0b5c6" view="" method="post" style="position: absolute; top: 45px; left: 400px; z-index: 10;" action="">
<div style="display: none;" class="finder-filter-body" id="finder-filterBody-c0b5c6"><table cellspacing="0" cellpadding="0" border="0">
<tbody>
    
    
    <tr>
  <td><div for="aaa">订单来源</div>
    <select multiple="multiple" size="5" name="terminal_tag" id="status">
      <?php if(is_array($terminal)): $i = 0; $__LIST__ = $terminal;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["tag"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
    </select>
  </td></tr>
 <!-- 
  <td><div for="pay_status">支付状态</div>
    <select multiple="multiple" size="5" name="pay_status[]" id="pay_status">
      <option selected="selected" value="_ANY_" style="font-weight:bold">任意支付状态</option>
      <option value="0">未支付</option>
      <option value="1">已支付</option>
      <option value="2">处理中</option>
      <option value="3">部分付款</option>
      <option value="4">部分退款</option>
      <option value="5">全额退款</option>
    </select>
  </td>
  <td><div for="aaa">发货状态</div>
    <select multiple="multiple" size="5" name="ship_status[]" id="ship_status">
      <option selected="selected" value="_ANY_" style="font-weight:bold">任意状态</option>
      <option value="0">未发货</option>
      <option value="2">部分发货</option>
      <option value="1">已发货</option>
      <option value="3">部分退货</option>
      <option value="4">已退货</option>
    </select>
  </td>

  <td><div for="aaa">配送方式</div>
    <select multiple="multiple" size="5" name="delivery[]" id="delivery">
      <option selected="selected" value="_ANY_" style="font-weight:bold">任意配送方式</option>
      <option value="1" class="row2">EMS-中国邮政（示范）</option><option value="2">快递-申通深圳（示范）</option><option value="3" class="row2">快递-顺丰上海（示范）</option><option value="4">上海同城快递（示范）</option><option value="8" class="row2">平邮（示范）</option><option value="10">上门自取（示范）</option><option value="12" class="row2">E邮宝</option><option value="11">宅急送</option><option value="9" class="row2">货到付款（示范）</option>    </select>
  </td>
  <td><div for="aaa">支付方式</div>
    <select multiple="multiple" size="5" name="payment[]" id="payment">
      <option selected="selected" value="_ANY_" style="font-weight:bold">任意支付方式</option>
      <option value="30" class="row2">支付宝</option><option value="32">快钱</option><option value="33" class="row2">腾讯财付通</option>    </select>
  </td>
</tr>-->
<tr>
<td colspan="1">
<table cellspacing="0" cellpadding="0" border="0">

<tbody><tr>
<td style="width:48%;">
从 <input type="text" onClick="WdatePicker()" id="mce_515840" vtype="date" style="" class="cal _x_ipt" required="true" size="10" name="searchfrom" autocomplete="off">至 <input type="text" id="mce_9c077d" vtype="date" style="" required="true" size="10" name="searchto" class="cal _x_ipt" onClick="WdatePicker()" autocomplete="off">
</td>
<td>&nbsp;&nbsp;</td>
<td style="width:48%;">
<!--订单来源<input type="radio" value="B2C" name="terminal_tag">B2C<input type="radio" value="B2B" name="terminal_tag">B2B<input type="radio" value="TAOBAO" name="terminal_tag">TAOBAO-->
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</div><div id="finder-filterStatus-c0b5c6" class="finder-filter-active"><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td><select onchange="showcompanyname(this.value)"><!--<option value="outer_order_id">平台订单号</option><option value="delivery_id">发货单号</option><option value="bn">条形码</option><option value="goods_name">商品名称</option><option value="logi_no">物流单号</option>--><option value="ship_name">收货人姓名</option><option value="ship_addr">收货人地址</option><option value="ship_tel">收货人电话</option><!--<option value="mark_text">订单备注</option><option value="taobao">淘宝买家名称</option><option value="b2b">B2B会员名称</option><option value="shopex">淘秀会员用户名</option>--></select></td><td><input id="finder-filterInput-c0b5c6" name="ship_name" style="width:60px;"></td><td><span onclick="change()" class="sysiconBtnNoIcon submitFilterMoreBtn" style="_white-space:nowrap;">搜索</span><span class="sysiconBtnNoIcon closeFilterMoreBtn" style="display: none;">关闭</span></td></tr></tbody></table></div></form></td></tr></tbody></table></div></td></tr></tbody></table></div>

<script type="text/javascript">
<!--

function gjss(){
                    var css=$("#finder-filterBody-c0b5c6").css("display");
	            if(css=="block"){
	                $("#finder-filterBody-c0b5c6").hide();
	            }else if(css=="none"){
	                $("#finder-filterBody-c0b5c6").show();
	            }
}
     

       
 function change(){
  $('form').submit();
 }
 function showcompanyname(vv){
     
     $("#finder-filterInput-c0b5c6").attr("name",vv);
 }
 $("#bt").click( function() {
  alert("haha");
 });
 //-->
</script></div>
<table cellpadding="0" cellspacing="0" id="center">
    <tr><th>操作</th><th>平台单号</th><th>发货时间</th><th>姓名</th><th>手机</th><th>邮箱</th><th>地址</th><th>平台来源</th><th>总额</th></tr>    
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
    <td width="40"><a href="__ROOT__/admin.php/kehu/odconfirm?act=showddcp&id=<?php echo ($vo["order_id"]); ?>" class="hello">[查看]</a></td>
<td width="180"><?php echo ($vo["outer_order_id"]); ?></td>
<td width="110"><span style="color:gray"><?php echo (date('y-m-d H:i:s',$vo["last_change_time"])); ?></span></td>
<td width="45"><?php echo ($vo["ship_name"]); ?></td>
<td width="50"><?php echo ($vo["ship_mobile"]); ?></td>
<td width="60"><?php echo ($vo["ship_email"]); ?></td>
<td width="280"><?php echo (mb_substr($vo["ship_addr"],0,25,'utf-8')); ?>..</td>
<td width="100"><?php echo (mb_substr($vo["terminal_name"],0,5,'utf-8')); ?>..</td>
<td width="60"><?php echo (number_format($vo["payed"], 2, '.', '')); ?></td>
</tr><?php endforeach; endif; else: echo "" ;endif; ?>

</table>

<div class="result page"><?php echo ($page); ?></div>
</div> 


   <!-- <hr></hr>
  <div id="world">
  
  </div>-->
 <script type="text/javascript"> 
 $(document).ready(function(){
     $(".hello").click(
        function(){
            
$("body").append("<div id='newlayer' class=\"overlay\"></div>");
$("body").append("<div id='newwindow' class=\"newwindow\"><div id='close' class='close'>close</div><div class='caption' id='hellword'>Hello World!</div></div>")
$("#close").click(function(){
$("#newlayer").remove();
$("#newwindow").remove();
});      
       $("#hellword").load(this.href);
            return false;     
        });

        
         });
//定义表格颜色
$(function(){
    $("#center tr:odd").addClass("ou");
    $("#center tr:even").addClass("dan");
    
    $("#center tr").click(
    function(){
        var hased=$(this).hasClass("ed");
        if(hased){
            $(this).removeClass("ed").find(":input").attr("checked",false);
        }else{
            $(this).addClass("ed").find(":input").attr("checked",true);
        }
    }
    );
        
    
});         
 </script>
</body>