<?php
require_once 'Bank.php';
class cib extends Bank implements HasBalance{
        public function getbalance(): float { 
        return parent::getbalance() + 300; 
    }

    public function getTax(): float {
        return 5.0;
    }


}