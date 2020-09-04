<?php


namespace App\Http\Controllers;


class UsersFilter extends QueryFilter{

    public function popular($order='desc'){

    }

    public function id($number){
        return $this->builder->where('id',$number);
    }

    public function name($name){
        return $this->builder->where('name',$name);
    }

    public function take($account){
        return $this->builder->limit($account);
    }
}
