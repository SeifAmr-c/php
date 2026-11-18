<?php
class RegisterUser {
    private UserRepositoryInterface $Repository ; 

    public function __construct(UserRepositoryInterface $Repository)
    {
        $this->Repository = $Repository ; 
    }

    public function Register(string $Name, string $Email, string $password, string $ConfirmPassword){
        if(empty(trim($Name))) {
            return 'Please enter a valid name in order to continue' ; 
        }
        if(!filter_var($Email,FILTER_VALIDATE_EMAIL)){
            return 'Please enter a valid email in order to continue' ; 
        }
        if($this->Repository->ExistsByEmail($Email)){
            return 'Email address is already registered' ; 
        }
        if(empty($password)){
            return 'The password must not be empty, Please enter a valid password' ; 
        }
        if(strlen($password) < 8 ){
            return 'The passsword must be at least 8 chars' ; 
        }
        if($password !== $ConfirmPassword) {
            return 'The two passwords must match in order to continue' ; 
        }
        $HashedPassword = password_hash($password,PASSWORD_DEFAULT) ; 
        $User = new User($Name,$Email,$HashedPassword) ; 
        $this->Repository->save($User) ; 
        return $User ; 
        
    }
}