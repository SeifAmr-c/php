<?php

class User {
    private string $Name ; 
    private string $Email ; 
    private string $HashedPassword ; 

    public function __construct(string $Name, string $Email, string $HashedPassword) 
    {
        $this->Name = $Name ; 
        $this->Email = $Email ; 
        $this->HashedPassword = $HashedPassword ; 
    }

    public function GetName() : string{
        return $this->Name ; 
    }
    public function GetEmail() : string{
        return $this->Email ; 
    }

    public function GetHashedPassword() : string {
        return $this->HashedPassword ; 
    }


}