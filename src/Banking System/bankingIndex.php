<?php
require_once 'premiumAccount.php' ; 

$account1 = new PremiumAccount("Ahmed", 5000);

echo $account1->getBalance();

$account1->addBonus(1000);
echo "<br>" ; 
echo $account1->getBalance();