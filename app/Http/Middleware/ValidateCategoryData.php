<?php

namespace App\Http\Middleware;

use Closure;

class ValidateCategoryData
{
    public function handle($request, Closure $next)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|min:5',
        ]);

        return $next($request);
    }
}
