<?php
require_once 'PaymentInterface.php';
require_once 'creditCard.php';
require_once 'paypal.php' ; 

$creditCard = new CreditCard("Ahmed"); 
$paypal = new paypal("Ahmedtest@gmail.com") ; 

//echo $creditCard->pay(500)  ; 
//echo $paypal->getPaymentDetails() ; 
echo $paypal->pay(600) ; 