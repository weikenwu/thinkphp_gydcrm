<?php
//订单表操作
class OrderModel extends Model {

    public function init($das,$op_no='0') {
//        print_r($das['items']);
//        exit;
        $order_id = $this->gen_id();
        $da=$das;
        unset ($da['items']);//去掉详细订单部分
        $da['order_id']=$order_id;//主键不传
        $da['op_no']=$op_no;
        $User = M("orders"); // 实例化
        $resulut1=$User->add($da);
        echo $User->getLastSql()."<br>";
        $da2=$das['items'];
        $User2=M("order_items");
        foreach ($das['items'] as $v=>$value){
            $value['order_id']=$da['order_id'];
            $value['dly_status']='shipping';
            $resulut2=$User2->add($value);
            echo $User2->getLastSql()."<br>";
        }
        if($resulut1){
            return true;
        }  else {
            return false;
        }
        
    }
    public function gen_id(){//orderid
        $i = rand(0,9999);
        do{
            if(9999==$i){
                $i=0;
            }
            $i++;
            $order_id = $this->mydate('YmdH').str_pad($i,4,'0',STR_PAD_LEFT);
            $Form = M('orders');
            $where='order_id ='.$order_id;
            $row=$Form->where($where)->find();
            //$row = $this->db->selectrow('SELECT order_id from sdb_orders where order_id ='.$order_id);
        }while($row);
        return $order_id;
    }
    public function mydate($f,$d=null){
    global $_dateCache;
    if(!$d)$d=time();
    if(!isset($_dateCache[$d][$f])){
        $_dateCache[$d][$f] = date($f,$d);
    }
    return $_dateCache[$d][$f];
}

}

?>
