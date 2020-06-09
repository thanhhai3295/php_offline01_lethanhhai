<?php
 
    class Validate {
        
        /**
         * @var array $patterns
         */
 
        public $errors = array();
        
 
        public function name($name){   
            $this->name = $name;
            return $this;
        }
        
        public function value($value){
            $this->value = $value;
            return $this;
        
        }
        

        public function required(){
            
            if((isset($this->file) && $this->file['error'] == 4) || ($this->value == '' || $this->value == null)){
                $this->errors["$this->name"] = 'Please Enter '.$this->name;
            }            
            return $this;
            
        }
        

       
        public function isSuccess(){
            if(empty($this->errors)) return true;
        }

        public function getErrors(){
            if(!$this->isSuccess()) return $this->errors;
        }
        
        
        
    }
?>