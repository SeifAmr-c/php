<?php
require_once 'notificationInterface.php' ;
require_once 'emailNotification.php' ; 
require_once 'sms.php' ; 

$emailNotification = new emailNotification('khaledtest@gmail.com') ; 
$smsNotification = new sms('01930193201') ; 

//echo $emailNotification->sendMessage('Your roder has been shipped') ; 
//echo $emailNotification->getNotificationDetails() ; 
echo $smsNotification->sendMessage('Your order has been shipped') ; 
echo $smsNotification->getNotificationDetails() ; 