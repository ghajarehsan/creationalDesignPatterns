<?php

use App\Http\Controllers\DesignPatterns\Builder\Example1QueryBuilderController;
use App\Http\Controllers\DesignPatterns\FactoryMethod\Example1FactoryMethodController;
use App\Http\Controllers\DesignPatterns\Prototype\Example1PrototypeController;
use App\Http\Controllers\DesignPatterns\SimpleFactory\Example1SimpleFactoryController;
use App\Http\Controllers\DesignPatterns\Singleton\Example1SingletonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix'=>'simpleFactory'],function(){
    Route::get('example1',[Example1SimpleFactoryController::class,'example1']);
});

Route::group(['prefix'=>'factoryMethod'],function(){
    Route::get('example1',[Example1FactoryMethodController::class,'example1']);
});

Route::group(['prefix'=>'builder'],function(){
    Route::get('example1',[Example1QueryBuilderController::class,'example1']);
});

Route::group(['prefix'=>'prototype'],function(){
    Route::get('example1',[Example1PrototypeController::class,'example1']);
});

Route::group(['prefix'=>'singleton'],function(){
    Route::get('example1',[Example1SingletonController::class,'example1']);
});



Route::get('testEhsan',function(){
    dd('testEhsan');
});
