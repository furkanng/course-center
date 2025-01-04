<?php

namespace App\Http\Middleware;

use App\Models\PageVisit;
use Closure;
use Illuminate\Http\Request;

class LogPageVisit
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next)
    {
        PageVisit::query()->create([
            'ip_address' => $request->ip(),
            'url' => $request->url(),
            'user_agent' => $request->header('User-Agent'),
            'seo_link' => $request->path(),
            'visited_at' => now(),
        ]);

        return $next($request);
    }
}
