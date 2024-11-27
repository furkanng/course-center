<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class VerifyRecaptcha
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->isMethod('post')) {
            $recaptchaResponse = $request->input('g-recaptcha-response');

            // Eğer reCAPTCHA token yoksa hata ver
            if (!$recaptchaResponse) {
                return redirect()->back()->with(['error' => 'reCAPTCHA doğrulaması gerekli.']);
            }

            // Google reCAPTCHA doğrulama isteği
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => env('RECAPTCHA_SECRET_KEY'),
                'response' => $recaptchaResponse,
                'remoteip' => $request->ip(),
            ]);

            $responseBody = $response->json();

            // Eğer reCAPTCHA başarısızsa hata döndür
            if (!($responseBody['success'] ?? false) || ($responseBody['score'] ?? 0) < 0.5) {
                return redirect()->back()->with(['error' => 'reCAPTCHA doğrulaması başarısız.']);
            }
        }

        return $next($request);
    }
}
