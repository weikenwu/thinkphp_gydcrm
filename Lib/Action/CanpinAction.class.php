<?php

class CanpinAction extends CommAction{
    public function inventory(){
        import("@.ORG.Page");       //导入分页类
        $Form = M('branch_store');
        
         $where = "1=1";
       
        //print_r($this->_get());
        if ($this->_get("ship_tel")) {//电话搜索
            $where.=" and ship_mobile='" . $this->_get("ship_tel") . "'";
            //$search.="ship_tel=".$this->_get("ship_tel")."&";
        }
        if ($this->_get("ship_name")) {//姓名搜索
            $where.=" and ship_name='" . $this->_get("ship_name") . "'";
            //$search.="ship_name=".$this->_get("ship_name")."&";
        }
        if ($this->_get("searchfrom") && $this->_get("searchto")) {//时间搜索 searchfrom/2011-09-21/searchto/2013-09-21
            $where.=" and first_time>=UNIX_TIMESTAMP('" . $this->_get("searchfrom") . "') and first_time<=UNIX_TIMESTAMP('" . $this->_get("searchto") . "')";
            $search.="searchfrom=".$this->_get("searchfrom")."&searchto=".$this->_get("searchto")."&";
            }
        if ($this->_get("terminal_tag")) {//平台搜索
            $where.=" and terminal_tag='" . $this->_get("terminal_tag") . "'";
            //$search.="ship_name=".$this->_get("ship_name")."&";
        }    
        
        $Form->where($where);
        $count = $Form->count();    //计算总数
        $Page = new Page($count, 16);
        $list = $Form->where($where)->limit($Page->firstRow . ',' . $Page->listRows)->order('bnno desc')->select();
        //echo $Form->getLastSql();
        // 模拟设置分页额外传入的参数
        $Page->parameter = $search.'search=key&name=thinkphp';
        // 设置分页显示
        $Page->setConfig('header', '条数据');
        $Page->setConfig('first', '<<');
        $Page->setConfig('last', '>>');
        $page = $Page->show();
        
        $this->assign("page", $page);
        $this->assign("list", $list);
        $this->display();
    }
    public function find(){
        //print_r($this->_post());
        if($this->_post('bnno')){//按货号搜索
            $this->redirect("/Canpin/inventory/bnno/" . $this->_post("bnno"));
        }
    }
}

?>
