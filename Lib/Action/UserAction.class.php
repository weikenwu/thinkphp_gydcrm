<?php

class UserAction extends CommAction {

    public function index() {
        
    }

    public function settingoperator() {
        if ($this->_get('act') == 'add') {
            $this->useradd();
            return;
        }
        if ($this->_get('act') == 'save') {
            $this->usersave();
            return;
        }
        if ($this->_get('act') == 'edit') {
            $this->useredit();
            return;
        }
        if ($this->_get('act') == 'del') {
            $this->userdel();
            return;
        }        
        //$User = D('User');
        //$date = $User->getUser();
        //echo '<pre>';
        //a:14:
        //$date[0]['config']=str_replace("a:14:", "", $date[0]['config']);
        //print_r($date);
        $res=$this->getuser($_COOKIE['think_uname']);//拿权限信息
//        print_r($res['super']);
//        exit;
        import("@.ORG.Page");       //导入分页类
        $Form = M('operators');
        if($res['super']<1){
        $where="op_id='".$res['op_id']."'";
        }  else {
        $where="1=1";    
        }
        $Form->where($where);
        $count = $Form->count();    //计算总数
        $Page = new Page($count, 15);
        $list = $Form->where($where)->limit($Page->firstRow . ',' . $Page->listRows)->order('lastlogin desc')->select();
        // 模拟设置分页额外传入的参数
        $Page->parameter = 'search=key&name=thinkphp';
        // 设置分页显示
        $Page->setConfig('header', '条数据');
        $Page->setConfig('first', '<<');
        $Page->setConfig('last', '>>');
        $page = $Page->show();
        $this->assign("page", $page);
        $this->assign("list", $list);
        $this->display();
    }
    public function confirmgrp(){
        if ($this->_get('act') == 'edit') {
            $this->groupedit();
            return;
        }
        $res=$this->getuser($_COOKIE['think_uname']);//拿权限信息
//        print_r($res['super']);
//        exit;
        import("@.ORG.Page");       //导入分页类
        $Form = M('order_confirm_group');
        if($res['super']<1){
        //$where="op_id='".$res['op_id']."'";
        $where="1=1"; 
        $this->error("不是超级管理员,不能访问该页", "settingoperator");
        return ;
        }  else {
        $where="1=1";    
        }
        $Form->where($where);
        $count = $Form->count();    //计算总数
        $Page = new Page($count, 15);
        $list = $Form->where($where)->limit($Page->firstRow . ',' . $Page->listRows)->order('group_id asc')->select();
        // 模拟设置分页额外传入的参数
        $Page->parameter = 'search=key&name=thinkphp';
        // 设置分页显示
        $Page->setConfig('header', '条数据');
        $Page->setConfig('first', '<<');
        $Page->setConfig('last', '>>');
        $page = $Page->show();
        $this->assign("page", $page);
        $this->assign("list", $list);
        $this->display();
    }
    
    public function groupedit() {
        
        if($this->_get('id')){
        $form=m("order_confirm_group");
        $list1=$form->where("group_id='".$this->_get('id')."'")->find();
        $Model2 = D("TerminalView");
        $list2=$Model2->field('terminal_id,name,tag,group_id')->where('terminal_confirm.group_id='.$this->_get("id"))->find();
        
        //print_r($list1);
        $Model = D("BlogView");
        $list=$Model->field('group_id,name,op_id,username')->where('order_confirm_group.group_id='.$this->_get("id"))->order('op_id asc')->select();
        //echo $Model->getLastSql();
        //echo '<pre>';
        //print_r($result);
        $this->assign("list1", $list1);
        $this->assign("list2", $list2);
        $this->assign("list", $list);
        $this->display(groupedit);
        }
        
    }
    public function groupsave() {
        print_r($this->_post());
    }
    

    public function getuser($username){
        $u=M('operators');
        $result=$u->where("username='".$username."'")->limit(1)->find();
        //echo $u->getLastSql();
        return $result;
        
    }
    public function useradd() {
        $res=$this->getuser($_COOKIE['think_uname']);//拿权限信息
        if($res['super']<1){
        $this->error("不是超级管理员,不能访问该页", "");
        return ;
        }
        $this->display(useradd);
    }
    public function userdel() {//删除记录
        $User = M("operators"); // 实例化User对象
        //echo $this->_get('id');
        $result = $User->where("op_id='" . $this->_get('id') . "'")->delete();
        if ($result) {
           $this->success("删除成功", "");
          }
    }
    public function useredit() {
        $User = M("operators"); // 实例化User对象
        //echo $this->_get('id');
        $list = $User->where("op_id='" . $this->_get('id') . "'")->select();
//        print_r($list);
//        echo 'test';
//        exit;
        $this->assign("list", $list);
        $this->display(useredit);
    }

