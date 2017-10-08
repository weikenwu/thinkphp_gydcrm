<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>管理登陆</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #1D3647;
}
td{text-align:left;}
-->
</style>
<script language="JavaScript">
function correctPNG()
{
    var arVersion = navigator.appVersion.split("MSIE")
    var version = parseFloat(arVersion[1])
    if ((version >= 5.5) && (document.body.filters)) 
    {
       for(var j=0; j<document.images.length; j++)
       {
          var img = document.images[j]
          var imgName = img.src.toUpperCase()
          if (imgName.substring(imgName.length-3, imgName.length) == "PNG")
          {
             var imgID = (img.id) ? "id='" + img.id + "' " : ""
             var imgClass = (img.className) ? "class='" + img.className + "' " : ""
             var imgTitle = (img.title) ? "title='" + img.title + "' " : "title='" + img.alt + "' "
             var imgStyle = "display:inline-block;" + img.style.cssText 
             if (img.align == "left") imgStyle = "float:left;" + imgStyle
             if (img.align == "right") imgStyle = "float:right;" + imgStyle
             if (img.parentElement.href) imgStyle = "cursor:hand;" + imgStyle
             var strNewHTML = "<span " + imgID + imgClass + imgTitle
             + " style=\"" + "width:" + img.width + "px; height:" + img.height + "px;" + imgStyle + ";"
             + "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader"
             + "(src=\'" + img.src + "\', sizingMethod='scale');\"></span>" 
             img.outerHTML = strNewHTML
             j = j-1
          }
       }
    }    
}
window.attachEvent("onload", correctPNG);
</script>

