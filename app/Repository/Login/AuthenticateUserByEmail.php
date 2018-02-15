<?php

namespace App\Repository\Login;

use App\User;
use App\LoginToken;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class AuthenticateUserByEmail 
{
    use ValidatesRequests;

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    public function invite()
    {
        $this->validateRequest()
            ->craeteToken()
            ->send();
    }

    protected function validateRequest()
    {
        $this->validate($this->request, ['email' => 'required|email|exists:users']);
        return $this;
    }
    
    protected function craeteToken()
    {
        $user = User::byEmail($this->request->email);

        return LoginToken::generateFor($user);

    }
}
