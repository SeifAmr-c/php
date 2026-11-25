<?php
require_once 'Interfaces/orderInterface.php' ; 
require_once 'Interfaces/paymentInterface.php' ; 
require_once 'Interfaces/invoiceInterface.php' ; 
require_once 'Classes/creditCardPayment.php' ; 
require_once 'Classes/invoice.php' ; 
require_once 'Classes/order.php' ; 


$order  = new Order('Laptop',25000,2) ; 
$orderTotalPayment = $order->calculateTotal() ; 
$creditCardPayment = new creditCardPayment('Ahmed') ; 
$invoice = new Invoice(1001,$orderTotalPayment) ; 
echo $order->getOrderDetails().'<br>The total amount is '.$orderTotalPayment." ".$creditCardPayment->pay($orderTotalPayment).' '.$creditCardPayment->getPaymentDetails().' '.$invoice->generateInvoice();
