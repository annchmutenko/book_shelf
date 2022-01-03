<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;

class AdminAccess
{
    public function handle(Request $request, $next, ...$roles)
    {
        $user = $request->user();
        if(in_array($user->role, $roles))
            return $next($request);
        abort(404);
    }
}
