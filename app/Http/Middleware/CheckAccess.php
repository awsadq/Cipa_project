<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAccess
{
    public function handle(Request $request, Closure $next, $section)
    {
        $hasAccess = \App\Models\AccessControl::where('user_id', Auth::id())
            ->where('section', $section)
            ->where('access_granted', true)
            ->exists();

        if (!$hasAccess) {
            return response()->json(['message' => 'Доступ запрещён'], 403);
        }

        return $next($request);
    }
}

