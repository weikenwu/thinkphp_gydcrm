<?php
/*
 * 1.有对应客户的归属到其客服订单中
 * 2.没有对应客户的，新增客户到总客户
 * 
 */
//读取处理中心订单
define(HOST_IP, "http://center.gouyundong.net:8083/center/php_rpc/crmserver.php");
define(HOST_KEY, "peakChinaXDddalealdafdkgrfff");

class PhprpcAction extends Action {
    public function index() {
        set_time_limit(0);
        Vendor('phpRPC.phprpc_client');
        $client = new PHPRPC_Client(HOST_IP);
        $client->setKeyLength(1000);
        $client->setEncryptMode(3);
        $client->setCharset('UTF-8');
        $client->setTimeout(15);
        
        $Forms = M('order_get');//数据库
        $where="name ='订单同步'";
        $row=$Forms->where($where)->find();
        $gettime=$row['gettime'];
//        print_r($gettime);
//        exit;
        $ymd = $gettime;
        
        $datetime=strtotime($gettime);//获取当前日期并转换成时间戳
        $datetime=$datetime+86400;
        $ymd2=date("Y-m-d",$datetime);
        
        if (!$ymd) {
            echo "请输入日期";
            exit;
        }
        $time = $ymd . ' 00:00:01';
        if ($ymd2) {
            $time2 = $ymd2 . ' 00:00:00';
        } 
        echo "您搜索的是" . $time . "到" . $time2 . " 全天的订单!";
        $pwd = md5(HOST_KEY . $time);
        $num = $client->CrmOutOrder($time, $time2, $pwd);
        echo '<pre>';
//        print_r($num);
//        exit;
        $Form = M('member');
        $Orders = M('orders');
        $Order=D('Order');
        echo count($num);
        echo '<br>';
        $i=1;
        foreach ($num as $v=>$value){
            $value['ship_mobile']=trim($value['ship_mobile']);
            if(empty ($value['ship_mobile'])){
                echo $value['outer_order_id']."手机号码为空<br>";
                continue;
            }
            $where2="outer_order_id='".$value['outer_order_id']."'";
            $list2=$Orders->where($where2)->find();
            //先判断订单里是否已有
            if($list2['outer_order_id']){//订单重复不做任何判断
                echo $list2['outer_order_id']."系统已有该订单".$list2['ship_mobile']."<br>";
                continue;
            }
            $where="ship_mobile='".$value['ship_mobile']."'";          
            $list=$Form->where($where)->find();
            
            if($list['ship_mobile']){//如果客户系统中有该客户的 op_no
                echo $i." 系统有客户- ".$value['ship_mobile'].'-'.$value['outer_order_id'].'<br>';
                 echo $Form->getLastSql()."<br>";
                //更新客户信息
                $Kehu=D('Kehu');
                $date=array(
                    'ship_mobile'=>$value['ship_mobile'],
                    'ship_email'=>$value['ship_email'],
                    'ship_addr'=>$value['ship_addr'],
                    'latest_time'=>$value['last_change_time'],
                    'payed'=>$value['payed'],
                );
                if($Kehu->updatekehu($date,$list['op_no'])){
                    echo '<b>客户更新成功</b><br>';
                }
                //添加订单   
                
                 echo '添加opno:'.$list['op_no']."<br>";
                //if($list['op_no']>0){//有分配的客户再添加订单
                if($Order->init($value,$list['op_no'])){
                    echo 'opno:'.$list['op_no'].'<b>订单添加成功</b><br>';
                    echo '------------------------------<br>';
                }
                
                //}

            }  else {//系统没有客户信息，直接添加客户信息
                echo $i.'系统没有'.$value['ship_mobile'].'-'.$value['outer_order_id'].'<br>';
                $Kehu=D('Kehu');
                if($Kehu->addkehu($value)){
                    echo '新增新客户成功<br>';
                }
                //如果系统中没有该订单，根据备注添加订单
                $mark_p=explode("@",$value['mark_text']);
                $op_id=$this->opidSearch($mark_p);
                //echo $op_id;
                if($Order->init($value,$op_id)){
                    echo 'opno:'.$op_id.'订单添加成功<br>';
                }
                //如果有备注把客户更新为该客服的客户
                if ($op_id>0) {
                    $Kehu = D('Kehu');
                    $date = array(
                        'ship_mobile' => $value['ship_mobile'],
                        'ship_addr' => $value['ship_addr'],
                        'latest_time' => $value['last_change_time'],
                    );
                    if ($Kehu->updatekehu($date,$op_id)) {
                        echo $op_id.'-<b>客户更新成功</b><br>';
                    }
                }
            }
          $i++;
                //print_r($value);
                //exit;
        }
        //订单循环完毕更新下时间
        $data['gettime'] = $ymd2;
        $where="name='订单同步'";
        $result1=$Forms->where($where)->save($data);
    }
    
