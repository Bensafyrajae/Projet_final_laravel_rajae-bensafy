<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTeamLimit
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user->teams()->count() >= 5) {
            return redirect()->route('payment.subscription')
                ->with('error', 'You have reached the maximum team limit. Subscribe or pay for additional teams.');
        }

        return $next($request);
    }
}
