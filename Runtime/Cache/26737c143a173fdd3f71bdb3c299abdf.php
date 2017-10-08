<?php if (!defined('THINK_PATH')) exit();?><link href="/public/images/admin.css" rel="stylesheet" type="text/css" />
	
<body>
<div >
<h1>用户编辑修改<h1>
   
<form action="?act=save" method="post" class="tableform" id="x-op-info-form">

   
<input type="hidden" value="<?php echo ($vo["op_id"]); ?>" name="op_id">
  
<div class="division">
	<table width="100%" cellspacing="0" cellpadding="0" border="0">
	  <tbody><tr>
		<th>用户名：</th>
		<td><input type="text" vtype="text" class="_x_ipt text" required="true" style="width:120px" name="username" autocomplete="off" value="<?php echo ($vo["username"]); ?>"></td>
	  </tr>
    </tbody></table>
</div>
    
         <div id="x-div-changepwd" class="division">
<table width="100%" cellspacing="0" cellpadding="0" border="0">
  <tbody><tr>
    <th>密码：</th>
    <td><input type="password" id="x-input-admin-pwd" style="width:120px" name="userpass"></td>
  </tr>
  <tr>
    <th>确认密码：</th>
    <td><input type="password" style="width:120px" name="userpass_comfirm"></td>
  </tr>
    </tbody></table>
 </div>
    
<div class="division">       
<table width="100%" cellspacing="0" cellpadding="0" border="0">
  <tbody><tr>
    <th>管理员类型：</th>
    <td><label><input type="radio" vtype="radio" class="_x_ipt radio" style="" onclick="$('x-opt-roles').setStyle('display',this.value==1?'none':'');$('x-opt-roles2').setStyle('display',this.value==1?'none':'')" value="0" name="super">普通管理员</label> 
<label><input type="radio" vtype="radio" class="_x_ipt radio" style="" onclick="$('x-opt-roles').setStyle('display',this.value==1?'none':'');$('x-opt-roles2').setStyle('display',this.value==1?'none':'')" value="1" name="super">超级管理员</label>  &nbsp; 			<span id="el_1">
		<img border="none" style="width:14px;height:14px;background-image:url(images/ImageBundle.gif);background-repeat:no-repeat;background-position:0 -1577px;" src="images/transparent.gif">		</span>
				
			</td>
  </tr>
 <!--<tr id="x-opt-roles2">
    <th>权限类型：</th>
    <td>
		<label><input type="radio" vtype="radio" class="_x_ipt radio" style="" id="admin_type" onclick="change_roles(this.value);" checked="checked" value="1" name="admin_type">订单确认中心</label> 
