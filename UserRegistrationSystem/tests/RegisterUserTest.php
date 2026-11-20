<?php

require_once __DIR__ . '/../src/Entities/User.php';
require_once __DIR__ . '/../src/Interfaces/UserRepositoryInterface.php';
require_once __DIR__ . '/../src/UseCases/RegisterUser.php';

use PHPUnit\Framework\TestCase;

class RegisterUserTest extends TestCase {
    public function testRegisterNewUser() {

        $Repository = $this->createMock(UserRepositoryInterface::class); // creating a mock that applies user repo interface . 
        $Register = new RegisterUser($Repository); // passing the  mock object to the regesister object . 

        $Repository
            ->method('ExistsByEmail')
            ->willReturn(false);

        $Repository
            ->expects($this->once())
            ->method('save') ; 

        $Result = $Register->Register('Ahmed','Ahmed@gmail.com','Ahmed123@','Ahmed123@'); 
        $this->assertInstanceOf(User::class,$Result) ; 
        $this->assertSame('Ahmed@gmail.com',$Result->GetEmail()) ;
        $this->assertTrue(password_verify('Ahmed123@',$Result->GetHashedPassword())); 
    }



    // Trying to create new user with email - Email exists in DB
    public function testRegisterUserWithExistingEmail()
    {
        // Create repo mock
        $Repository = $this->createMock(UserRepositoryInterface::class); // creating a mock that applies user repo interface . 
        // Obj from register user and pass mock to it
        $Register = new RegisterUser($Repository); // passing the  mock object to the regesister object . 
        //Expectation for the repo - What it will return
        $Repository
            ->method('ExistsByEmail')
            ->willReturn(TRUE);

        $Repository
            ->expects($this->never())
            ->method('save') ;
        $Result = $Register->Register('Ahmed','Ahmed@gmail.com','Ahmed123@','Ahmed123@'); 
        $this->assertSame('Email address is already registered',$Result) ; 
        // $this->assertSame('Ahmed@gmail.com',$Result->GetEmail()) ;
        // $this->assertTrue(password_verify('Ahmed123@',$Result->GetHashedPassword()));

    }

    public function testUserRegisterationWithIncorrectPassword(){
        $Repository = $this->createMock(UserRepositoryInterface::class); // creating a mock that applies user repo interface . 
        $Register = new RegisterUser($Repository); // passing the  mock object to the regesister object .

        // Checking what will return 
        $Repository
            ->expects($this->never())
            ->method('save');

        $Result = $Register->Register('Ahmed','Ahmed@gmail.com','',''); 
        $this->assertSame('The password must not be empty, Please enter a valid password',$Result) ; 

    }

    public function testUserRegistratonWithUnmatchedPassword(){
        $Repository = $this->createMock(UserRepositoryInterface::class); // creating a mock that applies user repo interface . 
        $Register = new RegisterUser($Repository); // passing the  mock object to the regesister object .

        // what to expect from the method 
        $Repository
            ->expects($this->never())
            ->method('save');
        // passing the paramters for testing
        $Result = $Register->Register('Khaled','Khaled@gmail.com','Khaled123@','Khaled123') ; 
        $this->assertSame('The two passwords must match in order to continue',$Result);     
    }

    public function testUserRegistratonWithLessThanEightCharachters(){
        $Repository = $this->createMock(UserRepositoryInterface::class); // creating a mock that applies user repo interface . 
        $Register = new RegisterUser($Repository); // passing the  mock object to the regesister object .

        // what to expect from the method 
        $Repository
            ->expects($this->never())
            ->method('save');
        // passing the paramters for testing
        $Result = $Register->Register('Khaled','Khaled@gmail.com','Khaled1','Khaled1') ; 
        $this->assertSame('The passsword must be at least 8 chars',$Result);     

    }

    public function testUserRegistrationWithInvalidName(){
        $Repository = $this->createMock(UserRepositoryInterface::class) ; 
        $Register = new RegisterUser($Repository) ; 

        $Repository
            ->expects($this->never())
            ->method('save') ; 


        $Result = $Register->Register('','Khaled@gmail.com','Khaled123@','Khaled123@') ; 
        $this->assertSame('Please enter a valid name in order to continue',$Result) ; 
            
    }

    public function testUserRegistrationWithEmptyEmail(){
        $Repository = $this->createMock(UserRepositoryInterface::class) ; 
        $Register = new RegisterUser($Repository) ; 

        $Repository
            ->expects($this->never())
            ->method('save') ; 


        $Result = $Register->Register('Khaled','','Khaled123@','Khaled123@') ; 
        $this->assertSame('Please enter a valid email in order to continue',$Result) ; 
    }
    public function testUserRegistrationWithUnvalidEmail(){
        $Repository = $this->createMock(UserRepositoryInterface::class) ; 
        $Register = new RegisterUser($Repository) ; 

        $Repository
            ->expects($this->never())
            ->method('save') ; 


        $Result = $Register->Register('Khaled','@gmail.com','Khaled123@','Khaled123@') ; 
        $this->assertSame('Please enter a valid email in order to continue',$Result) ; 
    }

    
    }