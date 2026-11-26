<?php
require_once __DIR__ . '/../PDO/connection.php'; // gives us the $pdo object connected to the database

// test IDs and balance
$sender = 1;
$receiver = 2;
$amount = 6000;

// begin of the transaction
$pdo->beginTransaction();
// query statement for the sender and cheking if the sender has enough balance
$stmtSend = $pdo->prepare('UPDATE accounts SET balance = balance - :amount WHERE id = :id AND balance >= :amount');
// query statement for the receiver
$stmtReceive = $pdo->prepare('UPDATE accounts SET balance = balance + :amount WHERE id = :id');
// sending sender data
$stmtSend->execute([
    ':amount'=>$amount,
    ':id'=>$sender
]);
// cheking if there is data returned before the transaction
if($stmtSend->rowCount() === 0){
echo 'there is not enough suffecient balance';
$pdo->rollBack();
exit();
}
// sending the receiver data
$stmtReceive->execute([
    ':amount' => $amount,
    ':id'=>$receiver
]);
// checking if the receiver exists
if($stmtReceive->rowCount() === 1){
    $pdo->commit(); 
    echo 'the amount has been received';
}
// if not exists the transaction does not go through and the amount is reversed, there must be a valid id
if($stmtReceive->rowCount() === 0){
    $pdo->rollBack();
    echo 'there is no user with this id';
    exit();
}
