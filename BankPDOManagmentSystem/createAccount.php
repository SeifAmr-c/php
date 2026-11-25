<?php
require_once __DIR__ . '/../PDO/connection.php'; // gives us the $pdo object connected to the database

// server validation
if($_SERVER['REQUEST_METHOD'] === 'POST'){
// balance validation
if(!is_numeric($_POST['balance']) || $_POST['balance'] < 0 ){
    echo'The balance can not be less than 0 or does not contain a number, please enter a valid value';
    exit();
}
// owner validation
if(empty(trim($_POST['owner']))){
    echo  'The owner place holder can not be empty' ; 
    exit();
    }; 
//name and balance spaces validation
$owner = trim($_POST['owner']);

$balance = trim($_POST['balance']);   

// select statement to check for duplicate
$select = $pdo->prepare('SELECT * FROM accounts WHERE owner =:owner');    

$select->execute([
    ':owner'=>$_POST['owner']
]);

$existing = $select->fetch();
if($existing){
    echo 'The owner name alreay exists please login instead';
    exit(); 
};
// preparing the statment
$stmt  = $pdo->prepare('INSERT INTO accounts (owner,balance) VALUES (:owner,:balance)');
//exucting the statement
$result = $stmt->execute([
    ':owner' => $owner,
    ':balance'=>$balance
]);
// checking if succeeded or not
if($result){
    echo 'the query has been excuted succesfully';
}
}