<?php
require_once 'bankAccount.php' ;
class PremiumAccount extends BankAccount{
    public function expressYourRole(){
        return "premium customer" ; 
    }

    public function sayHello(){
        return "Welcome ".$this->getOwner().", your premium account is active";
    }

    public function addbonus(float $amount) {
        return  $this->depositBalance($amount) ; 
    }
}
