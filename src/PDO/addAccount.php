<?php


require_once __DIR__ . '/connection.php'; // connection file that have the PDO object and the connection database

if($_SERVER['REQUEST_METHOD'] === 'POST'){ // checking that the https request is post


    $stmt = $pdo->prepare("INSERT INTO accounts(owner, balance)VALUES(:owner, :balance)"); // preparing the statements and saving it in stmt variable

    // entering the values 
    $stmt->execute([
        ':owner' => $_POST['name'], // name comes from the name attr in the html form the same applies for balance.
        ':balance' => $_POST['balance']
    ]);

}; 


