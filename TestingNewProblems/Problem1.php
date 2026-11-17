<?php


$name = "Ahmed Mohamed";
$email = "ahmed@gmail.com";
$password = "Ahmed1234";
$confirmPassword = "Ahmed123"; 
$isValid = TRUE ; 

if(empty(trim($name))) {
    $isValid = FALSE ; 
    echo 'Please enter a valid name' ; 
}
if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    $isValid = FALSE ; 
    echo 'Please enter a valid email' ; 
} 
if(strlen($password) < 8 ) { 
    $isValid = FALSE ; 
    echo 'Please enter a password more than 8 characters' ; 
}
if ($password !== $confirmPassword) {
    $isValid = FALSE ; 
    echo 'The password do not match' ; 
}
if($isValid) {
    $hasshedPassword = password_hash($password,PASSWORD_DEFAULT) ; 
    echo $hasshedPassword ; 
}