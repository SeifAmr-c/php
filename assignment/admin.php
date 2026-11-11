<?php 
require_once 'user.php' ; 
class admin extends User{

    public function expressYourRole(){
        return "admin" ; 
    }

    public function sayHello() {
        return "Hello admin, ".$this->setusername() ; 
    }
}