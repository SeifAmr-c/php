<?php

require_once './src/Entities/User.php' ;
require_once './src/Interfaces/UserRepositoryInterface.php' ;
require_once './src/Repositories/InMemoryUserRepository.php' ;
require_once './src/UseCases/RegisterUser.php' ;


$InMemoryUserRepository = new InMemoryUserRepository() ; 
$RegisterUser = new RegisterUser($InMemoryUserRepository) ;
$User = $RegisterUser->Register('Ahmed','Ahmed@gmail.com','Ahmed123@','Ahmed123@') ; 
echo $User->GetEmail() ; 