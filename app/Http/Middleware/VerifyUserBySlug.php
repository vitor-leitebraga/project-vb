<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class VerifyUserBySlug
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
		$slug = $request->route('slug');

		$user = User::all()->first(fn ($user) => Str::slug($user->name) === $slug);

		if (!$user) {
			abort(404, 'User not found');
		}

		$request->attributes->set('resolvedUser', $user);

		return $next($request);
    }
}
