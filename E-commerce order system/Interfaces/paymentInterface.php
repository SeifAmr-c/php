<?php
interface PaymentInterface {
    public function pay(float $amount) ; 
    public function getPaymentDetails()  ;
}

