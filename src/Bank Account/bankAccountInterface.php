<?php


interface BankAccountInterface {
    public function deposit(float $amount) :void ;  
    public function withdraw(float $amount):void ; 
    public function getBalance():float ; 

}