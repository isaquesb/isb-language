<?php
namespace Isb\Language\Http\Middleware;

class AcceptLanguage
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        if ($header = $request->header('Accept-Language', null)) {
            \app()->setLocale(str_replace('-', '_', $header));
        }

        return $next($request);
    }
}
