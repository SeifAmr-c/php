<?php

require_once 'calculateBalanceInterface.php';
require_once 'hasBalance.php';
require_once 'taxInterface.php' ;

class CalculateBalance implements CalculateBalanceInterface{


    public function __construct(private HasBalance&TaxInterface $balance) {
    }

    public function calculateBalance(): float {

        $balance = $this->balance->getBalance();

        $tax = $this->balance->getTax();

        return $balance - ($balance * $tax / 100);

    }

}