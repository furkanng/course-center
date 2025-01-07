<?php

namespace App\Http\Middleware;

use App\Models\PageVisit;
use Closure;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class LogPageVisit
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next)
    {
        $agent = new Agent();
        $deviceType = $agent->isMobile() ? 'mobile' : ($agent->isTablet() ? 'tablet' : 'desktop');

        PageVisit::query()->create([
            'ip_address' => $request->ip(),
            'url' => $request->url(),
            'user_agent' => $request->header('User-Agent'),
            'device_type' => $deviceType,
            'seo_link' => $request->path(),
            'visited_at' => now(),
        ]);

        return $next($request);
    }
}
