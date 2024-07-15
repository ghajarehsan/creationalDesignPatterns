<?php

namespace App\DesignPatterns\FactoryMethod\Example1\Sms;

use App\DesignPatterns\FactoryMethod\Example1\NotificationInterface;

class SmsNotification implements NotificationInterface{

    public function send($message){
        return 'message was sent by sms and message is : '.$message;
    }

}
