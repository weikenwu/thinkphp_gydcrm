<?php if (!defined('THINK_PATH')) exit();?><link href="/public/images/admin.css" rel="stylesheet" type="text/css" />
	
<body>
<div >
<h1>小组编辑修改<h1>
   
<form class="tableform" action="__ROOT__/admin.php/User/groupsave" method="post">
<input type="hidden" value="5" name="group_id">
        
    <div class="division">
<table width="100%" cellspacing="0" cellpadding="0" border="0">
  <tbody><tr>
    <th>订单确认组名称:</th>
     
    <td><input type="text" value="<?php echo ($list1["name"]); ?>" id="name" name="name" class="_x_ipt text" vtype="text"></td>
     
  </tr>
    </tbody></table>        
    </div>
    
    <div class="division">
<table width="100%" cellspacing="0" cellpadding="0" border="0">
  <tbody><tr>
    <th>订单确认组描述:</th>
    <td><textarea style="width: 360px; height: 40px;" id="description" name="description" class="_x_ipt textarea"><?php echo ($list1["description"]); ?></textarea></td>
  </tr>
    </tbody></table>        
    </div>
    
    
<div class="division">
<table width="100%" cellspacing="0" cellpadding="0" border="0">
  <tbody><tr>
    <th>订单确认组成员:</th>
    <td>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div>
	<input type="checkbox" checked="checked" id="x-roles-0" value="<?php echo ($vo["op_id"]); ?>" name="op_ids[]">
	<label style="margin-right: 50px;" for="p-1-all"><?php echo ($vo["username"]); ?></label>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>   
	<!--<div>
	<input type="checkbox" checked="checked" id="x-roles-1" value="116" name="op_ids[]">
	<label style="margin-right: 50px;" for="p-1-all">hongxy</label>
	</div>-->
	
		</td>
  </tr>
</tbody></table>        
</div>


<div class="division">
<table width="100%" cellspacing="0" cellpadding="0" border="0">
  <tbody><tr>
    <th>订单来源:</th>
    <td>
		<div>
	<input type="checkbox" checked="checked" id="tags-1" value="<?php echo ($list2["terminal_id"]); ?>" name="terminal_ids[]">
	<label style="margin-right: 50px;" for="p-1-all"><?php echo ($list2["name"]); ?></label>
	</div>
		</td>
  </tr>
</tbody></table>        
</div>
	
<table cellspacing="0" cellpadding="0" border="0" align="center" class="tableAction">
  <tbody><tr>
    <td><b class="submitBtn"><input type="submit" value="提交"></b></td>

  </tr>
</tbody></table>
<input type="hidden" value="1" name="__"></form>
    </body>