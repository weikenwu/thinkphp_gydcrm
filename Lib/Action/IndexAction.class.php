<?php

// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {

    public function index() {
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>', 'utf-8');
        header("Content-type: text/html; charset=utf-8"); 
        session_start();
        $username=$this->_post('username');
        $password=$this->_post('password');
        $code_num=$this->_post('code_num');
        if($_POST && $code_num!=$_SESSION["helloweba_num"]){
            $this->error("验证码错误", "login");
            exit;
        }
        if($_POST && $username && $password){
             //echo md5($password)."<br>";
             //$this->_get('id');
             $User = D('User');
             $date = $User->getTopUser($username);
             if($date['userpass']==md5($password)){
                 setcookie("think_uname",$username,time()+3600,"/");
                 setcookie("think_name",$date['name'],time()+3600,"/");
                 setcookie("super",$date['super'],time()+3600,"/");
                 
                 //echo $username;
                 //echo $_COOKIE['think_uname'];
                 $ip = get_client_ip();
                 $Operators = M("operators"); // 实例化
                 $data['lastlogin'] = time();
                 $data['lastip']=$ip;
                 $where="username='".$username."'";
                 $result1=$Operators->where($where)->save($data); // 根据条件保存修改的数据
                 
                 $this->success("登录成功,跳转中", "index/#".$username);
             }  else {
                $this->error("用户名或密码错误", "login"); 
                setcookie("think_uname","");
                setcookie("think_name","");
             }
        }
        
        if($_COOKIE['think_uname']){
            $this->display();
        }  else {
            $this->error("请先登录", __ROOT__."/admin.php/index/login");
        }
        
        //echo $_COOKIE['think_name'];
        
    }
    public function login(){
    header("Content-type: text/html; charset=utf-8");     
        
        
        $this->display(); //输出页面模板
    }
    //获取验证码
    public function getnumimg(){
        session_start();
        $this->getCode(4,60,20);
        //$this->display();
    }
    //验证验证码
    public function checkcode() {
        session_start();
        
        $action = $_GET['act'];
        echo $code = trim($_POST['code']);
        if ($action == 'num') { //检验数字验证码
            //echo 'num';
            if ($code == $_SESSION["helloweba_num"]) {
                echo '1';
               $this->ajaxReturn('1','有记录',1);
            } else {
                
            }
            //echo '1';
        }
    }
    public function _empty($name) {
        //把所有城市的操作解析到city方法
        header("Content-type: text/html; charset=utf-8"); 
        $this->city($name);
    }

    protected function city($name) {
        
        //和$name这个城市相关的处理
        echo '方法有误' . $name;
    }

    public function user() {
        echo $u = 'usertest';
        echo U('Blog/read?id=1');
//        if($u){
//            $this->success("成功");
//        }
        $this->_get('id');
        $User = D('User');
        $date = $User->getTopUser();
        print_r($date);
        //实例化User模型
//$User = D('operators'); 
//$User->select();
//echo $User->getLastSql();

        $this->display(); //输出页面模板
        //$this->redirect('New/category', array('cate_id' => 2), 5, '页面跳转中...');
    }
    //验证码
    public function getCode($num,$w,$h) {
	$code = "";
	for ($i = 0; $i < $num; $i++) {
		$code .= rand(0, 9);
	}
	//4位验证码也可以用rand(1000,9999)直接生成
	//将生成的验证码写入session，备验证页面使用
	$_SESSION["helloweba_num"] = $code;
	//创建图片，定义颜色值
	Header("Content-type: image/PNG");
	$im = imagecreate($w, $h);
	$black = imagecolorallocate($im, 0, 0, 0);
	$gray = imagecolorallocate($im, 200, 200, 200);
	$bgcolor = imagecolorallocate($im, 255, 255, 255);

	imagefill($im, 0, 0, $gray);

	//画边框
	imagerectangle($im, 0, 0, $w-1, $h-1, $black);

	//随机绘制两条虚线，起干扰作用
	$style = array (
		$black,
		$black,
		$black,
		$black,
		$black,
		$gray,
		$gray,
		$gray,
		$gray,
		$gray
	);
	imagesetstyle($im, $style);
	$y1 = rand(0, $h);
	$y2 = rand(0, $h);
	$y3 = rand(0, $h);
	$y4 = rand(0, $h);
	imageline($im, 0, $y1, $w, $y3, IMG_COLOR_STYLED);
	imageline($im, 0, $y2, $w, $y4, IMG_COLOR_STYLED);

	//在画布上随机生成大量黑点，起干扰作用;
	for ($i = 0; $i < 80; $i++) {
		imagesetpixel($im, rand(0, $w), rand(0, $h), $black);
	}
	//将数字随机显示在画布上,字符的水平间距和位置都按一定波动范围随机生成
	$strx = rand(3, 8);
	for ($i = 0; $i < $num; $i++) {
		$strpos = rand(1, 6);
		imagestring($im, 5, $strx, $strpos, substr($code, $i, 1), $black);
		$strx += rand(8, 12);
	}
	imagepng($im);
	imagedestroy($im);
}

}