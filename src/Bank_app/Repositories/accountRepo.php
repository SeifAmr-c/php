<?php
namespace App\Repositories;

use App\Interfaces\AccountRepoInterface;
use App\Entities\Account;
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
}