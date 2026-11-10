<?php

require_once 'Bank.php';
require_once 'hasBalance.php';

class Alahly extends Bank implements HasBalance {

    public function getTax(): float {
        return 10.0;
    }

}