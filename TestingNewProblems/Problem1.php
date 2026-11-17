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

foreach($Users as $user) {
echo $user['name'].'<br>'.$user['Email'];
}