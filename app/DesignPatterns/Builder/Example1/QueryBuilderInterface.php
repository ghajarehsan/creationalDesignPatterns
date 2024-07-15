<?php

namespace App\DesignPatterns\Builder\Example1;


interface QueryBuilderInterface{

    public function where($key,$value,$operation);

    public function select();

    public function table($table_name);

    public function orderBy($column,$type);

    public function take($count);

    public function get();

}
