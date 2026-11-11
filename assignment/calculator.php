<?php

class Calculator {
    public int $num1  ; 
    public int $num2   ; 

    public function __construct( $num1, $num2){
        if (!is_numeric($num1) || !is_numeric($num2)) {
            echo"Please enter valid numbers";
            exit;
        }
            $this->num1 = $num1 ; 
            $this->num2 = $num2 ; 

    }

    
    
    public function add(){
    return $this->num1 + $this->num2 ; 
    }
    public function subtract(){
    return $this->num1 - $this->num2 ; 
    }
    public function multiply(){
    return $this->num1 * $this->num2 ; 
    }
    public function divide(){
    return $this->num1 / $this->num2 ; 
    }
}