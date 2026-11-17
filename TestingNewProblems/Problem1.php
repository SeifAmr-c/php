<?php

$Users = [
    [
    'name' => 'Ahmed Mohamed',
    'Email' => 'Ahmed@gmail.com',
    'Password'=>password_hash('Ahmed123@',PASSWORD_DEFAULT)
    ],
    [
    'name' => 'Khaled Mohamed',
    'Email' => 'Khaled@gmail.com',
    'Password'=>password_hash('khaled123@',PASSWORD_DEFAULT)
    ]
] ;

function findUserByEmail(string $email){
    global $Users ; 

    foreach($Users as $user)
        {
        if($email === $user['Email']) {
            return $user; 
        }
        
        }
        return null ; 
}

function isEmailRegistered(string $email): bool{

    $user = findUserByEmail($email) ; 
    if($user) {
        return TRUE ; 
    }
    else{
        return FALSE ; 
    }

}


var_dump(isEmailRegistered('Ahmed@gmail.com')); // true

var_dump(isEmailRegistered('Seif@gmail.com')); // false
