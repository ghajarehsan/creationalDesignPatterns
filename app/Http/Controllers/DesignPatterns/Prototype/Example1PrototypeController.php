<?php

namespace App\Http\Controllers\DesignPatterns\Prototype;

use App\DesignPatterns\Prototype\Example1\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Example1PrototypeController extends Controller
{

    //by this way we avoid fetching data from db for every creating object of book class
    public function example1(){
        try{
            $mainBook=new Book('mainBookTitle', 'mainBookTilePrice');
            $book2=$mainBook->clone('title2','price2');
            $book3=$mainBook->clone('title3','price3');
            $book4=$mainBook->clone('title4','price4');
            return response()->json([
                'data'=>[
                    'book2'=>[
                        'title'=>$book2->getTitle(),
                        'price'=>$book2->getPrice(),
                        'content'=>$book2->getContent(),
                    ],
                    'book3'=>[
                        'title'=>$book3->getTitle(),
                        'price'=>$book3->getPrice(),
                        'content'=>$book3->getContent(),
                    ],
                    'book4'=>[
                        'title'=>$book4->getTitle(),
                        'price'=>$book4->getPrice(),
                        'content'=>$book4->getContent(),
                    ]
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
