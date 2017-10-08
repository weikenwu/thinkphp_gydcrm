<?php if (!defined('THINK_PATH')) exit();?>


<body>
<div >
<h1>订单详情</h1>
<!--<div class="result">可以更改配置文件中的<b>URL_MODEL</b>和<b>URL_PATHINFO_DEPR</b>参数查看分页链接的区别。</div>-->
<div></div>
<table cellpadding="0" cellspacing="0">
    <tr><th>操作</th><th>条形码</th><th>商品名称</th><th>价格</th><th>购买量</th><th>已发货量</th></tr>    
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
    <td></td>
<td><?php echo ($vo["bn"]); ?>&nbsp;</td>
<td><span style="color:gray"><?php echo ($vo["name"]); ?>&nbsp;</span></td>
<td><?php echo ($vo["price"]); ?>&nbsp;</td>
<td><?php echo ($vo["nums"]); ?>&nbsp;</td>
<td><?php echo ($vo["sendnum"]); ?> </td>


</tr><?php endforeach; endif; else: echo "" ;endif; ?>
<tr>		
</tr>
</table>


</div> 

<script type="text/javascript"> 
 $(document).ready(function(){
     $(".hello").click(
        function(){
            $("#world").load(this.href);
            return false;
        });

        
         });
//定义表格颜色
$(function(){
    $("tbody>tr:odd").addClass("ou");
    $("tbody>tr:even").addClass("dan");
    
    $("tbody>tr").click(
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