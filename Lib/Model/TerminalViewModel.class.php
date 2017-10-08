<?php

class TerminalViewModel extends ViewModel {
   public $viewFields = array(
     'terminal_confirm'=>array('group_id','terminal_id'),
     'terminal'=>array('terminal_id'=>'terminal_id','name','tag','_on'=>'terminal_confirm.terminal_id=terminal.terminal_id'),
   );
}

?>
