<?php
namespace App\Entities;

class Account
{
    private int $id;
    private string $owner;
    private float $balance;

    public function __construct(int $id,string $owner,float $balance){
        $this->id=$id;
        $this->owner=$owner;
        $this->balance=$balance;
    }
    public function getId():int {
        return $this->id;
    }
    public function getOwner():string {
        return $this->owner;
    }
    public function getBalance():float {
        return $this->balance;
    }
    
}