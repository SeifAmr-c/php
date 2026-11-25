<?php


class CreditCardPayment implements PaymentInterface{
    private string $cardholder ; 

    public function __construct( string $cardhodler)
    {
        $this->cardholder = $cardhodler ; 
    }

    #[Override]
    public function pay(float $amount)
    {
        return 'The payment is confrimed, the total payment is '.$amount  ; 
    }

    #[Override]
    public function getPaymentDetails()
    {
        return "The amount was paid by : credit card,<br>Card holder name: ".$this->cardholder;
    }
}