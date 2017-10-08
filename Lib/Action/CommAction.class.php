<?php

class CommAction extends Action {

    public function __construct() {
        parent::__construct();
        $this->checkAdminSession();
    }

    public function checkAdminSession() {
////设置超时为10分
//        $nowtime = time();
//        $s_time = $_SESSION['logintime'];
//        if (($nowtime - $s_time) > 600) {
//            unset($_SESSION['logintime']);
//            $this->error('当前用户未登录或登录超时，请重新登录', U('login/loginpage'));
//        } else {
//            $_SESSION['logintime'] = $nowtime;
//        }
        if($_COOKIE['think_uname']){
            //echo $_COOKIE['think_uname'];
        
        //print_r($date['super']);
        $this->assign('super',$_COOKIE['super']);
        
        }  else {
            //$this->error("请先登录", __ROOT__."/admin.php/index/login");
            echo "<script>window.top.location.href='/admin.php/Index/';</script>";
        }        
    }

}

?>
