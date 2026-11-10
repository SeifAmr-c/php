<?php

require_once 'CalculateBalance.php';
require_once 'CIB.php';
require_once 'Alahly.php';

$cibAccount = new CalculateBalance(new CIB(5000));

$alahlyAccount = new CalculateBalance(new Alahly(5000));

echo "CIB Final Balance: " . $cibAccount->calculateBalance();

echo "<br>";

echo "Alahly Final Balance: " . $alahlyAccount->calculateBalance();