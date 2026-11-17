<?php

class BankAccount implements BankAccountInterface {
    private float $balance = 0.0 ; 

    #[Override]
    public function deposit(float $amount): void
    {
        $this->balance += $amount;
    }

    #[Override]
    public function withdraw(float $amount): void
    {
        $this->balance -= $amount ; 
    }

    #[Override]
    public function getBalance(): float
    {
        
    return $this->balance;
    }
}