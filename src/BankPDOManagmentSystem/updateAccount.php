<?php
require_once __DIR__ . '/../PDO/connection.php'; // gives us the $pdo object connected to the database

if($_SERVER['REQUEST_METHOD'] === 'POST'){
//validation for the id and balance
if(!is_numeric($_POST['id']) || $_POST['id'] < 0){
    echo 'Please enter a valid in order to continue';
    exit();
}
if(!is_numeric($_POST['balance']) || $_POST['balance'] < 0){
    echo 'Please enter a valid balance to continue';
    exit();
}
// saving the post in a variables
$id = trim($_POST['id']);
$balance = trim($_POST['balance']);
// checking if id exists
$stmtSelect = $pdo->prepare('SELECT * FROM accounts WHERE id = :id');
$stmtSelect->execute([
    ':id'=>$id
]);
$resultSelect = $stmtSelect->fetch(); // return the first record if exists
if(!$resultSelect){
    echo 'The id you have entered does not exists, please enter a valid id and try again';
    exit();
}
//updating the balance
$stmtUpdate = $pdo->prepare('UPDATE accounts SET balance = :balance WHERE id = :id');
$resultUpdate = $stmtUpdate->execute([
    ':id'=> $id,
    ':balance'=> $balance
]);
// check if the record has been updated
if($resultUpdate){
echo 'The record has been updated' ; 
}
}