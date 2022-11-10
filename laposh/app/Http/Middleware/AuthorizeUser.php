<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class AuthorizeUser
{
    public function handle($request, Closure $next)
    {
        if (!$this->userRole($request)) {
            abort(Response::HTTP_UNAUTHORIZED);
        }
        return $next($request);
    }

    protected function userRole($request)
    {
     $post_data = $request->all();
    if (isset($post_data['token'])) 
    {
    [$id, $user_token] = explode('|', $post_data['authToken'], 2);
    $token_data = DB::table('personal_access_tokens')->where('token', hash('sha256', $partner_token))->first();
    $user_id = $user_id->tokenable_id;
}
        return $request->user()->roles;
    }
}