<?php

interface NotificationInterface {
    public function sendMessage(string $message) ; 
    public function getNotificationDetails() ; 


}