<?php

class sms implements NotificationInterface {
    private string $phoneNumber ; 

    public function __construct(string $phoneNumber){
        $this->phoneNumber = $phoneNumber ; 
    }

    #[Override]
    public function sendMessage(string $message)
    {
        return 'Message sent by sms: '.$message ;
    }
    #[Override]
    public function getNotificationDetails()
    {
        return 'Notification Method: sms<br>phone: '.$this->phoneNumber ; 
    }
    
}