<script type="text/javascript" src="__PUBLIC__/js/jquery-1.10.2.js"></script>
<script type="text/javascript">
$(function(){
	//数字验证
	$("#getcode_num").click(function(){
		$(this).attr("src",'getnumimg?' + Math.random());
	});
	$("#chk_num").click(function(){
		var code_num = $("#code_num").val();
		$.post("checkcode?act=num",{code:code_num},function(msg){
			//alert(code_num);
			if(msg==1){
				alert("验证码正确！");
			}else{
				alert("验证码错误！");
			}
		});
	});
	//数字+字母验证
	$("#getcode_char").click(function(){
		$(this).attr("src",'code_char.php?' + Math.random());
	});
	$("#chk_char").click(function(){
		var code_char = $("#code_char").val();
		$.post("chk_code.php?act=char",{code:code_char},function(msg){
			if(msg==1){
				alert("验证码正确！");
			}else{
				alert("验证码错误！");
			}
		});
	});
	//中文验证码
	$("#getcode_zh").click(function(){
		$(this).attr("src",'code_zh.php?' + Math.random());
	});
	$("#chk_zh").click(function(){
		var code_zh = escape($("#code_zh").val());
		$.post("chk_code.php?act=zh",{code:code_zh},function(msg){
			if(msg==1){
				alert("验证码正确！");
			}else{
				alert("验证码错误！");
			}
		});
	});
	//google验证
	$("#getcode_gg").click(function(){
		$(this).attr("src",'code_gg.php?' + Math.random());
	});
	$("#chk_gg").click(function(){
		var code_gg = $("#code_gg").val();
		$.post("chk_code.php?act=gg",{code:code_gg},function(msg){
			if(msg==1){
				alert("验证码正确！");
			}else{
				alert("验证码错误！");
			}
		});
	});
	//算术验证
	$("#getcode_math").click(function(){
		$(this).attr("src",'code_math.php?' + Math.random());
	});
	$("#chk_math").click(function(){
		var code_math = $("#code_math").val();
		$.post("chk_code.php?act=math",{code:code_math},function(msg){
			if(msg==1){
				alert("验证码正确！");
			}else{
				alert("验证码错误！");
			}
		});
	});
});
</script>
<link href="__PUBLIC__/images/skin.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<table width="100%" height="166" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="42" valign="top"><table width="100%" height="42" border="0" cellpadding="0" cellspacing="0" class="login_top_bg">
      <tr>
        <td width="1%" height="21">&nbsp;</td>
        <td height="42">&nbsp;</td>
        <td width="17%">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" height="532" border="0" cellpadding="0" cellspacing="0" class="login_bg">
      <tr>
        <td width="300" align="right">
        <table width="93%" height="532" border="0" cellpadding="0" cellspacing="0" class="login_bg2">
            <tr>
              <td height="138" valign="top"><table width="96%" height="427" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="149">&nbsp;</td>
                </tr>
                <tr>
                  <td height="80" align="right" valign="top"><div style="text-align:right; width:400px;"><img src="__PUBLIC__/images/logo.png" width="279" height="68"></div></td>
                </tr>
                <tr>
                  <td height="198" align="right" valign="top"><table width="500" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="25%">&nbsp;</td>
                      <td height="25" colspan="2" class="left_txt"><p>1- 各平台客户管理...</p></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td height="25" colspan="2" class="left_txt"><p>2- 整合方便分配使用...</p></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td height="25" colspan="2" class="left_txt"><p>3- 后台统一管理...</p></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td width="40%" height="95"><img src="__PUBLIC__/images/icon-demo.gif" width="16" height="16"> 使用说明 </td>
                      <td width="35%"><img src="__PUBLIC__/images/icon-login-seaver.gif" width="16" height="16"> 在线客服</td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
            </tr>
            
        </table></td>
        <td width="1%" >&nbsp;</td>
        <td width="50%" valign="bottom"><table width="550" height="59" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="4%">&nbsp;</td>
              <td width="96%" height="38"><span class="login_txt_bt">登陆信息网后台管理</span></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td height="21"><table cellSpacing="0" cellPadding="0" width="100%" border="0" id="table211" height="328">
                  <tr>
                    <td height="164" colspan="2" align="middle"><form name="myform" action="index" method="post">
                        <table cellSpacing="0" cellPadding="0" width="100%" border="0" height="143" id="table212">
                          <tr>
                            <td width="100" height="38" class="top_hui_text"><span class="login_txt">管理员：&nbsp;&nbsp; </span></td>
                            <td height="38" colspan="2" class="top_hui_text"><input name="username" class="editbox4" value="" size="20">                            </td>
                          </tr>
                          <tr>
                            <td width="100" height="35" class="top_hui_text"><span class="login_txt"> 密 码： &nbsp;&nbsp; </span></td>
                            <td height="35" colspan="2" class="top_hui_text"><input class="editbox4" type="password" size="20" name="password">
                              <img src="__PUBLIC__/images/luck.gif" width="19" height="18"> </td>
                          </tr>
                          <tr>
                            <td width="100" height="35" ><span class="login_txt">验证码：</span></td>
                            <td height="35" colspan="2" class="top_hui_text"><input class=wenbenkuang id="code_num" name="code_num" maxlength="4" size="8"><img src="getnumimg" id="getcode_num" title="看不清，点击换一张" />
                              </td>
                          </tr>
                          <tr>
                            <td height="35" >&nbsp;</td>
                            <td width="100" height="35" ><input type="submit" class="button"  value="登 陆"> </td>
                            <td width="450" class="top_hui_text"><!--<input name="cs" type="button" class="button" id="cs" value="取 消" onClick="showConfirmMsg1()">--></td>
                          </tr>
                        </table>
                        <br>
                    </form></td>
                  </tr>
                  <tr>
                    <td width="433" height="164" align="right" valign="bottom"><img src="__PUBLIC__/images/login-wel.gif" width="242" height="138"></td>
                    <td width="57" align="right" valign="bottom">&nbsp;</td>
                  </tr>
              </table></td>
            </tr>
          </table>
          </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="20"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="login-buttom-bg">
      <tr>
        <td align="center"><span class="login-buttom-txt">Copyright &copy; 2013 Gouyundong.com</span></td>
      </tr>
    </table></td>
  </tr>
</table>
</body></html>