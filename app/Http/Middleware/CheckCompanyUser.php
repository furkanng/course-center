<?php

namespace App\Http\Middleware;

use App\Models\CompanyUser;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCompanyUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $userId = auth()->id();


        $companyId = $request->route('id');


        $exists = CompanyUser::query()
            ->where('user_id', $userId)
            ->where('company_id', $companyId)
            ->exists();


        if (!$exists) {
            abort(403, 'Bu şirkete erişim yetkiniz yok.');
        }


        return $next($request);
    }
}
