<?php

class BlogViewModel extends ViewModel {
   public $viewFields = array(
     'order_confirm_group'=>array('group_id','name'),
     'order_confirm_op'=>array('_on'=>'order_confirm_group.group_id=order_confirm_op.group_id'),
     'operators'=>array('username'=>'username','op_id','_on'=>'order_confirm_op.op_id=operators.op_id'),
   );
}

?>
