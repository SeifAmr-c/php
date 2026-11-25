<?php
require_once __DIR__ . '/../PDO/connection.php'; // gives us the $pdo object connected to the database

$stmt = $pdo->query('SELECT * FROM accounts') ; // I have used query instead of prepare because there is no place holders
$accounts = $stmt->fetchAll();
foreach($accounts as $account){
    echo $account['id'].'<br>'.$account['owner'].'<br>'.$account['balance'];
}