    public function usersave() {//保存用户
        $User = M("operators"); // 实例化User对象
        //print_r($this->_post());
        if ($this->_post('op_id')) {//修改
            if ($this->_post('username')) {
                $data['username'] = $this->_post('username');
                if($this->_post('userpass')){//修改密码
                $data['userpass'] = md5($this->_post('userpass'));
                
                }
                $data['name'] = $this->_post('name');
                $data['op_no'] = $this->_post('op_no');
                $data['department'] = $this->_post('department');
                $data['job'] = $this->_post('job');
                $data['tel'] = $this->_post('tel');
                $data['mobile'] = $this->_post('mobile');
                $data['email'] = $this->_post('email');
                $data['qq'] = $this->_post('qq');
                $data['msn'] = $this->_post('msn');
                $data['contact'] = $this->_post('contact');
                $data['memo'] = $this->_post('memo');
                $result = $User->where("op_id='".$this->_post('op_id')."'")->save($data);
                if ($result) {
                    $this->success("修改成功", "");
                }
            }
        }
        if (!$this->_post('op_id')) {//新增
            //echo 'test';
            $op_id = $User->where("username='" . $this->_post('username') . "'")->select();
            //echo $User->getLastSql();
            //print_r($op_id);
            if ($op_id) {
                $this->error("用户已存在", "");
            }
            $data['username'] = $this->_post('username');
            $data['userpass'] = md5($this->_post('userpass'));
            $data['name'] = $this->_post('name');
            $data['op_no'] = $this->_post('op_no');
            $data['department'] = $this->_post('department');
            $data['job'] = $this->_post('job');
            $data['tel'] = $this->_post('tel');
            $data['mobile'] = $this->_post('mobile');
            $data['email'] = $this->_post('email');
            $data['qq'] = $this->_post('qq');
            $data['msn'] = $this->_post('msn');
            $data['contact'] = $this->_post('contact');
            $data['memo'] = $this->_post('memo');
            $result = $User->add($data);
            if ($result) {
                $this->success("添加成功", "");
            }
        }
    }
    public function orderauto(){//客户批量分配
        $res=$this->getuser($_COOKIE['think_uname']);//拿权限信息
        if($res['super']<1){
        $this->error("不是超级管理员,不能访问该页", "settingoperator");
        return ;
        }  else {
        }
        $Form=M('terminal');
        $where="disabled='false'";
        $list = $Form->where($where)->order('terminal_id asc')->select();
        $Form=M('operators');
        $where="super='0'";
        $list2 = $Form->where($where)->order('op_id asc')->select();
        
        $this->assign("list", $list);
        $this->assign("list2", $list2);
        $this->display();
    }
    public function tokehu(){//客户批量分配
        $res=$this->getuser($_COOKIE['think_uname']);//拿权限信息
        if($res['super']<1){
        $this->error("不是超级管理员,不能访问该页", "settingoperator");
        return ;
        }  else {
        }
        
        
        $date=array(
            'searchfrom'=>  $this->_post("searchfrom"),
            'searchto'=>  $this->_post("searchto"),
            'tag'=>  $this->_post("tag"),
            'worker'=>  $this->_post("worker"),
        );
        //print_r($date);
        $Form=M('member');
        
        $where="op_no<='0' and terminal_tag='".$date['tag']."' and first_time>=UNIX_TIMESTAMP('".$date['searchfrom']."') and first_time<=UNIX_TIMESTAMP('".$date['searchto']."')";
        
        $list=$Form->where($where)->limit("700")->order("first_time desc")->select();
        
        $lists='';
        foreach($list as $k=>$v){
            $lists.="'".$v['id']."',";
        }
//        echo $lists;
//        echo '<br><pre>';
//        print_r($list[0]);
//        print_r($list[498]);
        $where="id in(".$lists."'0')";
        
        if($lists){
            $data['op_no'] =$date['worker'];
            $Form->where($where)->data($data)->save();
            echo $Form->getLastSql();
        }
       
    }
    public function change(){//切换用户登录
//        print_r($this->_get());
//        exit;
        $res=$this->getuser($_COOKIE['think_uname']);//拿权限信息
        if($res['super']<1){
        $this->error("不是超级管理员,不能访问该页", "");
        return ;
        }  else {
            cookie('think_uname',null);
            cookie('think_name',null);
            setcookie("think_uname",$this->_get("user"),time()+3600,"/");
            setcookie("think_name",$this->_get("user"),time()+3600,"/");
            echo "<script>window.top.location.href='/admin.php/Index/';</script>";
        }
        
    }
}

?>
