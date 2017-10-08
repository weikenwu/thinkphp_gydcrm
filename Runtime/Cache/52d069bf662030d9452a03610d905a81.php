<?php if (!defined('THINK_PATH')) exit();?>
<link href="/public/images/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/public/jquery-1.10.2.js"></script>
<script type="text/javascript">
    function todel(){
    if(confirm("确定删除吗?")){
        return true;
        }else return false;
    } 
    
</script>
<style>
td{font-size: 12px; }
table{border: 0;border-collapse: collapse;} 
tr{height: 25px;}
.ou{background-color: #CCC;} 
.dan{background-color: #EFEFEF;}  
.ed{background-color: #FFFFFF;}        
</style>
<body>
<div >
<h1>管理员用户管理</h1>
<!--<div class="result">可以更改配置文件中的<b>URL_MODEL</b>和<b>URL_PATHINFO_DEPR</b>参数查看分页链接的区别。</div>-->
<div><a href="?act=add">新增</a></div>
<table>
    <tr><td>操作</td><td>小组</td><td>说明</td><td>小组ID</td></tr>    
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
<td><a href="?act=edit&id=<?php echo ($vo["group_id"]); ?>">[编辑]</a> <a href="?act=del&id=<?php echo ($vo["group_id"]); ?>" onclick="return todel()">[删除]</a></td>
<td><?php echo ($vo["name"]); ?></td>
<td><?php echo ($vo["description"]); ?></td>
<td><span style="color:gray"><?php echo ($vo["group_id"]); ?></span></td>

</tr><?php endforeach; endif; else: echo "" ;endif; ?>

</table>
<div class="result page"><?php echo ($page); ?></div>
</div> 
    <script type="text/javascript">

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