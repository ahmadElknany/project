<?php

namespace App\Http\Controllers\Auth\Email;

use App\LoginToken;
use App\Http\Controllers\Controller;

class LoginTokenController extends Controller
{
    public function show(LoginToken $token)
    {
        auth()->login($token->user);

        $token->delete();

        return redirect('/');
    }
}
