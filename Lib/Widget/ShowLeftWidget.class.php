<?php

class ShowLeftWidget extends Widget{
    public function render($data){ 
        $content = $this->renderFile('left',$data);
        //print_r($data);
        return $content;  
    } 
}

?>
