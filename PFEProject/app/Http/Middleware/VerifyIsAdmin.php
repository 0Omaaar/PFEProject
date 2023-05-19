<?php
namespace App\Http\Middleware;

use App\Models\User;

use Closure;
use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;



class VerifyIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {

        $user = auth()->user();

        if ($user && !$user->isAdmin()) {
            return redirect()->route('admin.index');
        }
        
        


        return $next($request);
    }
}
