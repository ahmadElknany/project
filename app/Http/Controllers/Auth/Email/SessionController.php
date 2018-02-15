<?php

namespace App\Http\Controllers\Auth\Email;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Login\AuthenticateUserByEmail;

class SessionController extends Controller
{
    public function create()
    {
        return view('Auth.Emails.create');
    }

    public function store(AuthenticateUserByEmail $auth)
    {
        $auth->invite();

        return 'Sweet Go Check That Email ...';
    }
    
    public function destroy()
    {
        auth()->logout();

        return redirect('/');
    }
}
