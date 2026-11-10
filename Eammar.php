<?php
require_once 'bank.php' ; 

class emmar extends Bank{
    #[Override]
    public function getbalance()
    {
        return "Emmar account balance is ".parent::getbalance()." EGP";
    }
}