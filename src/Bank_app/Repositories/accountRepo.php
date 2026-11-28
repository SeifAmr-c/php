<?php
namespace App\Repositories;

use App\Interfaces\AccountRepoInterface;
use App\Entities\Account;
use Override;
use PDO;

class AccountRepo implements AccountRepoInterface{

    public function __construct(private PDO $pdo)
    {
        $this->pdo = $pdo;
    }

	public function findAnAccount(int $id): ?Account
    {
        $stmt = $this->pdo->prepare('SELECT * FROM accounts where id= :id');
        $stmt->execute([
            ':id'=>$id
        ]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC); // return an associative array (column names become array keys)

        if($result === false){
            return null;
        }

        return new Account(
                (int)$result['id'],
                (string)$result['owner'],
                (float)$result['balance']
                );
    }    


    public function retreiveAllAccounts(): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM accounts');
        $stmt->execute(); 
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $accounts= [];  // declaring empty array to save the account objects 
        
        foreach($result as $account){
            $accounts[] =  new Account($account['id'],$account['owner'],$account['balance']); 
        };

        return $accounts;

    }


    #[Override]
    public function createNewAccount(Account $account): bool
    {
        $owner = $account->getOwner();
        $balance = $account->getBalance();
        $stmt = $this->pdo->prepare('INSERT INTO accounts (owner,balance) VALUES (:owner,:balance)'); 
        return $stmt->execute([
            ':owner' => $owner,
            ':balance'=> $balance
        ]);
    }
}