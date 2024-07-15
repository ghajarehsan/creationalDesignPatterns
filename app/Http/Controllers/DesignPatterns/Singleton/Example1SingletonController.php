<?php

namespace App\Http\Controllers\DesignPatterns\Singleton;

use App\DesignPatterns\Singleton\Example1\Config;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Example1SingletonController extends Controller
{

    //this function show that Config class just run one time in whole of application
    public function example1(){
        try{
            // $databaseConfig=new Config(); This line can not perform because Config class is definde as peivate
            $databaseConfig=Config::getInstance();
            
            $databaseConfig->setItem('keyTest1','valueTest1');
            $databaseConfig->setItem('keyTest2','valueTest2');
            $databaseConfig->setItem('keyTest3','valueTest3');
            $databaseConfig->setItem('keyTest4','valueTest4');

            $item1FromConfigInstance=$databaseConfig->getItem('keyTest1');
            $item2FromConfigInstance=$databaseConfig->getItem('keyTest2');
            $item3FromConfigInstance=$databaseConfig->getItem('keyTest3');
            $item4FromConfigInstance=$databaseConfig->getItem('keyTest4');

            $item1FromCache=Config::getInstance()->getItem('keyTest1');
            if($item1FromConfigInstance!=$item1FromCache) throw new \Exception('item1FromConfigInstance is not equal item1FromCache');

            $item2FromCache=Config::getInstance()->getItem('keyTest2');
            if($item2FromConfigInstance!=$item2FromCache) throw new \Exception('item2FromConfigInstance is not equal item2FromCache');

            $item3FromCache=Config::getInstance()->getItem('keyTest3');
            if($item3FromConfigInstance!=$item3FromCache) throw new \Exception('item3FromConfigInstance is not equal item3FromCache');

            $item4FromCache=Config::getInstance()->getItem('keyTest4');
            if($item4FromConfigInstance!=$item4FromCache) throw new \Exception('item4FromConfigInstance is not equal item4FromCache');

            return response()->json([
                'data'=>[
                    'item1'=>$item1FromCache,
                    'item2'=>$item2FromCache,
                    'item3'=>$item3FromCache,
                    'item4'=>$item4FromCache,
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
