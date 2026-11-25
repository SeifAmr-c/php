<?php

class CreditCard implements PaymentInterface {
    private string  $cardhodler  ; 

    public function __construct( string $cardhodler){
        $this->cardhodler = $cardhodler ; 
    }

    public function pay(float $amount){
        return "paid ".$amount." using credit card" ; 
    }

    public function getPaymentDetails(){
        return "payment method: credit card <br>card holder: ".$this->cardhodler;
    }
    
    
}