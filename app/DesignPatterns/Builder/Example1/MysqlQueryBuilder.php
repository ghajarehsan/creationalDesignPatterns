<?php

namespace App\DesignPatterns\Builder\Example1;


class MysqlQueryBuilder implements QueryBuilderInterface{

    private $query;

    public function __construct()
    {
        $this->query['get']='';
    }

    public function where($key,$value,$operation='='){
        $this->query['where'][]=$key.' '.$operation.' '.$value;
        return $this;
    }

    public function select($columns=[]){
        $this->query['select']='select '.implode(', ',$columns);
        return $this;
    }

    public function table($table_name){
        $this->query['from']=$table_name;
        return $this;
    }

    public function orderBy($column,$type){
        if(!in_array($type,['asc','desc'])) throw new \Exception('type of orderBy is inValid');
        $this->query['orderBy']=" orderBy $column $type";
        return $this;
    }

    public function take($count){
        $this->query['limit']=' LIMIT '.$count;
        return $this;
    }

    public function get(){
        //first concat select sql
        isset($this->query['select']) ?
         ($this->query['get'].=$this->query['select']) :
         ($this->query['get'].='SELECT *');

        //second of sql concat from table
        if(!isset($this->query['from'])) throw new \Exception('name of table is needed');
        $this->query['get'].=' FROM '.$this->query['from'];

        //third concat where condition
        if(isset($this->query['where'])){
            $this->query['get'].=' WHERE '.implode(' AND ',$this->query['where']);
        }

        //concat orderBy
        if(isset($this->query['orderBy'])){
            $this->query['get'].=$this->query['orderBy'];
        }

        //concat limitation
        if(isset($this->query['limit'])){
            $this->query['get'].=$this->query['limit'];
        }

        return $this->query['get'];
    }

    public function limit(){

    }

}
