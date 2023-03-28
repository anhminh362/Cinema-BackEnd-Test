<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function register(RegisterRequest $registerRequest){
        $account = new Account([
           'email'=> $registerRequest->email,
           'password'=> Hash::make($registerRequest->password),
        ]);

        $account->save();

        VerificationController::sendEmailConfirmAccount($account, VerificationController::generateOtp());

        return $this->commonResponse($account,'sent otp');

    }
}
