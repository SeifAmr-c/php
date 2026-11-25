<?php
require_once __DIR__ . '/connection.php'; // connection file that have the PDO object and the connection database

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $stmt = $pdo->prepare("UPDATE accounts SET balance = :balance WHERE id = :id") ; 

    $stmt->execute([
        ':id'=>$_POST['id'],
        ':balance'=>$_POST['balance']
    ]);
}