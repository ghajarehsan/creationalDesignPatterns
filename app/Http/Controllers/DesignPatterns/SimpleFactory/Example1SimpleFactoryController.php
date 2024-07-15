<?php

namespace App\Http\Controllers\DesignPatterns\simpleFactory;

use App\DesignPatterns\SimpleFactory\Example1\GatewayFactory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Example1SimpleFactoryController extends Controller
{

    public function example1(GatewayFactory $gatewayFactory){
        try{
            $paypal=$gatewayFactory->createBank('paypal');
            $shaparak=$gatewayFactory->createBank('shaparak');
            $zarinpal=$gatewayFactory->createBank('zarinpal');
            return response()->json([
                'data'=>[
                    'paypal'=>[
                        'pay'=>$paypal->pay(),
                        'verify'=>$paypal->verify()
                    ],
                    'shaparak'=>[
                        'pay'=>$shaparak->pay(),
                        'verify'=>$shaparak->verify()
                    ],
                    'zarinpal'=>[
                        'pay'=>$zarinpal->pay(),
                        'verify'=>$zarinpal->verify()
                    ],
                ]
            ]);
        }
        catch(\Exception $ex){
            return response()->json([
                'messages'=>$ex->getMessage(),
            ]);
        }
    }

}
