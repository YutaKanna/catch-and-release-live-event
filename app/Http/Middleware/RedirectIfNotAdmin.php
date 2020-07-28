<?php

namespace App\Http\Middleware;

use Closure;
use App\Entities\Constants\UserRoleConstant;
use Auth;

class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth('admin')->user();
        if (!$user) {
            return redirect()->route('admin.login');
            // todo:use enum
        } elseif ($user->type != 100) {
            return redirect()->back();
        }

        return $next($request);
    }
}
