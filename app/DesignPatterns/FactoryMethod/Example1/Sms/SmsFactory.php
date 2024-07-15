<?php

namespace App\DesignPatterns\FactoryMethod\Example1\Sms;

use App\DesignPatterns\FactoryMethod\Example1\FactoryInterface;
use App\DesignPatterns\FactoryMethod\Example1\NotificationInterface;

class SmsFactory implements FactoryInterface{

    public function create($type):NotificationInterface{
        return match($type){
            'sms'=>new SmsNotification,
            default=>throw new \Exception('notification is invalid')
        };
    }

}
