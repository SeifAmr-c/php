<?php

class emailNotification implements NotificationInterface{
    private string $email ; 

    public function __construct(string $email) {
        $this->email = $email ; 
    }

    #[Override]
    public function sendMessage(string $message) {
        return 'Message sent by email: '.$message."<br>";
    }

    #[Override]
    public function getNotificationDetails() {
        return 'Notification Method: email<br>Email: '.$this->email ; 
    }
    
    

}