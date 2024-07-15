<?php

namespace App\Http\Controllers\DesignPatterns\Builder;

use App\DesignPatterns\Builder\Example1\MysqlQueryBuilder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Example1QueryBuilderController extends Controller
{

    public function example1(MysqlQueryBuilder $queryBuilder){
        try{
            $sql=$queryBuilder
            ->table('users_t')
            ->where('first_name','Ehsan')
            ->where('last_name','Ghajar')
            ->where('age',27)
            ->select(
                [
                    'id as user_id',
                    'first_name as user_first_name',
                    'last_name as user_last_name',
                    'age as user_age',
                    'sex as user_sex',
                    'avatar as user_avatar'
                ]
            )
            ->orderBy('age','asc')
            ->take(2)
            ->get();
            return response()->json([
                'data'=>[
                    'sql'=>$sql
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
