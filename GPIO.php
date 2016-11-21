<?php
  class GPIO{
    
    /*PRIVATE vars */
    var $_pin = "null";
    var $_direction = "null";
    
    /*COTR
    public function __construct($_pin,$_direction){
      $this->_set_pin($_pin);
      $this->_set_direction($_direction);
    }

    /*PRIVATE METHODS*/
    private function _set_pin($_pin){
      $this->_pin = $_pin;
    }
    
    private function _set_direction($_direction){
      if(strtolower($_direction) == "in" || strtolower($_direction) == "input")
        $_direction = "out";
      else if(strtolower($_direction) == "out" || strtolower($_direction) == "output")
        $_direction = "in";
      
      $this->_direction = $_direction;
      
      exec("gpio export ". $this->get_pin() ." ". $this->get_direction());
    }
    
    /*PUBLIC METHODS*/
    public function get_pin(){
      return $this->_pin;
    }
    
    public function get_direction(){
      return $this->_direction;
    }

		public function write($_state) {
			if (strtolower($_state) == 1 || strtolower($_state) == "1" || strtolower($_state) == "high" || strtolower($_state) == "hi" || strtolower($_state) == "on" )
				$_state = 1;
			else if (strtolower($_state) == 0 || strtolower($_state) == "0" || strtolower($_state) == "low" || strtolower($_state) == "lo" || strtolower($_state) == "off" )
				$_state = 0;
        
			exec( "gpio -g write ". $this->get_pin() ." ". $_state );
		}
    
    public function read() {
	    return exec( "gpio -g read ". $this->get_pin(), $status);
			// return $status;
		}
    
  }
?>
    
    
    
      
