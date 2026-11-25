<?php

interface PaymentInterface {
    public function pay(float $amount) ;  // process the payment
    public function getPaymentDetails() ;  // return information about the payment method
}