<?php

class BankAccount {
    private string $owner ; 
    private float $balance ; 

    public function __construct( string $owner,float $balance){
        $this->owner = $owner ;
        $this ->balance =$balance;
            }

    public function setOwner(string $owner) {
        return $this->owner = $owner ; 
    }

    public function getOwner() {
        return $this->owner ; 
    }
    
    public function getBalance() {
        return $this->balance ; 
    }

    public function depositBalance(float $balance){
        $this->balance+=$balance ; 
    } 

}