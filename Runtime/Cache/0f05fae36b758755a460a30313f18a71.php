<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<title>管理中心</title>
<meta http-equiv=Content-Type content=text/html;charset=utf-8>
</head>
<frameset rows="64,*"  frameborder="NO" border="0" framespacing="0">
	<frame src="/admin.php/Gongju/index" noresize="noresize" frameborder="NO" name="topFrame" scrolling="no" marginwidth="0" marginheight="0" target="main" />
  <frameset cols="200,*"  rows="560,*" id="frame">
	<frame src="/admin.php/Gongju/left" name="leftFrame" noresize="noresize" marginwidth="0" marginheight="0" frameborder="0" scrolling="no" target="main" />
	<frame src="/tpl/index/right.html" name="main" marginwidth="0" marginheight="0" frameborder="0" scrolling="auto" target="_self" />
  <!--<frame src="UntitledFrame-1"><frame src="UntitledFrame-2"></frameset>-->
<noframes>
  <body></body>
    </noframes>
</html>