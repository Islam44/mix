<?php


namespace App\Http\Controllers;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class QueryFilter
{
    protected $request;
    protected $builder;

    public function __construct(Request $request)
    {
        $this->request=$request;
    }

    public function filters(){
        return $this->request->all();
    }

    public function apply(Builder $builder){
        $this->builder=$builder;
        foreach ($this->filters() as $name=>$value){
            if (method_exists($this,$name)){
                dump([$this,$name]);
                dump(array_filter([$value]));
                call_user_func_array([$this,$name],array_filter([$value]));
            }
        }
        return $this->builder;
    }
}
