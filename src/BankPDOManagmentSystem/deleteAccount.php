<?php

require_once __DIR__ . '/../PDO/connection.php'; // gives us the $pdo object connected to the database
if($_SERVER['REQUEST_METHOD'] === 'POST'){


// ID validation 
if(!filter_var($_POST['id'],FILTER_VALIDATE_INT) || $_POST['id']<0)
    echo 'Pleas enter a valid id on order to continue';
}

// check if id exists
$id = $_POST['id'];
$stmtSelect = $pdo->prepare('SELECT * FROM accounts WHERE id = :id');
$stmtSelect->execute([
    ':id'=>$id
]);
if(!$stmtSelect->fetch()){
    echo 'The id you have entered is wrong, please enter a valid id and try again';
    exit();
}
// deleting the record
$stmtDelete = $pdo->prepare('DELETE FROM accounts WHERE id =:id'); 
$stmtDelete->execute([
    ':id'=>$id
]);
$deleteRows = $stmtDelete->rowCount();
if($deleteRows > 0) {
    echo 'The record has been deleted';
}
else{
    echo 'The command has ran but no records were deleted';
}



