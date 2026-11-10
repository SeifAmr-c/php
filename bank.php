<?php 

class Bank { 
    private  int $balance ; 
    public function __construct( int $balance) {
        $this-> balance = $balance ;  
    }
    
    public function getbalance(): float { 
        return $this->balance ; 
    }

    public function setbalance(int $newbalance) {
        $this->balance = $newbalance ; 
    }
}

