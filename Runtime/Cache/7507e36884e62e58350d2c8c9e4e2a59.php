<?php if (!defined('THINK_PATH')) exit();?><link href="/public/images/admin.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="__ROOT__/My97DatePicker/WdatePicker.js"></script>

<body>
<div class="tableform">
    <form action="__ROOT__/admin.php/User/tokehu" target="_balnk" method="post">
    <h4>批量分配客户</h4>
    <div class="division">

    <table cellspacing="0" cellpadding="0" border="0">
        <tbody><tr>
            <th>分配方式：</th>
            <td>
                <select name="type" vtype="required" class="_x_ipt">
                    <option value="1">按照ID</option>
                    <option selected="" value="2">按照时间先后</option>
                </select>
            </td>

        </tr>
        <!--<tr>
            <th>多单不审：</th>
            <td>
                <select name="duodan" vtype="required" class="_x_ipt">
                    <option selected="" value="1">遇到多单不审单</option>
                    <option value="0">遇到多单自动审单</option>
                </select>
            </td>

        </tr>-->

        <tr>
            <th>时间区间：</th>
            <td>从 <input class="Wdate" name="searchfrom" type="text" onClick="WdatePicker()">  至 <input class="Wdate" name="searchto" type="text" onClick="WdatePicker()">
</td>
        </tr>
            
       <!-- <tr>
            <th>备注的处理：</th>
            <td>
                <select name="mark" vtype="required" class="_x_ipt">
                    <option selected="" value="0">跳过备注，不审单</option>
                    <option value="1">忽略备注，直接审单</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>货号：</th>
            <td>
                <input type="input" class="_x_ipt" size="50" name="goodsno">&nbsp;&nbsp;*按更新方式为货号时才有效
            </td>
        </tr>
        <tr>
            <th>省/市：</th>
            <td>
                <input type="input" class="_x_ipt" size="20" name="city">&nbsp;&nbsp;*如果没有要求可以放空
            </td>
        </tr>
        <tr>
            <th>仓库：</th>
            <td>

                <select class="_x_ipt" name="stock">
        <option value="2">E仓</option>
                    </select>
               
            </td>
        </tr>-->
        <tr>
            <th>店铺：</th>
            <td><select class="_x_ipt" name="tag">
    <option value="__ALL__">请选择店铺：</option>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["tag"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>    
                    </select> &nbsp;&nbsp;*如果不写将默认所有的店铺</td>
        </tr>
        <tr>
            <th>员工：</th>
            <td><select class="_x_ipt" name="worker">
    <option value="">请选择员工：</option>
    <?php if(is_array($list2)): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo2["op_no"]); ?>"><?php echo ($vo2["op_no"]); ?>-<?php echo ($vo2["username"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>    
                    </select> &nbsp;&nbsp;*必选的,一次分配1000个客户</td>
        </tr>           
        <tr>
    <th>&nbsp;</th>
    <td><b class="submitBtn">
      <input type="submit" value="提交">
      </b></td>
  </tr>

    </tbody></table>
    </div>
    <input type="hidden" value="1" name="__"></form>
</div>

    </body>