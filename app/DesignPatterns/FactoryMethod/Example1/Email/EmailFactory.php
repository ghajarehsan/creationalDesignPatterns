<?php

namespace App\DesignPatterns\FactoryMethod\Example1\Email;

use App\DesignPatterns\FactoryMethod\Example1\FactoryInterface;
use App\DesignPatterns\FactoryMethod\Example1\NotificationInterface;

class EmailFactory implements FactoryInterface{

    public function create($type):NotificationInterface{
        return match($type){
            'email'=>new EmailNotification()
        };
    }

}
