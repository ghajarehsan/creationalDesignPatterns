<?php

namespace App\DesignPatterns\SimpleFactory\Example1;


class ZarinpalGateway implements BankInterface{

    public function pay(){
        return 'zarinpal url pay';
    }

    public function verify(){
        return 'zarinpal transaction verify';
    }

}
