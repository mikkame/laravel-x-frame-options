<?php

namespace Tecpresso\XFrameOption\Middleware;

use Closure;

class XFrameOption
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ($this->inMatchArray($request, config('x-frame-options.allow', []))) {
            // nothing todo
        } elseif ($this->inMatchArray($request, config('x-frame-options.sameorigin', []))) {
            $response->headers->add([
              'X-Frame-Options' => 'SAMEORIGIN'
            ]);
        } else {
            $response->headers->add([
              'X-Frame-Options' => 'DENY'
            ]);
        }

        return $response;
    }

    /**
     * Find matching paths from array
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $allows
     *
     * @return bool
     */
    protected function inMatchArray($request, $haystack)
    {
        foreach ($haystack as $path) {
            if ($path !== '/') {
                $path = trim($path, '/');
            }
            if ($request->fullUrlIs($path) || $request->is($path)) {
                return true;
            }
        }
        return false;
    }
}
