<?php

namespace App;

use Mail;
use Illuminate\Database\Eloquent\Model;

class LoginToken extends Model
{
    protected $fillable = ['user_id', 'token'];


    public static function generateFor(User $user)
    {
       return static::create([
           'user_id' => $user->id,
           'token'   => str_random(60)
       ]);
    }

    public function send()
    {
        $url = url(route('token.send', $this->token));
        Mail::raw(
            "<a href='{$url}'>Login Now</a>",
            function ($message) {
                $message->to($this->user->email)
                        ->subject('Login With The Given Email');
            }
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'token';
    }
}
