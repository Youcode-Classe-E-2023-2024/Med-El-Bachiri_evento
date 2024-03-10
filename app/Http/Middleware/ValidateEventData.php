<?php

namespace App\Http\Middleware;

use Closure;

class ValidateEventData
{
    public function handle($request, Closure $next)
    {
        $rules = [
            'title' => 'required|string|max:255|min:5',
            'description' => 'nullable|string',
            'city_name' => 'nullable|string',
            'price' => 'required|numeric',
            'places_available' => 'required|integer',
            'date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'acceptation_method' => 'required|string|in:auto,manual',
        ];

        if ($request->isMethod('put')) {
            $rules['date'] = 'nullable|date';
            $rules['places_available'] = 'nullable|integer';
            $rules['acceptation_method'] = 'nullable|string|in:auto,manual';
        }

        $validatedData = $request->validate($rules);

        $request->merge([
            'validated' => false,
            'user_id' => auth()->id(),
        ]);

        return $next($request);
    }
}
