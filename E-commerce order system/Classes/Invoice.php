<?php
class Invoice implements InvoiceInterface {
    private int $invoiceNumber ; 
    private int $amount ; 

    public function __construct(int $invoiceNumber, int $amount)
    {
        $this->invoiceNumber = $invoiceNumber ; 
        $this->amount = $amount ; 
    }

    #[Override]
    public function generateInvoice()
    {
        return 'The invoice number is: '.$this->invoiceNumber.' <br> The amount is '.$this->amount;
    }

    #[Override]
    public function getInvoiceNumber()
    {
        return 'The invoice number is '.$this->invoiceNumber ; 
    }
}