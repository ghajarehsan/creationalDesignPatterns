<?php

namespace App\Http\Controllers\DesignPatterns\FactoryMethod;

use App\DesignPatterns\FactoryMethod\Example1\Email\EmailFactory;
use App\DesignPatterns\FactoryMethod\Example1\Sms\SmsFactory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Example1FactoryMethodController extends Controller
{

    public function example1(){
        try{
            $smsMessage=new SmsFactory();
            $smsResult=$smsMessage->create('sms')->send('hello world by sms');

            $emailMessage=new EmailFactory();
            $emailResult=$emailMessage->create('email')->send('hello world by email');
            
            return response()->json([
                'data'=>[
                    'smsResult'=>$smsResult,
                    'emailResult'=>$emailResult
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
