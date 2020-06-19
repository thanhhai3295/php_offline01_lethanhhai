<?php 
  class GroupValidate extends Validate {
    public function required(){
      if((isset($this->file) && $this->file['error'] == 4) || ($this->value == '' || $this->value == null)){
          $this->errors["$this->name"] = 'Please Enter '.$this->name;
      }            
      return $this;
      
    }
  }
?>