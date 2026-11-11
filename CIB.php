<?php
require_once 'bank.php';
class cib extends Bank implements HasBalance, TaxInterface{
        public function getbalance(): float { 
        return parent::getbalance() + 300; 
    }

    public function getTax(): float {
        return 5.0;
    }


}