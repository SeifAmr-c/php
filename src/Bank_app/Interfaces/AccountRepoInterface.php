<?php

namespace App\Interfaces;

use App\Entities\Account;

interface AccountRepoInterface{
    public function findAnAccount(int $id):?Account; // retrun the account object if the account was found and null if not exist
    public function createNewAccount(Account $account):bool; // accept an account object and save it in a property called account
    public function updateBalance(int $id,float $balance):bool;
    public function deleteAccount(int $id):bool;
    public function retreiveAllAccounts():array;
}