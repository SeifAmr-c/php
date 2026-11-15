<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../Interfaces/invoiceInterface.php';
require_once __DIR__ . '/../Classes/Invoice.php';

class InoviceTest extends TestCase {
    public function testInvoice() {
        $invoice = new Invoice(1000,5000) ;
        $amount = 5000;
        $this->assertEquals('The invoice number is: '.$invoice->getInvoiceNumber().' <br> The amount is '.$amount,$invoice->generateInvoice()) ; 
    }
}