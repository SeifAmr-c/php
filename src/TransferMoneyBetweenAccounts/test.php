<?php
require_once __DIR__ . '/../PDO/connection.php'; // gives us the $pdo object connected to the database

// test IDs and balance
$sender = 2;
$receiver = 1;
$amount = 1000;

// validation the inputs entered
function validateTransfer(float $amount,int $id){
    if($amount <= 0){
        throw new InvalidArgumentException('The amount must be greater than 0');
    }
    if($id <= 0){
        throw new OutOfRangeException('Please enter a valid id in order to continue');
    }
}
try{
    // calling the function to check if the trasnfer is valid
    validateTransfer($amount, $sender);
    validateTransfer($amount, $receiver);
    // checking if the sender is the same as the receiver
    if ($sender === $receiver) {
        throw new InvalidArgumentException('Sender and receiver must be different');
    }
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
    throw new Exception('there is not enough balance, or the user does not exist');
    }
    // sending the receiver data
    $stmtReceive->execute([
        ':amount' => $amount,
        ':id'=>$receiver
    ]);

    // if not exists the transaction does not go through and the amount is reversed, there must be a valid id
    if($stmtReceive->rowCount() === 0){
        throw new Exception('Receiver does not exist');
    }

    $pdo->commit(); 
    echo 'The amount has been sent';


}catch(Throwable $e){
    // Check whether a transaction is still active
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }

    echo 'Transfer failed: ' . $e->getMessage();
}finally{
    echo 'Validation process finished';
}


