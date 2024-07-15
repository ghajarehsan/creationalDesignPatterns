<?php

namespace App\DesignPatterns\FactoryMethod\Example1\Email;

use App\DesignPatterns\FactoryMethod\Example1\NotificationInterface;

class EmailNotification implements NotificationInterface{

    public function send($message){
        return 'message was sent by email SMTP and message is : '.$message;
    }

}