    //客户添加
    public function searchKehuadd(){
        set_time_limit(0);
        Vendor('phpRPC.phprpc_client');
        $client = new PHPRPC_Client(HOST_IP);
        $client->setKeyLength(1000);
        $client->setEncryptMode(3);
        $client->setCharset('UTF-8');
        $client->setTimeout(15);
        
        $Forms = M('order_get');//数据库
        $where="name ='客户更新'";
        $row=$Forms->where($where)->find();
        $gettime=$row['gettime'];
//        print_r($gettime);
//        exit;
        $ymd = $gettime;
        
        $datetime=strtotime($gettime);//获取当前日期并转换成时间戳
        $datetime=$datetime+86400;
        $ymd2=date("Y-m-d",$datetime);
        
        //$ymd='2013-5-16';//截止到12 9.1
        //$ymd2='2013-5-17';
        $time = $ymd . ' 00:00:01';
        $time2 = $ymd2 . ' 00:00:00';
        echo "您搜索的是" . $time . "到" . $time2 . " 全天的订单!";
        $pwd = md5(HOST_KEY . $time);
        $num = $client->CrmOutOrder($time, $time2, $pwd);
//        echo '<pre>';
//        print_r($num);
//        exit;
        $Form = M('member');
        $Orders = M('orders');
        echo '<br>';
        $i=1;
        foreach ($num as $v=>$value){
            $value['ship_mobile']=trim($value['ship_mobile']);
            if(empty ($value['ship_mobile'])){
                echo $value['outer_order_id']."手机号码为空<br>";
                continue;
            }
            $where2="outer_order_id='".$value['outer_order_id']."'";
            $list2=$Orders->where($where2)->find();
            //先判断订单里是否已有
            if($list2['outer_order_id']){//订单重复不做任何判断
                echo $list2['outer_order_id']."系统已有该订单".$list2['ship_mobile']."<br>";
                continue;
            }
            $where="ship_mobile='".$value['ship_mobile']."'";          
            $list=$Form->where($where)->find();
            
            if(!$list['ship_mobile']){//如果客户系统中有该客户的
            echo $i.'系统没有'.$value['ship_mobile'].'-'.$value['outer_order_id'].'<br>';
                $Kehu=D('Kehu');
                if($Kehu->addkehu($value)){
                    echo '新增新客户成功<br>';
                }
            }  else {
                echo '有该客户'.$value['ship_mobile'].'-'.$value['outer_order_id'].'<br>';
            }
            $i++;
        }
        //客户添加完更新下时间
        $data['gettime'] = $ymd2;
        $where="name='客户更新'";
        $result1=$Forms->where($where)->save($data);
        
    }
    
    public function opidSearch($mark=0){
        if(!is_array($mark)){
            return 0;
        }
        $User=D('User');
        $search='';
        foreach ($mark as $v=>$value){
            $value = preg_replace("/<([a-zA-Z]+)[^>]*>/","<\\1>",$value);
            $search.="'".$value."',";           
        }
        $search = substr($search,0,strlen($search)-1); 
        $names=$User->getname($search);
        return $names['op_no'];
    }

}

?>
