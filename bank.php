<?php 

class Bank { 
    private  float $balance ; 
    public function __construct( float $balance) {
        $this-> balance = $balance ;  
    }
    
    public function getbalance(): float { 
        return $this->balance ; 
    }

    public function setbalance(float $newbalance) {
        $this->balance = $newbalance ; 
    }
}

