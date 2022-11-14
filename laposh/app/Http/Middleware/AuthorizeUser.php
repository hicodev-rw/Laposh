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
            abort(Response::HTTP_UNAUTHORIZED);
        }
        return $next($request);
    }

    protected function isNormalUser($request)
    {
        $user=User::find(Auth()->User()->id);
        if ($user->role!=='client'){
            return "user";
        }
        else{
            return redirect('/login');
        }
}
}