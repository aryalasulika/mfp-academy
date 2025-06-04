<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!$request->user() || $request->user()->role !== $role) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthorized.'], 403);
            }
            
            // Redirect to login if not authenticated, or to the appropriate dashboard if authenticated but wrong role
            if (!$request->user()) {
                return redirect()->route('login');
            }
            
            $redirectTo = $request->user()->role === 'peserta' ? '/dashboard/peserta' : '/dashboard/coach';
            return redirect($redirectTo)->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }
        
        return $next($request);
    }
}
