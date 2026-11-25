<?php

require_once __DIR__ . '/../../src/UserRegistrationSystem/src/Entities/User.php';
require_once __DIR__ . '/../../src/UserRegistrationSystem/src/Interfaces/UserRepositoryInterface.php';
require_once __DIR__ . '/../../src/UserRegistrationSystem/src/Repositories/InMemoryUserRepository.php';

use PHPUnit\Framework\TestCase;


class InMemoryUserRepositoryTest extends TestCase {
    public function testItCanSaveTheUser():void {
        $Repository = new InMemoryUserRepository() ; 
        $User = new User('Ahmed','Ahmed@gmail.com','Ahmed123@') ; 
        $Repository->save($User) ; 
        $NewUser = $Repository->FindByEmail($User->GetEmail()) ;
        $NewUserNull = $Repository->FindByEmail('Khaled@gmail.com') ;
        $this->assertInstanceOf(User::class,$NewUser) ; 
        $this->assertSame('Ahmed@gmail.com', $NewUser->GetEmail());
        $this->assertNull($NewUserNull) ; 
    }

    public function testCheckIfEmailExists():Void{
        $Repository = new InMemoryUserRepository() ; 
        $User = new User('Ahmed','Ahmed@gmail.com','Ahmed123@') ; 
        $Repository->save($User) ; 
        $Result = $Repository->ExistsByEmail($User->GetEmail()) ;
        $ResultFalse = $Repository->ExistsByEmail('Khaled@gmail.com') ;
        $this->assertTrue($Result); 
        $this->assertFalse($ResultFalse); 
    }
}
