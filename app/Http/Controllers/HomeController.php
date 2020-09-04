<?php

namespace App\Http\Controllers;

use App\User;

class HomeController extends Controller
{
    public function index(UsersFilter $filters){
        dd(User::filter($filters)->get());
    }
}
