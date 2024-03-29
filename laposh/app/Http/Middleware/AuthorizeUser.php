<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AuthorizeUser
{
    public function handle($request, Closure $next)
    {
        if (!$this->isNormalUser($request)) {
            return redirect('/login');
        }
        return $next($request);
    }

    protected function isNormalUser($request)
    {
        if(auth()->user()){
            $user=User::find(auth()->user()->id);
            if ($user->role!=='client'){
                return "user";
            }
}
    }
}