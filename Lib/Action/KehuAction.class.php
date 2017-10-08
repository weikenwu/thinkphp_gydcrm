<?php

//客户类
class KehuAction extends CommAction {

    public function index() {
        
    }

    public function odconfirm() {
        if ($this->_get("act") == 'view') {
            $this->odconfirmview();
            return;
        }
        if ($this->_get("act") == 'showddcp') {
            $this->odconfirmshowddcp();
            return;
        }


        $user = D(User);
        $res = $user->getuserid($_COOKIE['think_uname']); //拿权限信息
        import("@.ORG.Page");       //导入分页类
        $Form = M('member');
        if ($res['super'] > 0) {
            $where = "1=1";
        } else {
            $where = "op_no='" . $res['op_no'] . "'";
        }
        //print_r($this->_get());
        if ($this->_get("ship_tel")) {//电话搜索
            $where.=" and ship_mobile='" . trim($this->_get("ship_tel")) . "'";
            //$search.="ship_tel=".$this->_get("ship_tel")."&";
        }
        if ($this->_get("ship_name")) {//姓名搜索
            $where.=" and ship_name='" . trim($this->_get("ship_name")) . "'";
            //$search.="ship_name=".$this->_get("ship_name")."&";
        }
        if ($this->_get("searchfrom") && $this->_get("searchto")) {//时间搜索 searchfrom/2011-09-21/searchto/2013-09-21
            $where.=" and first_time>=UNIX_TIMESTAMP('" . $this->_get("searchfrom") . "') and first_time<=UNIX_TIMESTAMP('" . $this->_get("searchto") . "')";
            $search.="searchfrom=".$this->_get("searchfrom")."&searchto=".$this->_get("searchto")."&";
            }
        if ($this->_get("terminal_tag")) {//平台搜索
            $where.=" and terminal_tag='" . $this->_get("terminal_tag") . "'";
            $search.="terminal_tag=".$this->_get("terminal_tag")."&";
        }    
        
        $Form->where($where);
        $count = $Form->count();    //计算总数
        $Page = new Page($count, 15);
        $list = $Form->where($where)->limit($Page->firstRow . ',' . $Page->listRows)->order('first_time desc')->select();
        //导出excel 搜索语句用
        $lastsql = $Form->getLastSql();
        $lastsql=str_replace("LIMIT ".$Page->firstRow . ',' . $Page->listRows, "", $lastsql);
        $_SESSION['think_lastsql']=$lastsql;
        
        // 模拟设置分页额外传入的参数
        $Page->parameter = $search.'search=key&name=thinkphp';
        // 设置分页显示
        $Page->setConfig('header', '条数据');
        $Page->setConfig('first', '<<');
        $Page->setConfig('last', '>>');
        $page = $Page->show();
        //平台列表
        $Form = M('terminal');
        $where="disabled='false'";
        $terminal=$Form->where($where)->order("terminal_id asc")->select();

        $this->assign("page", $page);
        $this->assign("list", $list);
        $this->assign("terminal", $terminal);
        $this->display();
    }
    public function nofpKehu(){//未分配客户数量
        $user = D(User);
        $res = $user->getuserid($_COOKIE['think_uname']); //拿权限信息
        import("@.ORG.Page");       //导入分页类
        $Form = M('member');
        if ($res['super'] > 0) {
            $where = "op_no<='0'";
        } else {
            $where = "op_no='" . $res['op_no'] . "'";
        }
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
            $search.="terminal_tag=".$this->_get("terminal_tag")."&";
        }    
        
        $Form->where($where);
        $count = $Form->count();    //计算总数
        $Page = new Page($count, 15);
        $list = $Form->where($where)->limit($Page->firstRow . ',' . $Page->listRows)->order('first_time desc')->select();
        //导出excel 搜索语句用
        $lastsql = $Form->getLastSql();
        $lastsql=str_replace("LIMIT ".$Page->firstRow . ',' . $Page->listRows, "", $lastsql);
        $_SESSION['think_lastsql']=$lastsql;
        
