<?php

namespace App\DesignPatterns\SimpleFactory\Example1;


class PaypalGateway implements BankInterface{


    public function pay(){
        return 'paypal url pay';
    }

    public function verify()
    {
        return 'paypal transaction verify';
    }

}
