<?php
//客户数据操作
class KehuModel extends Model{
    public function addkehu($das){//添加客户信息   
        $daa=array(
            'terminal_tag'=>$das['terminal_tag'],
            'terminal_name'=>$das['terminal_name'],
            'ship_mobile'=>$das['ship_mobile'],
            'ship_name'=>$das['ship_name'],
            'ship_addr'=>$das['ship_addr'],
            'ship_email'=>$das['ship_email'],
            'ship_area'=>$das['ship_area'],
            'first_time'=>$das['last_change_time'],
            'latest_time'=>$das['last_change_time'],
            'accumulate'=>$das['payed'],
            'op_no'=>'0',//新客户默认0
            
        );
        $User = M("member"); // 实例化
        $resulut=$User->add($daa);
        //echo $User->getLastSql()."<br>";
        if($resulut){
            return true;
        }  else {
            return false;
        }
    }
    public function updatekehu($date,$op_id=0){
        //print_r($date);
        $User = M("member"); // 实例化
        // 要修改的数据对象属性赋值
        $data['ship_addr'] = $date['ship_addr'];
        $data['latest_time'] = $date['latest_time'];
        if($op_id>0){
        $data['op_id'] = $op_id;
        }
        $where="ship_mobile='".$date['ship_mobile']."'";
        $result1=$User->where($where)->save($data); // 根据条件保存修改的数据
        //echo $User->getLastSql()."<br>";
        if($date['payed']){
        $result2=$User->where($where)->setInc('accumulate',$date['payed']);//更新金额
        }
        //echo $User->getLastSql();
        if($result1){
            return true;
        }  else {
            return false;
        }
    }
}

?>
