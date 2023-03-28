<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //

    protected function index()
    {
        $account = Account::where('is_active',1)->get();

        if (!$account){
            return response()->json([
                'message'=>'account not found'
            ]);
        }
        return response()->json([
            'account' => $account
        ],200);
    }

    protected function store(Request $request){
        Account::create($request->all());
    }
}
