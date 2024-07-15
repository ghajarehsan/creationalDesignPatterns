<?php

namespace App\DesignPatterns\SimpleFactory\Example1;



class GatewayFactory{

    public function createBank($gateway){
        return match($gateway){
            'paypal'   => new PaypalGateway(),
            'shaparak' => new ShaparakGateway(),
            'zarinpal' => new ZarinpalGateway(),
            default    => throw new \Exception('bank is invalid')
        };
    }

}
