<?php

namespace App\DesignPatterns\Singleton\Example1;


class Config{

    private static $instance='';

    private $item=[];

    private function __construct()
    {
        //db::config connection
        //connecting to database should be done just one time in whole application
    }

    public static function getInstance(){
        if(self::$instance==null){
            self::$instance=new Config();
        }
        return self::$instance;
    }

    public function setItem($key,$value){
        $this->item[$key]=$value;
    }

    public function getItem($key){
        if(!$this->item[$key]) throw new \Exception('item is invalid');
        return $this->item[$key];
    }

}
