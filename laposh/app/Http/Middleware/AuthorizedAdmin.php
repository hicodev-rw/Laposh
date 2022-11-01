<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class AuthorizedAdmin
{
    public function handle($request, Closure $next)
    {
        if (!$this->isAdmin($request)) {
            abort(Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }

    protected function isAdmin($request)
    {
     $post_data = $request->all();
    if (isset($post_data['authToken'])) 
    {
    [$id, $user_token] = explode('|', $post_data['authToken'], 2);
    $token_data = DB::table('personal_access_tokens')->where('token', hash('sha256', $partner_token))->first();
    $user_id = $user_id->tokenable_id;
}
        return $request->user()->role->name == 'admin';
    }
}