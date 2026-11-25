<?php

class Paypal implements PaymentInterface{
    private string $email ; 

    public function __construct(string $email) {
        $this->email = $email ; 
    }
    
    public function pay(float $amount){
        return 'paid '.$amount.' using paypal'  ; 
    }

    public function getPaymentDetails() {
        return 'Payment method: paypal <br>Email: '.$this->email; 
    }
    
}