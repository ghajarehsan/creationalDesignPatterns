<?php


namespace App\DesignPatterns\Prototype\Example1;

use Illuminate\Support\Facades\DB;

class Book implements PrototypeInterface{

    private $title;
    private $price;
    private $content;

    public function __construct($title, $price, $content='')
    {
        $this->title=$title;
        $this->price=$price;
        $this->content=$content!='' ? $content : $this->fetchContentFromDb();
    }

    //this function is implemented by interface for caching data from db
    public function clone($title, $price){
        return new Book($title, $price, $this->content);
    }

    private function fetchContentFromDb(){
        // $content=DB::table('testTable')->get();
        $content='simple content that should be fetch from db';
        return $content;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getContent(){
        return $this->content;
    }



}
