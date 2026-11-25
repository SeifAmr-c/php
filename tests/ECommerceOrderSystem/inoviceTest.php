<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../../src/E-commerce order system/Interfaces/invoiceInterface.php';
require_once __DIR__ . '/../../src/E-commerce order system/Classes/Invoice.php';

class InoviceTest extends TestCase {

    protected Invoice $invoice;
    #[Override]
    public function setUp(): void
    {
        $this->invoice = new Invoice(1000,5000);
    }
    public function testAsserting() {
        $amount = 5000;
        $this->assertEquals('The invoice number is: '.$this->invoice->getInvoiceNumber().' <br> The amount is '.$amount,$this->invoice->generateInvoice()) ; 
    }
}