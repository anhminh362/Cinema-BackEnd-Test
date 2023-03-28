<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;



class UserController extends Controller
{
    public function index(){
//        $accounts = User::join('accounts as a', 'a.user_id', '=', 'users.id')
//            ->where('a.is_active',true)
//            ->get();
//        $accounts = User::whereHas("account", fn($query) => $query->where("is_active", true))->with("account")->get();
//        $user = User::with('account')->get();
////        $accounts =json_decode($accounts,true);
        $user = User::whereHas("account", fn($query) => $query->where('is_active',true))->with('account')->get();
        return response()->json($user,200);
    }

    public function show(string $id){
        $user = User::find($id);

        if (!$user){
            return response()->json([
                'message' => 'user not found',
            ],404);
        }
        return response()->json([
            'user'=>$user
        ],200);
    }
}
