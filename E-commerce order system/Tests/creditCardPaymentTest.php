<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../Interfaces/paymentInterface.php';
require_once __DIR__ . '/../Classes/creditCardPayment.php';

class CreditCardPaymentTest extends TestCase {

public function testCreditCard() {
    $credit = new CreditCardPayment('Ahmed') ; 
    $this->assertEquals('The payment is confrimed, the total payment is ' . 50,$credit->pay(50)) ;
}
}

