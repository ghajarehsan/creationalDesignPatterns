<?php

namespace App\DesignPatterns\SimpleFactory\Example1;


class ShaparakGateway implements BankInterface{

    public function pay(){
        return 'shaparak url pay';
    }

    public function verify()
    {
        return 'shaparak transaction verify';
    }

}
