<?php

namespace App\DesignPatterns\FactoryMethod\Example1;


interface FactoryInterface{
    public function create($type):NotificationInterface;
}