        // 模拟设置分页额外传入的参数
        $Page->parameter = $search.'search=key&name=thinkphp';
        // 设置分页显示
        $Page->setConfig('header', '条数据');
        $Page->setConfig('first', '<<');
        $Page->setConfig('last', '>>');
        $page = $Page->show();
        //平台列表
        $Form = M('terminal');
        $where="disabled='false'";
        $terminal=$Form->where($where)->order("terminal_id asc")->select();

        $this->assign("page", $page);
        $this->assign("list", $list);
        $this->assign("terminal", $terminal);
        $this->display();
    }
    public function odconfirmview() {//我的订单
        $user = D(User);
        $res = $user->getuserid($_COOKIE['think_uname']); //拿权限信息
        import("@.ORG.Page");       //导入分页类
        $Form = M('orders');
        if ($res['super'] > 0) {
            $where = "1=1";
        } else {
            $where = "op_no='" . $res['op_no'] . "'";
        }
        
        if ($this->_get("ship_tel")) {//电话搜索
            $where.=" and ship_mobile='" . $this->_get("ship_tel") . "'";
            //$search.="ship_tel=".$this->_get("ship_tel")."&";
        }
        if ($this->_get("ship_name")) {//姓名搜索
            $where.=" and ship_name='" . $this->_get("ship_name") . "'";
            //$search.="ship_name=".$this->_get("ship_name")."&";
        }
        if ($this->_get("searchfrom") && $this->_get("searchto")) {//时间搜索 searchfrom/2011-09-21/searchto/2013-09-21
            $where.=" and last_change_time>=UNIX_TIMESTAMP('" . $this->_get("searchfrom") . " 00:00:01') and last_change_time<=UNIX_TIMESTAMP('" . $this->_get("searchto") . " 23:59:59')";
            $search.="searchfrom=".$this->_get("searchfrom")."&searchto=".$this->_get("searchto")."&";
            }
        if ($this->_get("terminal_tag")) {//平台搜索
            $where.=" and terminal_tag='" . $this->_get("terminal_tag") . "'";
            $search.="terminal_tag=".$this->_get("terminal_tag")."&";
            //echo 'ttt';
        }
        //echo $where;
        $Form->where($where);
        $count = $Form->count();    //计算总数
        $Page = new Page($count, 15);
        $list = $Form->where($where)->limit($Page->firstRow . ',' . $Page->listRows)->order('last_change_time desc')->select();
        //导出excel 搜索语句用
        $lastsql = $Form->getLastSql();
        $lastsql=str_replace("LIMIT ".$Page->firstRow . ',' . $Page->listRows, "", $lastsql);
        $_SESSION['think_lastsql']=$lastsql;
        //过滤出导出订单产品语句
        //$lastsql=str_replace("ORDER BY last_change_time desc", "", $lastsql);
        $lastsql=str_replace("*", "outer_order_id", $lastsql);
        $lastsql="SELECT * FROM sdb_order_items WHERE outer_order_id in(".$lastsql.")";
        $_SESSION['think_lastsql2']=$lastsql;
        // 模拟设置分页额外传入的参数
        $Page->parameter = $search.'act=view&search=key&name=thinkphp';
        // 设置分页显示
        $Page->setConfig('header', '条数据');
        $Page->setConfig('first', '<<');
        $Page->setConfig('last', '>>');
        $page = $Page->show();
        $this->assign("page", $page);
        $this->assign("list", $list);
        $this->display(odconfirmview);
    }

    public function odconfirmshowddcp() {//显示订单产品
        if ($this->_get("id")) {
            $Form = M('order_items');
            $where = "order_id='" . $this->_get("id") . "'";
            $list = $Form->where($where)->order('item_id asc')->select();
            $this->assign("list", $list);
            $this->display(odconfirmshowddcp);
        } else {
            echo '非法sid';
        }
    }

    public function find() {
        print_r($this->_post());
        if ($this->_post("ship_tel")) {//搜索电话订单
            $this->redirect("/kehu/odconfirm/act/index/ship_tel/" . $this->_post("ship_tel"));
        }
        if ($this->_post("ship_name")) {
            $this->redirect("/kehu/odconfirm/act/index/ship_name/" . $this->_post("ship_name"));
        }
        if ($this->_post("searchfrom") && $this->_post("searchto") || $this->_post("terminal_tag")) {
            $this->redirect("/kehu/odconfirm/act/index/searchfrom/" . $this->_post("searchfrom") . "/searchto/" . $this->_post("searchto"). "/terminal_tag/" . $this->_post("terminal_tag"));
        }
    }
    public function orderfind() {
        print_r($this->_post());
        //exit;
        if ($this->_post("ship_tel")) {//搜索电话订单
            $this->redirect("/kehu/odconfirm/act/view/ship_tel/" . $this->_post("ship_tel"));
        }
        if ($this->_post("ship_name")) {
            $this->redirect("/kehu/odconfirm/act/view/ship_name/" . $this->_post("ship_name"));
        }
        if ($this->_post("searchfrom") && $this->_post("searchto") || $this->_post("terminal_tag")) {
            $this->redirect("/kehu/odconfirm/act/view/searchfrom/" . $this->_post("searchfrom") . "/searchto/" . $this->_post("searchto"). "/terminal_tag/" . $this->_post("terminal_tag"));
        }
    }    
    public function getorderinfocsv(){
        require_once 'PHPExcel/phpexcel.php'; 
        
        $haha = M();
        $datalist = $haha->query($_SESSION['think_lastsql']); 
        
        
                $objPHPExcel = new PHPExcel(); 
                $objPHPExcel->getProperties()->setCreator("Da")
                                             ->setLastModifiedBy("Da")
                                             ->setTitle("Office 2007 XLSX Test Document")
                                             ->setSubject("Office 2007 XLSX Test Document")
                                             ->setDescription("Test document for Office 2007 XLSX, generated                                                                                  using  PHP classes.")
                                             ->setKeywords("office 2007 openxml php")
                                             ->setCategory("Test result file");
                $objPHPExcel->setActiveSheetIndex(0);                                                         
                $objPHPExcel->getActiveSheet(0)->setTitle('营销部门');
                //$objActSheet = $objExcel->getActiveSheet();  



                //设置宽度  默认大小  字体
                //$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
                //$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
                $objPHPExcel->getActiveSheet()->getDefaultColumnDimension()->setWidth(15);
                $objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setName('Arial');
                $objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setSize(10);


                $objPHPExcel->getActiveSheet(0)->setCellValue('A1','姓名');
                $objPHPExcel->getActiveSheet(0)->setCellValue('B1','手机');
                $objPHPExcel->getActiveSheet(0)->setCellValue('C1','邮箱');
                $objPHPExcel->getActiveSheet(0)->setCellValue('D1','地址'); 
                spl_autoload_register(array('Think','autoload')); 
                foreach($datalist as $key => $value){ 
                        static $i = 2;
                        $name[$i]['ship_name'] =  $value['ship_name'];
                        $name[$i]['ship_mobile'] =  $value['ship_mobile'];
                        $name[$i]['ship_email'] =  $value['ship_email'];
                        $name[$i]['ship_addr'] =  $value['ship_addr'];
                        $objPHPExcel->getActiveSheet(0)->setCellValue('A' . $i, $name[$i]['ship_name']);
                        $objPHPExcel->getActiveSheet(0)->setCellValue('B' . $i, $name[$i]['ship_mobile']);
                        $objPHPExcel->getActiveSheet(0)->setCellValue('C' . $i, $name[$i]['ship_email']);
                        $objPHPExcel->getActiveSheet(0)->setCellValue('D' . $i, $name[$i]['ship_addr']); 
                        $i++;
                }
 
//                //添加一个新的worksheet  综合部门
//                $objPHPExcel->createSheet();  
//                $objPHPExcel->getSheet(1)->setTitle('综合部门');
//                $objPHPExcel->setActiveSheetIndex(1); 
//下面一段代码跟上面类似 就是新建一个sheet 
//---------------------------------------------------------------------------此处代码省略-------------------------------------------  
/*                 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); 
$objWriter->save(str_replace('.php', '.xls', __FILE__)); 
echo '导出成功';  
 */
                $filename = date('Y-m',time());
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename='.$filename.'.xls');
                header('Cache-Control: max-age=0');
                

                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
                $objWriter->save('php://output');  //这里生成excel后会弹出下载

                exit;
        
    }

    public function getorderlistinfocsv(){//订单导出
        require_once 'PHPExcel/phpexcel.php'; 
        
        $haha = M();
        $datalist = $haha->query($_SESSION['think_lastsql']); 
        
        
                $objPHPExcel = new PHPExcel(); 
                $objPHPExcel->getProperties()->setCreator("Da")
                                             ->setLastModifiedBy("Da")
                                             ->setTitle("Office 2007 XLSX Test Document")
                                             ->setSubject("Office 2007 XLSX Test Document")
                                             ->setDescription("Test document for Office 2007 XLSX, generated                                                                                  using  PHP classes.")
                                             ->setKeywords("office 2007 openxml php")
                                             ->setCategory("Test result file");
                $objPHPExcel->setActiveSheetIndex(0);                                                         
                $objPHPExcel->getActiveSheet(0)->setTitle('订单汇总');
                //$objActSheet = $objExcel->getActiveSheet();  



                //设置宽度  默认大小  字体
                //$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
                //$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
                $objPHPExcel->getActiveSheet()->getDefaultColumnDimension()->setWidth(15);
                $objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setName('Arial');
                $objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setSize(10);


                $objPHPExcel->getActiveSheet(0)->setCellValue('A1','姓名');
                $objPHPExcel->getActiveSheet(0)->setCellValue('B1','手机');
                $objPHPExcel->getActiveSheet(0)->setCellValue('C1','邮箱');
                $objPHPExcel->getActiveSheet(0)->setCellValue('D1','地址');
                $objPHPExcel->getActiveSheet(0)->setCellValue('E1','金额'); 
                $objPHPExcel->getActiveSheet(0)->setCellValue('F1','订单号');
                spl_autoload_register(array('Think','autoload')); 
                foreach($datalist as $key => $value){ 
                        static $i = 2;
                        $name[$i]['ship_name'] =  $value['ship_name'];
                        $name[$i]['ship_mobile'] =  $value['ship_mobile'];
                        $name[$i]['ship_email'] =  $value['ship_email'];
                        $name[$i]['ship_addr'] =  $value['ship_addr'];
                        $name[$i]['payed'] =  $value['payed'];
                        $name[$i]['outer_order_id'] =  $value['outer_order_id'];
                        $objPHPExcel->getActiveSheet(0)->setCellValue('A' . $i, $name[$i]['ship_name']);
                        $objPHPExcel->getActiveSheet(0)->setCellValue('B' . $i, $name[$i]['ship_mobile']);
                        $objPHPExcel->getActiveSheet(0)->setCellValue('C' . $i, $name[$i]['ship_email']);
                        $objPHPExcel->getActiveSheet(0)->setCellValue('D' . $i, $name[$i]['ship_addr']); 
                        $objPHPExcel->getActiveSheet(0)->setCellValue('E' . $i, $name[$i]['payed']); 
                        $objPHPExcel->getActiveSheet(0)->setCellValue('F' . $i, $name[$i]['outer_order_id']);
                        $i++;
                }
 
//                //添加一个新的worksheet  综合部门
//                $objPHPExcel->createSheet();  
//                $objPHPExcel->getSheet(1)->setTitle('产品汇总');
//                $objPHPExcel->setActiveSheetIndex(1); 
                
                              
//下面一段代码跟上面类似 就是新建一个sheet 
//---------------------------------------------------------------------------此处代码省略-------------------------------------------  
/*                 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); 
$objWriter->save(str_replace('.php', '.xls', __FILE__)); 
echo '导出成功';  
 */
                $filename = date('Y-m',time());
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename='.$filename.'.xls');
                header('Cache-Control: max-age=0');
                

                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
                $objWriter->save('php://output');  //这里生成excel后会弹出下载

                exit;
        
    }    

    public function getorderiteminfocsv(){//订单产品导出
        require_once 'PHPExcel/phpexcel.php'; 
        
        $haha = M();
        $datalist = $haha->query($_SESSION['think_lastsql2']); 
        
        
                $objPHPExcel = new PHPExcel(); 
                $objPHPExcel->getProperties()->setCreator("Da")
                                             ->setLastModifiedBy("Da")
                                             ->setTitle("Office 2007 XLSX Test Document")
                                             ->setSubject("Office 2007 XLSX Test Document")
                                             ->setDescription("Test document for Office 2007 XLSX, generated                                                                                  using  PHP classes.")
                                             ->setKeywords("office 2007 openxml php")
                                             ->setCategory("Test result file");
                $objPHPExcel->setActiveSheetIndex(0);                                                         
                $objPHPExcel->getActiveSheet(0)->setTitle('订单产品汇总');
                //$objActSheet = $objExcel->getActiveSheet();  



                //设置宽度  默认大小  字体
                //$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
                //$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
                $objPHPExcel->getActiveSheet()->getDefaultColumnDimension()->setWidth(15);
                $objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setName('Arial');
                $objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setSize(10);


                $objPHPExcel->getActiveSheet(0)->setCellValue('A1','订单号');
                $objPHPExcel->getActiveSheet(0)->setCellValue('B1','货号');
                $objPHPExcel->getActiveSheet(0)->setCellValue('C1','名称');
                $objPHPExcel->getActiveSheet(0)->setCellValue('D1','价格');
                $objPHPExcel->getActiveSheet(0)->setCellValue('E1','发货量'); 
                $objPHPExcel->getActiveSheet(0)->setCellValue('F1','平台');
                spl_autoload_register(array('Think','autoload')); 
                foreach($datalist as $key => $value){ 
                        static $i = 2;
                        $name[$i]['outer_order_id'] =  $value['outer_order_id'];
                        $name[$i]['bn'] =  $value['bn'];
                        $name[$i]['name'] =  $value['name'];
                        $name[$i]['price'] =  $value['price'];
                        $name[$i]['sendnum'] =  $value['sendnum'];
                        $name[$i]['terminal_name'] =  $value['terminal_name'];
                        $objPHPExcel->getActiveSheet(0)->setCellValue('A' . $i, $name[$i]['outer_order_id']);
                        $objPHPExcel->getActiveSheet(0)->setCellValue('B' . $i, $name[$i]['bn']);
                        $objPHPExcel->getActiveSheet(0)->setCellValue('C' . $i, $name[$i]['name']);
                        $objPHPExcel->getActiveSheet(0)->setCellValue('D' . $i, $name[$i]['price']); 
                        $objPHPExcel->getActiveSheet(0)->setCellValue('E' . $i, $name[$i]['sendnum']); 
                        $objPHPExcel->getActiveSheet(0)->setCellValue('F' . $i, $name[$i]['terminal_name']);
                        $i++;
                }
 
//                //添加一个新的worksheet  综合部门
//                $objPHPExcel->createSheet();  
//                $objPHPExcel->getSheet(1)->setTitle('产品汇总');
//                $objPHPExcel->setActiveSheetIndex(1); 
                
                              
//下面一段代码跟上面类似 就是新建一个sheet 
//---------------------------------------------------------------------------此处代码省略-------------------------------------------  
/*                 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); 
$objWriter->save(str_replace('.php', '.xls', __FILE__)); 
echo '导出成功';  
 */
                $filename = date('Y-m',time());
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename='.$filename.'item.xls');
                header('Cache-Control: max-age=0');
                

                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
                $objWriter->save('php://output');  //这里生成excel后会弹出下载

                exit;
        
    }        
    
}

?>
