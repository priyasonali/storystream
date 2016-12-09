
<?php
  
  class ErrorList {
      public function __construct(){
          
         $this->errlist = array();
          $this->errlist[0] = "This email is already registered.";
          $this->errlist[1] = "This username is taken.";
          $this->errlist[2] = "Please enter the details.";
      }
}