<label><input type="radio" vtype="radio" class="_x_ipt radio" style="" id="admin_type" onclick="change_roles(this.value);" value="2" name="admin_type">订单业务中心</label> &nbsp;&nbsp;&nbsp;
		<span style="display:none;" id="opt_depot">请选择所属分公司 
		<select name="branch_id">
		<option value="">请选择分公司</option>
				<option value="2">E仓</option>
				</select>
		</span>
	</td>
  </tr>-->
 <!-- <tr id="x-opt-roles">
    <th>权限角色：</th>
    <td>
      <div style="height:auto !important;">
	  <div style="" id="x-opt-roles_1">
            
        <div>
		<input type="checkbox" id="x-roles-0" value="38" name="roles[]">
        <label for="x-roles-0">淘宝确认人员</label>
				</div>
            
        <div>
		<input type="checkbox" id="x-roles-1" value="39" name="roles[]">
        <label for="x-roles-1">确认中心其他权限</label>
				</div>
            
        <div>
		<input type="checkbox" id="x-roles-2" value="44" name="roles[]">
        <label for="x-roles-2">确认人员&mdash;&mdash;调度</label>
				</div>
            
        <div>
		<input type="checkbox" id="x-roles-3" value="45" name="roles[]">
        <label for="x-roles-3">确认人员&mdash;&mdash;订单导入</label>
				</div>
            
        <div>
		<input type="checkbox" id="x-roles-4" value="46" name="roles[]">
        <label for="x-roles-4">确认人员&mdash;&mdash;财务</label>
				</div>
            
        <div>
		<input type="checkbox" id="x-roles-5" value="47" name="roles[]">
        <label for="x-roles-5">确认人员&mdash;&mdash;确认</label>
				</div>
            
        <div>
		<input type="checkbox" id="x-roles-6" value="48" name="roles[]">
        <label for="x-roles-6">确认人员&mdash;&mdash;发货</label>
				</div>
            
        <div>
		<input type="checkbox" id="x-roles-7" value="49" name="roles[]">
        <label for="x-roles-7">确认中心&mdash;&mdash;库存</label>
				</div>
            
        <div>
		<input type="checkbox" id="x-roles-8" value="50" name="roles[]">
        <label for="x-roles-8">拍拍确认人员</label>
				</div>
            
        <div>
		<input type="checkbox" id="x-roles-9" value="51" name="roles[]">
        <label for="x-roles-9">确认中心订单查看</label>
				</div>
            
        <div>
		<input type="checkbox" id="x-roles-10" value="52" name="roles[]">
        <label for="x-roles-10">导购查看</label>
				</div>
            
        <div>
		<input type="checkbox" id="x-roles-11" value="53" name="roles[]">
        <label for="x-roles-11">匹克官方网店确认</label>
				</div>
            
        <div>
		<input type="checkbox" id="x-roles-12" value="54" name="roles[]">
        <label for="x-roles-12">DLY_MODIFY</label>
				</div>
            
        <div>
		<input type="checkbox" id="x-roles-13" value="55" name="roles[]">
        <label for="x-roles-13">chensy</label>
				</div>
      	  </div>
	  <div style="display:none;" id="x-opt-roles_2">
      	    <div>
        <input type="checkbox" id="x-roles-0" value="37" name="roles[]">
        <label for="x-roles-0">处理人员&mdash;&mdash;打印</label>
		</div>
      	    <div>
        <input type="checkbox" id="x-roles-1" value="40" name="roles[]">
        <label for="x-roles-1">处理人员&mdash;&mdash;校验</label>
		</div>
      	    <div>
        <input type="checkbox" id="x-roles-2" value="41" name="roles[]">
        <label for="x-roles-2">处理人员&mdash;&mdash;出库</label>
		</div>
      	    <div>
        <input type="checkbox" id="x-roles-3" value="42" name="roles[]">
        <label for="x-roles-3">处理人员&mdash;&mdash;收货</label>
		</div>
      	    <div>
        <input type="checkbox" id="x-roles-4" value="43" name="roles[]">
        <label for="x-roles-4">处理人员&mdash;&mdash;质检</label>
		</div>
      	  </div>
      </div>
    </td>
  </tr>-->
</tbody></table>
</div>

<div class="division">
<table width="100%" cellspacing="0" cellpadding="0" border="0">
  <tbody><tr>
    <th>姓名：</th>
    <td><input type="text" maxlength="50" value="<?php echo ($vo["name"]); ?>" name="name"></td>
  </tr>
  <tr>
    <th>编号：</th>
    <td><input type="text" maxlength="50" value="<?php echo ($vo["op_no"]); ?>" name="op_no"></td>
  </tr>
  <tr>
    <th>部门：</th>
    <td><input type="text" maxlength="50" value="<?php echo ($vo["department"]); ?>" name="department"></td>
  </tr>
  <tr>
    <th>职务：</th>
    <td><input type="text" maxlength="50" value="<?php echo ($vo["job"]); ?>" name="job"></td>
  </tr>
  <tr>
    <th>固定电话：</th>
    <td><input type="text" maxlength="50" value="<?php echo ($vo["tel"]); ?>" name="tel"></td>
  </tr>
  <tr>
    <th>移动电话：</th>
    <td><input type="text" maxlength="50" value="<?php echo ($vo["mobile"]); ?>" name="mobile"></td>
  </tr>
  <tr>
    <th>电子邮箱：</th>
    <td><input type="text" maxlength="50" value="<?php echo ($vo["email"]); ?>" name="email"></td>
  </tr>
  <tr>
    <th>QQ：</th>
    <td><input type="text" maxlength="50" value="<?php echo ($vo["qq"]); ?>" name="qq"></td>
  </tr>
  <tr>
    <th>MSN：</th>
    <td><input type="text" maxlength="50" value="<?php echo ($vo["msn"]); ?>" name="msn"></td>
  </tr>
  <tr>
    <th>联系方式：</th>
    <td><input type="text" maxlength="50" value="<?php echo ($vo["contact"]); ?>" name="contact"></td>
  </tr>
  <tr>
    <th>备注：</th>
    <td><textarea style="height:50px;width:360px;" name="memo"><?php echo ($vo["memo"]); ?></textarea></td>
  </tr>    
    </tbody></table></div>    
<table cellspacing="0" cellpadding="0" border="0" align="center" class="tableAction">
    <tbody><tr>
      <td><b class="submitBtn"><input type="submit" id="x-op-info-form-btn" value="保存"></b></td>
    </tr>
  </tbody></table>
<input type="hidden" value="1" name="__">
    
</form>
    </body>