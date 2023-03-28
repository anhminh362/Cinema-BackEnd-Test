<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected function store(Request $request){
        return User::create($request->all());
    }
}
