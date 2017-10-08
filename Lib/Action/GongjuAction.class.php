<?php

class GongjuAction extends Action {
    
    public function index() {
        
        //echo $_COOKIE['think_name'];
        $this->assign('name',$_COOKIE['think_name']); 
        $this->assign('super',$_COOKIE['super']); 
        
        $this->display('Index:admin_top');
        
    }
    public function left() {
        
        //echo $_COOKIE['think_name'];
        $User = D('User');
        $date = $User->getTopUser($_COOKIE['think_uname']);
        //print_r($date['super']);
        $this->assign('super',$date['super']); 
        
        $this->display();
        
    }    
    public function out() {
        
        cookie('think_name',null);
        cookie('think_uname',null);
        cookie('super',null);
        $this->success("退出成功", "../Index/login");
        
    }
    
}

?>
